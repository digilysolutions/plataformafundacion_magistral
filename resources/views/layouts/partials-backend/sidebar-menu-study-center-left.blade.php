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
                <li class=" ">
                    <a href="#membresia" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash5" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <span class="ml-4">Membresía</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>


                    <ul id="membresia" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('memberships*') ? 'active' : '' }}">
                            <a href="{{ route('memberships.show',$user->person->studyCenter->membership->id) }}">
                                <i class="las la-minus"></i><span>Detalles de Membresía</span>
                            </a>

                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Renovar Membresía</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('membership-histories*') ? 'active' : '' }}">
                            <a href="{{ route('membership_histories_user',$user->id) }}">
                                <i class="las la-minus"></i><span>Histórico de membresía</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" ">
                    <a href="#estudiantes" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash8" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-4">Estudiantes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="estudiantes" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Registrar estudiantes</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Listar Estudiantes</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span> Tiempo en Plataforma</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Evaluaciones terminadas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Evaluaciones Pendientes</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="#tutores" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash8" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-4">Tutores</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="tutores" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Registrar Tutor</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Listar tutores</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Enviar ITEMS a Validar</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <div class="iq-submenu">
                    <h6 class="ml-2 "> Resultados de Evaluaciones</h6>
                </div>
                <li class=" ">
                    <a href="#items" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash11" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                        </svg>
                        <span class="ml-4">ITEMS</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="items" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>General</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Exámenes Pruebas Diagnóstico</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                        <svg class="svg-icon" id="p-dash12" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Pruebas PISA</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                        <svg class="svg-icon" id="p-dash12" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Exámenes Diagnóstico</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                        <svg class="svg-icon" id="p-dash12" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Pruebas Nacionales</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <div class="iq-submenu">
                <h6 class="ml-2 ">Informes y Reportes
                </h6>
                </div>
                <li class="">
                    <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                        <svg class="svg-icon" id="p-dash9" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <rect x="7" y="7" width="3" height="9"></rect>
                            <rect x="14" y="7" width="3" height="5"></rect>
                        </svg>
                        <span class="ml-4">Reportes de estudiantes</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                        <svg class="svg-icon" id="p-dash9" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <rect x="7" y="7" width="3" height="9"></rect>
                            <rect x="14" y="7" width="3" height="5"></rect>
                        </svg>
                        <span class="ml-4">Reportes de tutores</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                        <svg class="svg-icon" id="p-dash9" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <rect x="7" y="7" width="3" height="9"></rect>
                            <rect x="14" y="7" width="3" height="5"></rect>
                        </svg>
                        <span class="ml-4">Informe ITEMS Validados</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>









            </ul>
        </nav>
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">
            <div class="card border-none">
                <div class="card-body p-0">
                    <div class="sidebarbottom-content">
                        <div class="image"><a href="https://fundacionmagistral.org/"> <img
                                    src="{{ asset('admin/images/page-img/42.png') }}" class="img-fluid"
                                    alt="side-bkg"></a></div>
                        <h6 class="mt-4 px-4 body-title">Educación de calidad para un futuro brillante</h6>
                        <a href="https://fundacionmagistral.org/" type="button"
                            class="btn sidebar-bottom-btn mt-4">Fundación Magistral</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3"></div>
    </div>


</div>
