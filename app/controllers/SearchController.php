<?php

class SearchController extends \BaseController {

  // Return search results for a GET search query
  public function getIndex() {
    // Do the same thing as on POST
    return $this->postIndex();
  }

  // Return search results for a POST search query
  public function postIndex() {
    // Build validation rules
    $rules = array('query_type'=>'required|in:User,Book',
      'book_type'=>'in:Lendable,NonLendable,Reference,All',
      'user_type'=>'in:Student,Librarian,Verifier,Admin,All');
    //return Input::all();

    // Validate
    $validator = Validator::make(Input::all(),$rules);
    $messages = array();

    // Get query, or blank if none
    $query = Input::get('query','');

    // If validation fails, construct messages and bail out
    if ($validator->fails()) {
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
      return Redirect::to('/')->withMessages($messages);
    }

    // Get query type : Book, User or something else?
    $querytype = Input::get('query_type');

    if ($querytype=='Book') {
      $type = Input::get('book_type');

      // If the Book type is any, run the search
      if ($type=='' || $type=='All') {
        $books = Book::whereNull('deleted_at')->where(
          function($condition) use ($query) {
            $condition->where('name','like',"%".$query."%")->
            orWhere('author','like',"%".$query."%")->
            orWhere('publisher','like',"%".$query."%");
          })->paginate(10);
      } else {
      // Else, run the search with specified booktype
        $books = Book::whereNull('deleted_at')->where(
          function($condition) use ($query) {
            $condition->where('type_name','=',$type)->
            where('name','like',"%".$query."%")->
            orWhere('author','like',"%".$query."%")->
            orWhere('publisher','like',"%".$query."%");
          })->paginate(10);
      }

      // Return view with results
      return View::make('book.list')->withBooks($books);

    } elseif ($querytype=='User') {
      $type = Input::get('user_type','');

      // If type unspecified, create a User object. We will need that
      // later to run 'where' clauses on.
      if ($type=='All' || $type=='') {
        $users_coll = new User;

      // If the user type is student, do accordingly
      } elseif ($type=='Student') {

        $depart = Input::get('user_depart','');
        $batch = Input::get('user_year','');

        // Create a collection of 'Student's
        $users_coll = User::whereNull('deleted_at')->
          where('role_name','=','Student');


        // If department is specified, select only students of that
        // department.
        if (!($depart=='' || $depart=='All')) {
          $stdinfos = StudentInfo::where('department_sname','=',
            $depart);
          foreach ($stdinfos as $stdinfo) {
            $users_coll=$users_coll->where('id','=',
              $stdinfo->user_id);
          }
        }

        // If batch is specified, further narrow down by selecting
        // only students of that batch
        if (!($batch=='' || $batch=='All')) {
          $stdinfos = StudentInfo::where('batch','=',$batch);
          foreach ($stdinfos as $stdinfo) {
            $users_coll=$users_coll->where('id','=',
              $stdinfo->user_id);
          }
        }

      } else {
      // If the user type is something else, collect them
        $users_coll = User::where('role_name','=',$type)->
          whereNull('deleted_at');
      }

      // Run the search query on the uesr collection, and paginate
      $users = $users_coll->where(function ($condition) use ($query)
        { $condition->where('name','like','%'.$query.'%')
          ->orWhere('email','like','%'.$query.'%')
          ->orWhere('phone','like','%'.$query.'%')
          ->orWhere('address','like','%'.$query.'%');
        })->paginate(10);

      // Return view with the search results
      return View::make('user.list')->withUsers($users);
    }
  }
}
