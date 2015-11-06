<?php

// The need for this controller is questionable.

class BookItemController extends \BaseController {

  // Display a listing of the resource.
  public function index() {
    if (!Auth::check())
      App::abort(403);
    App::abort(404);
 }


  // Show the form for creating a new resource.
  public function create() {
    if (!Auth::check() || !Auth::user()->isAdmin())
      App::abort(403);
    $forupdate = Session::get('forupdate',false);
    return View::make('bookitem.create')->withForupdate($forupdate);
  }


  // Store a newly created resource in storage.
  public function store()
  {
    if (!Auth::check() || !Auth::user()->isAdmin())
      App::abort(403);

    // Validation rules
    $rules = array('book_isbn'=>'required','edition'=>'required',
      'quantity'=>'required|numeric|min:1');

    // Validate
    $validator = Validator::make(Input::all(), $rules);

    $messages = array();

    // If fails, construct messagebag and redirect
    if ($validator->fails()) {
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
      return Redirect::to('/bookitem/create')->withMessages($messages);
    }

    // All is good. Create bookitems
    $bookitems = array();
    for ($i=0; $i<Input::get('quantity'); $i++) {
      $bookitem = new BookItem(array('book_isbn'=>
        Input::get('book_isbn'),'edition'=>Input::get('edition')));
      $bookitem->save();
      $bookitems[] = $bookitem;
    }

    return View::make('bookitem.list')->withBookitems($bookitems);
  }

  // Display the specified resource.
  public function show($id)
  { }


  // Show the form for editing the specified resource.
  public function edit($id)
  { }

  // Update the specified resource in storage.
  public function update($id)
  { }

  // Remove the specified resource from storage.
  public function destroy($id)
  { }

}
