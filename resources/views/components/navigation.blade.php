<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="/"><img src="{{asset('storage/logo.gif')}}" width=100 lenght=100></a></li>

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item"><a class="nav-link" href="/">Pocetna</a></li>
                            <li class="nav-item"><a class="nav-link" href="/educators">Educators</a></li>
                            <li class="nav-item"><a class="nav-link" href="/courses">Courses</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>

                        @else

                            <li class="nav-item"><a class="nav-link" href="/">Pocetna</a></li>
                            <li class="nav-item"><a class="nav-link" href="/educators">Edukatori</a></li>
                            <li class="nav-item"><a class="nav-link" href="/courses">Kursevi</a></li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth()->user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                @if(auth()->user()->hasRole("educator"))

                                    <a href="/profile/{{auth()->user()->slug}}" class="dropdown-item">Moj Profil</a>
                                    <a href="/mycourses" class="dropdown-item">Moji kursevi</a>
                                @elseif(auth()->user()->hasRole("student"))

                                    <a class="dropdown-item" href="/mycourses">Moji Kursevi</a>

                                @elseif(auth()->user()->hasRole("admin"))

                                        <a class="dropdown-item" href="/admin/dashboard">Dashboard</a>
                                        <a class="dropdown-item" href="/admin/educators">Educators</a>
                                        <a class="dropdown-item" href="/admin/students">Students</a>
                                        <a class="dropdown-item" href="/admin/admins">Admins</a>
                                        <a class="dropdown-item" href="/admin/courses">Courses</a>
                                        <a class="dropdown-item" href="/admin/create">Create User</a>

                                @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
