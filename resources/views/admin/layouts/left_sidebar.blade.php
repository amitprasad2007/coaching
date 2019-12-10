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
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a></li>

          <li class=" treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="{{route('liststudents')}}"><i class="fa fa-circle-o"></i> List Students</a></li>
            
          </ul>

          <li class=" treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Faculty</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('listfacultytype')}}"><i class="fa fa-circle-o"></i> List Faculty Type</a></li>
            <li class="active"><a href="{{route('listteacher')}}"><i class="fa fa-circle-o"></i> List Faculties</a></li>
          </ul>
        </li>
         <li class=" treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Make Batch</a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> List Faculty Type</a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Add Faculty</a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i> List Faculties</a></li>
          </ul>
        </li>


        </li>
         <li class=" treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Manage Questions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('questions.index')}}"><i class="fa fa-circle-o"></i> Topic Wise Questions</a></li>
           
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Manage Test</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('subjectmodules.index')}}"><i class="fa fa-circle-o"></i> Test</a></li>
            <
          </ul>
        </li>

       
       <li class=" treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Packages & Bookings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="{{route('packages.index')}}"><i class="fa fa-circle-o"></i> All Packages</a></li>
            
          </ul>
        </li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>View Results</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('subjectmodulesresults.index') }}"><i class="fa fa-circle-o"></i> Modules</a></li>
           
            
          </ul>
        </li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>News & Notifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('notifications.index') }}"><i class="fa fa-circle-o"></i> Notifications</a></li>
         
            
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>