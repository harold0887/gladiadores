<nav id="{{$navbarClass}}"  class="navbar navbar-expand-lg navbar-absolute fixed-top navbar navbar-dark {{$navbarClass}}">
    <div class="container ">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="{{route('home')}}" style="color:#51cbce !important">Gladiadores</a>
        </div>
        <button class="navbar-toggler btn-primary" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item  {{ $activePage == 'home' ? 'active':''}} ">
                    <a href="{{route('home')}}" class="nav-link d-flex align-items-center">
                    <i class="material-icons mr-2">home</i> {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item {{ $activePage == 'membership' ? 'active':''}}">
                    <a href="{{ route('memberships') }}" class="nav-link d-flex align-items-center">
                    <i class="material-icons mr-2">card_membership</i> Membresías
                    </a>
                </li>
                @role('administrador')
                <li class="nav-item {{ $activePage == 'dahboard' ? 'active':''}}">
                    <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
                    <i class="material-icons mr-2">dashboard</i> {{ __('Dashboard') }}
                    </a>
                </li>
                @endrole

                @guest
                <li class="nav-item {{ $activePage == 'register' ? 'active':''}}">
                    <a href="{{ route('register') }}" class="nav-link d-flex align-items-center">
                    <i class="material-icons mr-2">person_add</i>{{ __('Register') }}
                    </a>
                </li>
                <li class="nav-item   {{ $activePage == 'login' ? 'active':''}}">
                    <a href="{{ route('login') }}" class="nav-link d-flex align-items-center">
                    <i class="material-icons mr-2">fingerprint</i>{{ __('Login') }}
                    </a>
                </li>
                @endif

                @auth
                <li class="nav-item  {{ $activePage == 'perfil' ? 'active':''}}  dropdown">
                    <a class="nav-link nav-link-icon d-flex align-items-center" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons mr-2">account_circle</i>
              

                        @php
                        $name = explode(" ", Auth::user()->name);
                        echo $name[0];
                        @endphp

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background:#e9e9e8;">

                        <a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('My Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                      this.closest('form').submit();">Salir</a>
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
