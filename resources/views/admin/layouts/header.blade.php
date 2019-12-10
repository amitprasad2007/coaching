  <header class="main-header">
    <!-- Logo -->
    <a href="{!! URL('profile') !!}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>@yield("user")</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Coaching</b> Institute</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="{!! URL('profile') !!}" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="{!! URL('profile') !!}" class="dropdown-toggle" data-toggle="dropdown">
            
              <span class="hidden-xs">@yield("username")</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                 @yield("userfullname")- Web Developer
                 </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{!! URL('profile') !!}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}"class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }} </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{route('auth.basic_settings')}}" ><i class="fa fa-gears"></i></a>
          
          </li>
        </ul>
      </div>
    </nav>
  </header>