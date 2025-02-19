<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="backend/index.html" class="header-logo">
            <img src="{{asset('img/23.png')}}" class="img-fluid rounded-normal light-logo" alt="logo">
            <h5 class="logo-title light-logo ml-3">Plataforma</h5>

        </a>


        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>

        </div>

    </div>

    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="" >
                    <a href="" class="svg-icon">
                        <svg class="svg-icon" id="p-dash1" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="ml-4">Escritorio</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/countries*') ? 'active' : '' }}">
                    <a href="{{ route('countries.index') }}" ><i class=""></i>
                    </svg>
                        <span class="ml-4">País</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/regionals*') ? 'active' : '' }}">
                    <a href="{{ route('regionals.index') }}" ><i class=""></i>
                    </svg>
                        <span class="ml-4">Regional</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/districts*') ? 'active' : '' }}">
                    <a href="{{ route('districts.index') }}" ><i class=""></i>
                    </svg>
                        <span class="ml-4">Distritos</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/levels*') ? 'active' : '' }}">
                    <a href="{{ route('levels.index') }}" ><i class=""></i>

                    </svg>
                        <span class="ml-4">Niveles</span>
                    </a>
                </li>


                <li class="{{ request()->is('admin/memberships*') ? 'active' : '' }}">
                    <a href="{{ route('memberships.index') }}" ><i class=""></i>
                    </svg>
                        <span class="ml-4">Mewmebresia</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/tutors*') ? 'active' : '' }}">
                    <a href="{{ route('tutors.index') }}" ><i class=""></i>
                    </svg>
                        <span class="ml-4">Tutores</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/study-centers*') ? 'active' : '' }}">
                    <a href="{{ route('study-centers.index') }}" ><i class=""></i>
                    </svg>
                        <span class="ml-4">Centros de estudios</span>
                    </a>

                <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class="{{ request()->is('admin/people*') ? 'active' : '' }}">
                        <a href="{{ route('people.index') }}" class="submenu-link">
                            <i class="las la-minus"></i><span>Personas</span>
                        </a>
                    </li>



                    @if( auth()->check() &&  auth()->user()->hasRole('Administrador'))
                    <li class="{{ request()->is('admin/units*') ? 'active' : '' }}">
                        <a href="{{ route('units.index') }}" class="submenu-link">
                            <i class="las la-minus"></i><span>Unidades</span>
                        </a>
                    </li>
                    @endif


                </ul>

            </ul>
        </nav>
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">

        </div>
        <div class="p-3"></div>
    </div>

</div>
