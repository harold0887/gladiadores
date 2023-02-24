<div class="sidebar" data-color="white" data-active-color="danger">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <!-- <div class="logo">
        <a href="{{route('home')}}" class="simple-text">
            <div class="logo-image-small">
                <img src="{{ asset('img/evernote.png') }}">
            </div>
        </a>
        <a href="{{route('home')}}" class="simple-text logo-normal">
            home
        </a>
    </div> -->
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                @if (isset(auth()->user()->picture))
                <img src="{{ Storage::url(Auth::user()->picture) }}">
                @else
                <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                @endif
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        @auth
                        {{ auth()->user()->name }}
                        @endauth
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse  {{ $folderActive == 'profile' ? 'show' : '' }}" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item {{ $activePage == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('dashboard.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('MP') }}</span>
                                <span class="sidebar-normal">{{ __('My Profile') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOutSidebar" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a onclick="document.getElementById('formLogOutSidebar').submit();">
                                <span class="sidebar-mini-icon">{{ __('LO') }}</span>
                                <span class="sidebar-normal">{{ __('Logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class=" nav-item {{ $activePage == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'users' ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                <i class="fa-solid fa-users"></i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'administradores' ? 'active' : '' }}">
                <a href="{{ route('administradores.index') }}">
                <i class="fa-solid fa-user-lock"></i>
                    <p>administradores</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'membresias' ? 'active' : '' }}">
                <a href="{{ route('membresias.index') }}">
                <i class="material-icons">card_membership</i>
                    <p>Membresias</p>
                </a>
            </li>
            

            <li class="nav-item {{ $activePage == 'comments' ? 'active' : '' }}">
                <a href="{{ route('comments.index') }}">
                <i class="material-icons">forum</i>
                    <p>Comentarios</p>
                </a>
            </li>



            

        </ul>
    </div>
</div>