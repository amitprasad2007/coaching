 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><h5>Welcome to Coaching Institute</h5></li>
        <li><a href="{{route('sutdent.dashboard')}}"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a></li>

          <li class=" treeview">
          <a href="{{route('exam.index')}}">
            <i class="fa fa-user"></i> <span>Give Exam</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="{{route('exam.index')}}"><i class="fa fa-circle-o"></i> Give Exam</a></li>
            
          </ul>
        </li>
         <li class=" treeview">
          <a href="{{URL ('student/attempt-exams')}}">
            <i class="fa fa-user"></i> <span>Attempt Exams</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{URL ('student/attempt-exams')}}"><i class="fa fa-circle-o"></i>Attempt Exams </a></li>
           
          </ul>
        </li>
 <li class=" treeview">
          <a href="{{route('student.profile')}}">
            <i class="fa fa-user"></i> <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{Route ('student.profile')}}"><i class="fa fa-circle-o"></i>Profile </a></li>
           
          </ul>
        </li>
 <li class=" treeview">
          <a href="{{route('student.packages')}}">
            <i class="fa fa-user"></i> <span>Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{Route ('student.packages')}}"><i class="fa fa-circle-o"></i>Packages </a></li>
           
          </ul>
        </li>

        <li class=" treeview">
          <a href="{{route('student.packages')}}">
            <i class="fa fa-user"></i> <span>My Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="{{URL ('student/mypackages')}}"><i class="fa fa-circle-o"></i>My Packages </a>
          </li>
           
          </ul>
        </li>
        <li class=" treeview">
          <a href="{{route('student.packages')}}">
            <i class="fa fa-user"></i> <span>My Notifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{URL ('student/notifications')}}"><i class="fa fa-circle-o"></i>Notifications </a></li>
           
          </ul>
        </li>
        <li class=" treeview">
          <a href="{{route('student.packages')}}">
            <i class="fa fa-user"></i> <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{URL ('student/news')}}"><i class="fa fa-circle-o"></i>Latest News </a></li>
           
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>