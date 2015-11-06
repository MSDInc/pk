<?php

class UserController extends \BaseController {

  // Display a listing of the resource.
  public function index()
  {
    $userlist = User::paginate(10);
    return View::make('user.list')->withUsers($userlist)->
      withIndex(true);
  }

  // Show the form for creating a new resource.
  public function create()
  {
    $usertype = 'Student';
    if (Input::has('type')) {
      if (Input::get('type')=='admin')
        $usertype = 'Admin';
      elseif (Input::get('type')=='librarian')
        $usertype = 'Librarian';
      elseif (Input::get('type')=='verifier')
        $usertype = 'Verifier';
    }

    Session::flash('usertype',$usertype);
    if (Session::has('user'))
      $user = Session::get('user');
    else
      $user = new User;
    return View::make('user.create')->withType($usertype)->
      withForupdate(false)->withUser($user);
  }

  // Store a newly created resource in storage.
  public function store()
  {
    $messages = array();
    $usertype = Session::get('usertype');

    // Validation rules for input data
    $rules = array('name'=>'required',
      'role_name'=>'required|exists:roles,name',
      'email'=>'required|email|unique:users',
      'phone'=>'required|numeric', 'address'=>'required');

    if ($usertype=='Student') {
      $rules['rollnumber'] = 'required|numeric';
      $rules['department_sname'] =
        'required|exists:departments,shortname';
      $rules['batch'] = 'required|numeric';
    }

    $validator = Validator::make(Input::all(),$rules);

    // If fails, construct messagebag and redirect
    if ($validator->fails()) {
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
      /*foreach ($validator->failed() as $failure=>$type) {
        Input::flash($failure);
      }
      //Session::flash('messages',$messages);*/
      return Redirect::to('/user/create?type='.strToLower($usertype))->
        withMessages($messages)->withInput();
    }

    $user = new User;
    $user->name = Input::get('name');
    $user->role_name = Input::get('role_name');
    $user->email = Input::get('email');
    $user->phone = Input::get('phone');
    $user->address = Input::get('address');
    $user->password = Hash::make('default');
    $user->save();

    if ($user->isStudent()) {
      $stdinfo = new StudentInfo;
      $stdinfo->rollnumber = Input::get('rollnumber');
      $stdinfo->batch = Input::get('batch');
      $stdinfo->user_id = $user->id;
      $stdinfo->department_sname = Input::get('department_sname');
      $stdinfo->fineacc = 0.0;
      $stdinfo->finepaid = 0.0;
      $stdinfo->save();
    } else if ($user->isAdmin()) {
      $adminfo = new AdminInfo;
      $adminfo->user_id = $user->id;
      $adminfo->save();
    } else if ($user->isLibrarian()) {
      $librinfo = new LibrarianInfo;
      $librinfo->user_id = $user->id;
      $librinfo->save();
    } else if ($user->isVerifier()) {
      $verinfo = new VerifierInfo;
      $verinfo->user_id = $user->id;
      $verinfo->save();
    }

    Event::fire('pustak.user.create',array($user->id,NULL,
      Auth::user()->id));
    return Redirect::to('/user');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $user = User::find($id);
    if ($user==NULL) {
      App::abort(404);
    }
    if (Auth::user()->role->name=='Student' && $id!=Auth::user()->id)
      App::abort(403);
    if ($user->role->name=='Student') {
      $stdinfo = StudentInfo::where('user_id','=',$id)->firstOrFail();
      return View::make('user.view')->withUser($user)->
        withStudent(true)->withStdinfo($stdinfo)
        ->withBooks($user->books);
    } else {
      return View::make('user.view')->withUser($user);
    }
  }

  public function home()
  {
    if( Auth::user()->isStudent())
        return $this->show(Auth::user()->id);
    else if( Auth::user()->isVerifier())
        return View::make('user.verifier.home');
    else if( Auth::user()->isLibrarian())
        return View::make('user.librarian.home');
    else if( Auth::user()->isAdmin())
        return $this->show(Auth::user()->id);
  }

  // Show the form for editing the specified resource.
  public function edit($id)
  {
    $user = User::find($id);
    // 404 if not found
    if ($user==NULL)
      App::abort(404);

    $userinfo = $user->info();

    Session::flash('name',$user->name);
    return View::make('user.create')->withUser($user)->
      withType($user->role_name)->withUserinfo($userinfo)->
      withForupdate(true);
  }

  // Update the specified resource in storage.
  public function update($id)
  {

    $user = User::find($id);

    // 404 if user not found
    if ($user==NULL)
      App::abort(404);

    // Validation rules for input data
    $rules = array('name'=>'required',
      'email'=>'required|email|unique:users,email,'.$id,
      'phone'=>'required|numeric', 'address'=>'required');

    $usertype = Session::get('usertype');

    if ($usertype=='Student') {
      $rules['roll'] = 'required';
      $rules['depart'] =
        'required|exists:departments,shortname';
    }

    $validator = Validator::make(Input::all(),$rules);

    // If fails, construct messagebag and redirect
    if ($validator->fails()) {
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
      $user = new User; $user->populateFromInput();
      return Redirect::to('/user/create?type='.strtoLower($usertype))->
        withMessages($messages)->withUser($user);
    }

    $user->populateFromInput();

    if ($user->isStudent()) {
      $stdinfo = $user->info();
      $stdinfo->rollnumber = Input::get('rollnumber');
      $stdinfo->department_sname = Input::get
        ('department_sname');
    }

    $user->push();
    $id = $user->id;
    $user->save();

    Event::fire('pustak.user.edit',array($id,NULL, Auth::user()->id));
    return Redirect::to('/user');
  }


  // Remove the specified resource from storage.
  public function destroy($id)
  {
    $user = User::find($id);
    // 404 if user not found
    if ($user==NULL)
      App::abort(404);

    $user->delete();
    Event::fire('pustak.user.delete',array($id,NULL, Auth::user()->id));
    return Redirect::to('/user');
  }
}
