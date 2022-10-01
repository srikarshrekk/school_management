@php
$prefix=Request::Route()->getPrefix();
$route=Route::current()->getName();

@endphp



<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="{{route('dashboard')}}">
            <div class="ulogo">
                <a href="{{route('dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Admin</b>Dashboard</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu " data-widget="tree">

            <li class="{{($route =='dashboard')?'active':''}}">
                <a href="{{route('dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->role=='Admin')

            <li class="treeview {{($prefix =='/users')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View User</a></li>
                    <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>
            @endif

            <li class="treeview {{($prefix =='/profile')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Your profile</a></li>
                    <li><a href="{{route('password.view')}}"><i class="ti-more"></i>Change Password</a></li>

                </ul>
            </li>

            <li class="treeview {{($prefix =='/setup')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.class.view')}}"><i class="ti-more"></i>Student Classes</a></li>
                    <li><a href="{{route('student.year.view')}}"><i class="ti-more"></i>Student Years</a></li>
                    <li><a href="{{route('student.group.view')}}"><i class="ti-more"></i>Student Groups</a></li>
                    <li><a href="{{route('student.shift.view')}}"><i class="ti-more"></i>Student Shifts</a></li>
                    <li><a href="{{route('student.fee.view')}}"><i class="ti-more"></i>Fee Categories</a></li>
                    <li><a href="{{route('student.fee_amount.view')}}"><i class="ti-more"></i>Fee Category Amount</a>
                    </li>
                    <li><a href="{{route('student.exam.view')}}"><i class="ti-more"></i>Exam Type</a></li>
                    <li><a href="{{route('student.subject.view')}}"><i class="ti-more"></i>School Subject</a></li>
                    <li><a href="{{route('student.subject_assign.view')}}"><i class="ti-more"></i>Assign Subject</a>
                    </li>
                    <li><a href="{{route('student.designation.view')}}"><i class="ti-more"></i>Designation</a></li>


                </ul>
            </li>
            <li class="treeview {{($prefix =='/student')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Student Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('student.registration.view')}}"><i class="ti-more"></i>Student registration</a>
                    </li>
                    <li><a href="{{route('roll.generate.view')}}"><i class="ti-more"></i>Student Roll Generate</a></li>

                </ul>
            </li>
      
            <li class="treeview {{($prefix =='/employee')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Employee Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('employee.registration.view')}}"><i class="ti-more"></i>Employee registration</a>
                    </li>
                    <li><a href="{{route('employee.leave.view')}}"><i class="ti-more"></i>Leave Management</a>
                    </li>
                    <li><a href="{{route('employee.attendance.view')}}"><i class="ti-more"></i>Attendance Management</a>
                    </li>
                    
                    

                </ul>
            </li> 



            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>

                </ul>
            </li>


            <li>
                <a href="{{route('admin.logout')}}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>


