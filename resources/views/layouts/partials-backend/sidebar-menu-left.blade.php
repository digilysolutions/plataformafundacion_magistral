<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="/" class="header-logo">
            <img src="{{ asset('img/23.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
            <h5 class="logo-title light-logo ml-3">Plataforma</h5>

        </a>

        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>

        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                    <a href="{{ route('admin.dashboard') }}" class="svg-icon">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="3" x2="9" y2="21"></line>
                        </svg>
                        <span class="ml-1">Escritorio</span>
                    </a>
                </li>

                <li class=" ">
                    <a href="#registro" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash3" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                        <span class="ml-1">Registro</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="registro" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Centro Educativo</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Estudiantes</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('') ? 'active' : '' }}">
                            <a href="">
                                <i class="las la-minus"></i><span>Usuario General</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('countries*') ? 'active' : '' }}">
                            <a href="{{ route('countries.index') }}">
                                <i class="las la-minus"></i>
                                <span>País</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Regional</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('districts*') ? 'active' : '' }}">
                            <a href="{{ route('districts.index') }}"><i class="las la-minus"></i>

                                <span>Distritos</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="">
                                <i class="las la-minus"></i><span>Validador</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('memberships*') ? 'active' : '' }}">
                            <a href="{{ route('memberships.index') }}">
                                <i class="las la-minus"></i>
                                <span>Membresías</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('membership-features*') ? 'active' : '' }}">
                            <a href="{{ route('membership-features.index') }}"><i class="las la-minus"></i>
                                <span>Características de Membresía</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('tutors*') ? 'active' : '' }}">
                            <a href="{{ route('tutors.index') }}">
                                <i class="las la-minus"></i><span>Tutores</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="">
                                <i class="las la-minus"></i><span>Certificado</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="#reportes" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash9" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                            </rect>
                            <rect x="7" y="7" width="3" height="9"></rect>
                            <rect x="14" y="7" width="3" height="5"></rect>
                        </svg>
                        <span class="ml-1">Reportes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="reportes" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte General
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Centro Educativo
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Regional
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Distrito Educativo
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Tutores
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Validadores
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte ITEMS
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Exámenes
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Reporte Usuario general
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" ">
                    <a href="#certificados" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M2 8c0-1.1 1.34-2 3-2h14c1.66 0 3 0.9 3 2v10c0 1.1-1.34 2-3 2H5c-1.66 0-3-0.9-3-2V8z">
                            </path>
                            <path d="M9 11l-3 4h6l-3-4z"></path>
                            <path d="M2 6l2 2h14l2-2"></path>
                        </svg>
                        <span class="ml-1">Certificados</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="certificados" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Emitir Certificado
                                </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="">
                                <i class="las la-minus"></i><span>Certificados Emitidos
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


    </div>
