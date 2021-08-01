<nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand me-0" href="{{ route('/') }}">
            <img src="{{ asset('favicon.png') }}" height="22" alt="logo" style="margin-top: -3px">
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar1"
                aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('/') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownTools"
                       data-mdb-toggle="dropdown" aria-expanded="false">
                        Tools
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownTools">
                        <li>
                            <a class="dropdown-item" href="{{ route('tools.calculator') }}">Resource Calculator</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('tools.damage') }}">Damage Calculator</a>
                        </li>
                        @if(!empty(session('mail')) && !empty(session('uid')))
                            <li>
                                <a class="dropdown-item" href="#">Wish Counter</a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if(!empty(session('mail')))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('resources') }}">My resources</a>
                    </li>
                    @if(session('admin') === 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Admin
                            </a>
                        </li>
                    @endif
                @endif
            </ul>

            <ul class="navbar-nav d-flex flex-row">
                @if(!empty(session('mail')))
                    <li id="logout" class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="{{ route('logout') }}">Log out</a>
                    </li>
                @else
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="" data-mdb-toggle="modal" data-mdb-target="#signIn">Sign In</a>
                    </li>
                @endif
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://lexiquejaponais.fr" rel="nofollow" target="_blank">
                        <i class="fas fa-dragon"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="https://github.com/ThomasOrgeval" rel="nofollow" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
