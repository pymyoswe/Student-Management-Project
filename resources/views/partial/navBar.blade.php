<nav class="navbar navbar-default navbar-static-top" id="navHeader">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}" id="navBrand">
                <i class="fa fa-university fa-lg" aria-hidden="true"></i> {{ 'Student Management System' }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>
                            Register</a></li>
                @else
                    <li><a href="{{route('examResult')}}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Exam Result</a></li>
                    <li><a href="{{route('yearMajor')}}"><i class="fa fa-certificate" aria-hidden="true"></i> Year/Major</a></li>
                    <li><a href="{{route('student')}}"><i class="fa fa-users" aria-hidden="true"></i> Student</a></li>
                    <li><a href="{{route('dashboard')}}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a> </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
