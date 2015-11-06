<?php

class NotificationController extends \BaseController {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $notifs = (new Notification)->paginate(10);
    return View::make('notification.list')->withNotifications($notifs);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $notif = Session::get('notification',new Notification);
    $forupdate = Session::get('forupdate',false);
    return View::make('notification.create')->withForupdate($forupdate)
      ->withNotification($notif);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $rules = array('start'=>'required|date_format:Y-m-d',
      'end'=>'required|date_format:Y-m-d','content'=>'required');
    $messages = array();

    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
      return Redirect::to('/notification/create')->
        withMessages($messages);
    }

    $notification = new Notification;
    $notification->author_id = Auth::user()->id;
    $notification->content = Input::get('content');
    $notification->start = date_create_from_format('Y-m-d',
      Input::get('start'));
    $notification->end = date_create_from_format('Y-m-d',
      Input::get('end'));
    $notification->save();

    return Redirect::to('/notification');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return Redirect::to('/notification');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $notif = Notification::find($id);
    return View::make('notification.create')->withNotification($notif)->
      withForupdate(true);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $rules = array('start'=>'required|date_format:Y-m-d',
      'end'=>'required|date_format:Y-m-d','content'=>'required');
    $messages = array();

    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      foreach ($validator->messages()->all() as $mesg) {
        $messages[] = array('error',$mesg);
      }
      return Redirect::to("/notification/$id/edit")->
        withMessages($messages);
    }

    $notification = Notification::find($id);
    $notification->author_id = Auth::user()->id;
    $notification->content = Input::get('content');
    $notification->start = date_create_from_format('Y-m-d',
      Input::get('start'));
    $notification->end = date_create_from_format('Y-m-d',
      Input::get('end'));
    $notification->save();

    return Redirect::to('/notification');
  }

  /**
   * Display the specified resource.
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $notification = Notification::find($id);
    $notification->delete();
    return Redirect::to('/notification');
  }

  public static function getCurrent() {
    $current = (new DateTime)->format('Y-m-d');
    $notifs = Notification::where('start','<=',$current)->
      where('end','>',$current)->get();
    return $notifs;
  }

  public static function getCurrentAsMessages() {
    $notifs = NotificationController::getCurrent();
    $mesgs = array();
    foreach ($notifs as $notif) {
      $mesgs[] = array('notice',$notif->content);
    }
    return $mesgs;
  }
}
