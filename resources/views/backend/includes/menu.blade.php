<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>

        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                    Classes
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('class.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Class</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('class.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Class</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Subjects
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('subject.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Subject</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('subject.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Subjects</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Students
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('student.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Student</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('student.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Students</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    Result
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('result.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Result</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('result.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Result</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                    Notice
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('notice.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Notice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('notice.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage Notice</p>
                    </a>
                </li>
            </ul>
        </li>



        <li class="nav-item">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

        <li class="nav-item has-treeview">
            <a href="" class="nav-link">
                    <p>
                        Admin Scetion
                    </p>
                </a>

        </li>
        <li class="nav-item has-treeview">
            <a href="{{route('user.create')}}" class="nav-link">
                <p>
                    <i class="far fa-circle nav-icon"></i>
                <p>Add New Admin</p>

                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="{{route('user.index')}}" class="nav-link">
                <p>
                    <i class="far fa-circle nav-icon"></i>
                <p>Manage Admin</p>

                </p>
            </a>
        </li>

    </ul>
</nav>
