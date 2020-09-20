   <div class="nav-left-sidebar sidebar-dark" style="display:block;
        height:90%;
        overflow:auto;
        float:left;">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Dashboard
                            </li>
                            <li class="nav-item ">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard')}}" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success"></span></a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" 
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                  <i class="fa fa-fw fa-sign-out-alt"></i>logout <span class="badge badge-success"></span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </li>
                             <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-user"></i>User</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                     @if(auth()->user()->level == 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('auth.index')}}">admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('officer')}}">officer</a>
                                        </li>
                                    @endif
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('community')}}">public</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                             @if(auth()->user()->level == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-user-plus"></i>Create</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('auth.create')}}">create</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('authtrash')}}" ><i class="fa fa-fw fas fa-trash"></i>trash <span class="badge badge-success"></span></a>
                                </li>
                            @endif
                             @if(auth()->user()->level == 'public')
                            <li class="nav-divider">
                                Complain
                            </li>
                             <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('complain.show',Auth::user()->id)}}" ><i class="fa fa-fw fas fa-eye"></i>Mycomplaain<span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('complain.create')}}" ><i class="fa fa-fw fas fa-edit"></i>create <span class="badge badge-success"></span></a>
                                </li>
                            @endif
                             @if(auth()->user()->level == 'public')
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('complaintrash',Auth::user()->id)}}" ><i class="fa fa-fw fas fa-trash"></i>trash <span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            @endif
                             @if(auth()->user()->level == 'officer')
                            <li class="nav-divider">
                                officer
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('complainindex')}}" ><i class="fa fa-fw fas fa-info-circle"></i>complain<span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            @endif
                             @if(auth()->user()->level == 'admin')
                            <li class="nav-divider">
                                officer
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('complainindex')}}" ><i class="fa fa-fw fas fa-info-circle"></i>complain<span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            @endif
                             @if(auth()->user()->level == 'public')
                            <li class="nav-divider">
                                user manual
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('user_manual')}}" ><i class="fas fa-book"></i>user manual<span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            @endif
                              @if(auth()->user()->level == 'admin')
                            <li class="nav-divider">
                                user manual
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('user_manual')}}" ><i class="fas fa-book"></i>user manual<span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            @endif
                              @if(auth()->user()->level == 'officer')
                            <li class="nav-divider">
                                user manual
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('user_manual')}}" ><i class="fas fa-book"></i>user manual<span class="badge badge-success"></span></a>
                                </li>
                            </li>
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>