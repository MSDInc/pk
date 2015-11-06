<nav class="navbar navbar-default navbar-fixed-top fixed">
  <div class="container">

    <div class="navbar-header">
      <a href="{{{ URL::to('/') }}}" class="navbar-brand">
        <span class="glyphicon glyphicon-book"></span> Pustakalaya
      </a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-main">

      <ul class="nav navbar-nav navbar-right">
        @if (!Auth::check())
        <li>
          <a href="{{URL::to('/login')}}">Login</a>
        </li>
        @else

        @if (Auth::user()->isStudent())
        <li>
          <a href="{{{ URL::to('/request-a-book') }}}">Request a Book</a>
        </li>
        @endif

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">{{{Auth::user()->name}}}
            <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li>
              <a href="{{{ URL::to('/user/' . Auth::user()->id) }}}"> Profile </a>
              <li>
                <a href="{{{ URL::to('/user/'. Auth::user()->id.'/edit') }}}"> Edit Profile </a>
              </li>
              <li>
                <a href="{{{ URL::to('/changepassword') }}}"> Change Password</a>
              </li>
              <li class="divider">
              </li>
              <li>
                <form action="{{URL::to('/logout')}}" method="POST" name="logoutForm">
                  <input type="hidden" name="really" value="yes">
                </form>
                <a href="#" onClick="document.logoutForm.submit()"> Log Out </a>
              </li>
          </ul>
          </li>
          @endif
      </ul>


      @if (Auth::check())
      <!-- /earch Text -->
      <!-- Get data from hidden fields -->
      <form class="navbar-form navbar-left" action="/search"
      method="POST">
        <div class="form-group">
          <!-- <label class="control-label">Input addons</label> -->
          <div class="input-group">
            <input class="form-control" placeholder="Search"
            type="text" name="query">
            <input class="form-control" name="query_type" id="type-select-topic" type="hidden">
            <input class="form-control" name="book_type" id="book-select-topic" type="hidden">
            <input class="form-control" name="user_type" id="user-select-topic" type="hidden">
            <input class="form-control" name="user_depart" id="depart-select-topic" type="hidden">
            <input class="form-control" name="user_year" id="year-select-topic" type="hidden">
            <input class="form-control" name="query2_type" id="query-select-topic" type="hidden">
            <span class="input-group-btn">
              <button class="btn btn-primary form-control" type="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>

          </div>
        </div>
      </form>
      <div class="form-selection">
        <div class="select-sub" id="type-select-sub">
          <ul class="nav navbar-nav">
            <li class="dropdown interchange">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
              <ul class="dropdown-menu" id="type-select">
                <li><a href="#" id="book-select">Book</a>
                </li>
                @if (!Auth::user()->isStudent())
                <li><a href="#" id="user-select">User</a>
                @endif
                @if (Auth::user()->isAdmin())
                </li>
                <li><a href="#" id="notification-select">Notification</a>
                </li>
                <li><a href="#" id="query-select">Query</a>
                </li>
                <li><a href="#" id="request-select">Request</a>
                </li>
                @endif
              </ul>
            </li>
          </ul>
        </div>

        <div class="select-sub" id="query-select-sub">
          <ul class="nav navbar-nav">
            <li class="dropdown interchange">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> All <b class="caret"></b></a>
              <ul class="dropdown-menu" id="book-select">
                <li><a href="#" id="refernce-select">Read</a>
                </li>
                <li><a href="#" id="lendable-select">Unread</a>
                </li>
                <li class="divider"></li>
                <li><a href="#">All</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>


        <div class="select-sub" id="book-select-sub">
          <ul class="nav navbar-nav">
            <li class="dropdown interchange">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">All <b class="caret"></b></a>
              <ul class="dropdown-menu" id="book-select">
                <li><a href="#" id="refernce-select">Reference</a>
                </li>
                <li><a href="#" id="lendable-select">Lendable</a>
                </li>
                <li><a href="#" id="nonlendable-select">NonLendable</a>
                </li>
                <li class="divider"></li>
                <li><a href="#">All</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        <div class="select-sub" id="user-select-sub">
          <ul class="nav navbar-nav">
            <li class="dropdown interchange">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">All <b class="caret"></b></a>
              <ul class="dropdown-menu" id="user-select">
                <li><a href="#" id="admin-select">Admin</a>
                </li>
                <li><a href="#" id="employee-select">Employee</a>
                </li>
                <li><a href="#" id="student-select">Student</a>
                </li>
                <li class="divider"></li>
                <li><a href="#">All</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        <div class="select-sub" id="student-select-sub">
          <ul class="nav navbar-nav">
            <li class="dropdown interchange">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">All <b class="caret"></b></a>
              <ul class="dropdown-menu" id="year-select">
                <li><a href="#" id="67-select">067</a>
                </li>
                <li><a href="#" id="68-select">068</a>
                </li>
                <li><a href="#" id="69-select">069</a>
                </li>
                <li class="divider"></li>
                <li><a href="#">All</a>
                </li>
              </ul>
            </li>

            <li class="dropdown interchange">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">All <b class="caret"></b></a>
              <ul class="dropdown-menu" id="depart-select">
                <li><a href="#" id="bex-select">BEX</a>
                </li>
                <li><a href="#" id="bel-select">BEL</a>
                </li>
                <li><a href="#" id="bct-select">BCT</a>
                </li>
                <li class="divider"></li>
                <li><a href="#">All</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      @endif

    </div>
  </div>
</nav>
