<!-- 
<div class="panel panel-default">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Stats
  </div>
  <div class="panel-body">
    <a href="{{URL::to('/book')}}" class="btn btn-lg">
      <h3>234</h3>
      <h4><small><span class="glyphicon glyphicon-book" aria-hidden="true"></span></small> Book </h4>
    </a>

    <a href="{{URL::to('/user')}}" class="btn btn-lg">
      <h3>34</h3>
      <h4><small><span class="glyphicon glyphicon-user " aria-hidden="true"></span></small> User </h4>
    </a>

    <a href="{{URL::to('/notification')}}" class="btn btn-lg">
      <h3>29</h3>
      <h4><small><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></small> Notification </h4>
    </a>
    <a href="{{URL::to('/query')}}" class="btn btn-lg">
      <h3>10</h3>
      <h4><small><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></small> Query </h4>
    </a>
    <a href="{{URL::to('/request')}}" class="btn btn-lg">
      <h3>110</h3>
      <h4><small><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></small> Request </h4>
    </a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create
  </div>

  <div class="panel-body">


    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
    <div class="btn-group btn-block">
      <a href="#" class="btn btn-block dropdown-toggle" data-toggle="dropdown">
        <h2><span class="glyphicon glyphicon-user " aria-hidden="true"></span></h2>
        <h4>User</h4>
      </a>
      <ul class="dropdown-menu">
        <li><a href="{{URL::to('user/create?type=student')}}">Student</a>
        </li>
        <li><a href="{{URL::to('user/create?type=admin')}}">Admin</a>
        </li>
        <li><a href="{{URL::to('user/create?type=librarian')}}">Librarian</a>
        </li>
        <li><a href="{{URL::to('user/create?type=verifier')}}">Verifier</a>
        </li>
      </ul>
    </div>
    </div>



    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <a href="{{URL::to('book/create')}}" class="btn btn-block">
        <h2><span class="glyphicon glyphicon-book" aria-hidden="true"></span></h2>
        <h4>Book</h4>
      </a>
    </div>


    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <a href="{{URL::to('bookitem/create')}}" class="btn btn-block">
        <h2><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></h2>
        <h4>Bookitem</h4>
      </a>
    </div>

    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <a href="{{URL::to('notification/create')}}" class="btn btn-block">
        <h2><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></h2>
        <h4>Notification</h4>
      </a>
    </div>
  </div>
</div> -->

<!-- /.row -->

<div class="row">
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>Book Chart</h3>
      </div>
      <div class="panel-body">
        <div id="morris-book-chart"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>Active User Chart</h3>
      </div>
      <div class="panel-body">
        <div id="morris-user-chart"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Fine Chart</h3>
      </div>
      <div class="panel-body">
        <div id="morris-fine-chart"></div>
      </div>
    </div>
  </div>
</div>



