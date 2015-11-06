<?php

class ActionController extends \BaseController {

  public function isValid() {

    $rules = array('user_id'=>'required|numeric|exists:users,id',
      'bookitem_ids'=>'required|regex:/^([\d]+)((;)*([\d]+))*(;)*$/');
    $bookitem_ids = preg_split('/;/',Input::get('bookitem_ids'),NULL,
      PREG_SPLIT_NO_EMPTY);
    $messages = array(); $fails = false;

    $validator = Validator::make(Input::all(),$rules);
    if ($validator->fails()) {
      $fails = true;
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
    }

    if (!$fails) {
      $rules2 = array('bookitem_id'=>'required|exists:bookitems,id');

      foreach ($bookitem_ids as $bookitem_id) {
        $validator = Validator::make(array('bookitem_id'=>$bookitem_id),
          $rules2);
        if ($validator->fails()) {
          $fails = true;
          $messages[] = array('error',
            "There is no book item with id $bookitem_id");
        }
      }
    }

    if ($fails)
      return array(false,$messages);
    else
      return array(true,Input::get('user_id'),$bookitem_ids);
  }

  public function postIssue() {

    $validity = $this->isValid();
    if (!$validity[0]) {
      return Redirect::to('user/'.Input::get('user_id'))->withMessages($validity[1]);
    }

    $bookitem_ids = $validity[2];
    $user_id = $validity[1];
    $messages = array();
    $issued = 0;

    // All is good. Issue the books
    foreach ($bookitem_ids as $bookitem_id) {
      $bookitem = BookItem::find($bookitem_id);
      if ($bookitem->assigned_to!=NULL) {
        $messages[] = array('warning',"The book with id $bookitem_id is
          already issued to user with id $bookitem->assigned_to");
        continue;
      }
      if ($bookitem->book->booktype->name=='NonLendable') {
        $messages[] = array('warning',"The book with id $bookitem_id is
          a Non-Lendable book.");
        continue;
      }
      $bookitem->assigned_to = $user_id;
      $bookitem->assigned_date = new DateTime;
      Event::fire('pustak.bookitem.issue',array($user_id,
        $bookitem->book_isbn,Auth::user()->id));
      $bookitem->save();
      $issued += 1;
    }

    if ($issued==1) {
      $messages[] = array('notice',"One book was issued");
    } elseif ($issued>1) {
      $messages[] = array('notice',"$issued books were issued");
    }
    return Redirect::to("user/$user_id")->withMessages($messages);
  }

  public function postReturn() {
    $validity = $this->isValid();
    if (!$validity[0]) {
      return Redirect::to('user/'.Input::get('user_id'))->withMessages($validity[1]);
    }

    $bookitem_ids = $validity[2];
    $user_id = $validity[1];
    $messages = array();
    $returned = 0;

    // All is good. Continue to return
    foreach ($bookitem_ids as $bookitem_id) {
      $bookitem = BookItem::find($bookitem_id);
      if ($bookitem->assigned_to==NULL) {
        $messages[] = array('warning',"The book with id $bookitem_id not
          issued to anybody");
        continue;
      }
      if ($bookitem->assigned_to!=$user_id) {
        $messages[] = array('warning',"The book with id $bookitem_id
          issued to user with id $bookitem->assigned_to");
        continue;
      }
      if ($bookitem->book->booktype->name=='NonLendable') {
        $messages[] = array('warning',"The book with id $bookitem_id is
          a Non-Lendable book.");
        continue;
      }
      $bookitem->assigned_to = NULL;
      $bookitem->assigned_date = NULL;
      Event::fire('pustak.bookitem.return',array($user_id,
        $bookitem->book_isbn,Auth::user()->id));
      $bookitem->save();
      $returned += 1;
    }

    if ($returned>1) {
      $messages[] = array('notice',"$returned books were returned");
    } elseif ($returned==1) {
      $messages[] = array('notice',"One book was returned");
    }
    return Redirect::to("user/$user_id")->withMessages($messages);
  }

  public function postRenew() {
    $validity = $this->isValid();
    if (!$validity[0]) {
      return Redirect::to('user/'.Input::get('user_id'))->withMessages($validity[1]);
    }

    $bookitem_ids = $validity[2];
    $user_id = $validity[1];
    $messages = array();
    $renewed = 0;

    // All is good. Continue to renew
    foreach ($bookitem_ids as $bookitem_id) {
      $bookitem = BookItem::find($bookitem_id);
      if ($bookitem->assigned_to==NULL) {
        $messages[] = array('warning',"The book with id $bookitem_id is
          not issued to anybody");
        continue;
      }
      if ($bookitem->assigned_to!=$user_id) {
        $messages[] = array('warning',"The book with id $bookitem_id
          issued to user with id $bookitem->assigned_to");
        continue;
      }
      if ($bookitem->book->booktype->name=='NonLendable') {
        $messages[] = array('warning',"The book with id $bookitem_id is
          a Non-Lendable book.");
        continue;
      }

      $bookitem->assigned_date = new DateTime;
      Event::fire('pustak.bookitem.renew',array($user_id,
        $bookitem->book_isbn,Auth::user()->id));
      $bookitem->save();
      $renewed += 1;
    }

    if ($renewed>1) {
      $messages[] = array('notice',"$renewed books were renewed");
    } elseif ($renewed==1) {
      $messages[] = array('notice',"One book was renewed");
    }
    return Redirect::to("user/$user_id")->withMessages($messages);
  }
}
