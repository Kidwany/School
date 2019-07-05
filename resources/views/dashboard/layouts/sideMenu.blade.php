<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset(Auth::user()->image_id ? Auth::user()->image->path : 'images/user.png')}}" class="img-circle" alt="User Image" style="max-width: 50px !important; height: 50px; object-fit: cover">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
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
            <li>
                <a href="{{url('/admin')}}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/users')}}">
                    <i class="fa fa-users"></i><span>Users</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/teachers')}}">
                    <i class="fa fa-male"></i><span>Teachers</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/subjects')}}">
                    <i class="fa fa-book"></i><span>Subjects</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/classes')}}">
                    <i class="fa fa-group"></i><span>Classes</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/students')}}">
                    <i class="fa fa-book"></i><span>Students</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/levels')}}">
                    <i class="fa fa-step-forward"></i><span>Levels</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/grades')}}">
                    <i class="fa fa-book"></i><span>Grades</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('/admin/setting')}}">
                    <i class="fa fa-cogs"></i><span>Setting</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
