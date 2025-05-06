<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="/" class="header-logo">
            <img src="{{ asset('img/icono/fm-plataforma.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
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
                    <a href="{{ route('study-center.dashboard') }}" class="svg-icon">
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
                            <a href="{{ route('memberships.show', $user->person->studyCenter->membership->id) }}">
                                <i class="las la-minus"></i><span>Detalles de Membresía</span>
                            </a>

                        </li>
                        <li class="{{ request()->is('study-centers/*') ? 'active' : '' }}">
                            <a href="{{ route('study_centers.remembership', $user->person->studyCenter->id) }}">
                                <i class="las la-minus"></i><span>Renovar Membresía</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('membership-histories*') ? 'active' : '' }}">
                            <a href="{{ route('membership_histories_user', $user->id) }}">
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

                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a
                                href="{{ route('students.createStudentToStudyCenter', $user->person->studyCenter->id) }}">
                                <i class="las la-minus"></i><span>Registrar Estudiantes </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.indexToStudyCenter', $user->person->studyCenter->id) }}">
                                <i class="las la-minus"></i><span>Estudiantes Registrados</span>
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

                        <li class="{{ request()->is('tutors/create') ? 'active' : '' }}">
                            <a href="{{ route('tutors.create') }}">
                                <i class="las la-minus"></i><span>Registrar Tutores</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('tutors/studyCenter/*') ? 'active' : '' }}">
                            <a href="{{ route('tutors.indexToStudyCenter', $user->person->studyCenter->id) }}">
                                <i class="las la-minus"></i><span>Tutores registrados </span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="">
                    <a href="#items" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Items</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="items" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li class="{{ request()->is('study_center/items/pisa') ? 'active' : '' }}">
                            <a href="{{route('study_center.items_pisa')}}">
                                <i class="las la-minus"></i><span>Pruebas PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('') ? 'active' : '' }}">
                            <a href="{{route('study-center.items_nacional')}}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('') ? 'active' : '' }}">
                            <a href="{{route('study-center.items_diagnostic')}}">
                                <i class="las la-minus"></i><span>Exámenes Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#tests" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash07" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Exámenes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="tests" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('study-center/test-pisa') ? 'active' : '' }}">
                            <a href="{{route('study-center.test_pisa')}}">
                                <i class="las la-minus"></i><span>Pruebas PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-center/test-nacional') ? 'active' : '' }}">
                            <a href="{{route('study-center.test_nacional_diagnostic')}}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-center/test-diagnostic') ? 'active' : '' }}">
                            <a href="{{route('study-center.test_diagnostic')}}">
                                <i class="las la-minus"></i><span>Exámenes Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class=" ">

                    <a href="{{ route('study-center.certificates') }}"
                       class="{{ request()->is('study-center/certificates*') ? 'active' : '' }}" {{-- Marca como activo si la ruta es de certificados --}}
                       aria-expanded="{{ request()->is('certificates*') ? 'true' : 'false' }}"> {{-- Controla el estado 'aria-expanded' --}}
                        <svg class="svg-icon" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                            <!-- Cuño con Lazo -->
                            <circle cx="12" cy="17" r="3" fill="currentColor"></circle>
                            <path d="M12 15v2.5" stroke="white"></path>
                            <path d="M10.5 17h3" stroke="white"></path>
                            <path d="M12 10c1.5 0 2.5 1 2.5 2s-1 2-2.5 2-2.5-1-2.5-2 1-2 2.5-2z" fill="currentColor"></path>

                            <!-- Lazo -->
                            <path d="M9 16c-1 0-1.5 1-1.5 1s1 1 1.5 1 1.5-1 1.5-1-1-1-1.5-1z" stroke="currentColor"></path>
                            <path d="M15 16c1 0 1.5 1 1.5 1s-1 1-1.5 1-1.5-1-1.5-1 1-1 1.5-1z" stroke="currentColor"></path>
                        </svg>
                        <span class="ml-4">Certificados</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    {{-- Submenú de certificados --}}
                    {{-- Añade la clase 'show' si la ruta actual es de certificados --}}
                    <ul id="certificate" class="iq-submenu collapse {{ request()->is('study-center/certificates*') ? 'show' : '' }}" data-parent="#iq-sidebar-toggle">

                        {{-- Elementos del submenú que abren modales --}}
                        <li class="{{ request()->is('certificates*') ? 'active' : '' }}"> {{-- Marca como activo si la ruta es de certificados --}}
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".certificate-level-items">
                                <i class="las la-minus"></i><span>Nivel ITEMS</span>
                            </button>
                        </li>
                        <li class="{{ request()->is('certificates*') ? 'active' : '' }}">
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".certificate-pisa-diagnostic">
                                <i class="las la-minus"></i><span>Prueba PISA</span>
                            </button>
                        </li>
                        <li class="{{ request()->is('certificates*') ? 'active' : '' }}">
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".certificate-examen-nacional">
                                <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                            </button>
                        </li>
                        <li class="{{ request()->is('certificates*') ? 'active' : '' }}">
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".certificate-examen-diagnostic">
                                <i class="las la-minus"></i><span>Exámenes Diagnósticos</span>
                            </button>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="{{ route('study-center.reports') }}" class="{{ request()->is('study-center/reports*') ? 'active' : '' }}" aria-expanded="{{ request()->is('study-center/reports*') ? 'true' : 'false' }}"> {{-- Enlace a la vista principal de reportes --}}
                        <svg class="svg-icon" id="p-dash9" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect>
                        </svg>
                        <span class="ml-4">Reportes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="metricas" class="iq-submenu collapse {{ request()->is('study-center/reports*') ? 'show' : '' }}" data-parent="#iq-sidebar-toggle"> {{-- Añade la clase 'show' si la ruta es de reportes --}}

                        {{-- Estos botones seguirán abriendo los modales --}}
                        <li class="{{ request()->is('study-center/reports*') ? 'active' : '' }}"> {{-- Mantén la clase activa para los elementos del submenú --}}
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".reports-examen">
                                <i class="las la-minus"></i><span>Reportes Exámenes</span>
                            </button>
                        </li>
                        <li class="{{ request()->is('study-center/reports*') ? 'active' : '' }}">
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".reports-tutors">
                                <i class="las la-minus"></i><span>Reportes Tutores</span>
                            </button>
                        </li>
                        <li class="{{ request()->is('study-center/reports*') ? 'active' : '' }}">
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".reports-centro">
                                <i class="las la-minus"></i><span>Reporte Centro</span>
                            </button>
                        </li>
                        <li class="{{ request()->is('study-center/reports*') ? 'active' : '' }}">
                            <button type="button" class="btn btn-outline-link rounded-pill ml-4"  data-toggle="modal" data-target=".reports-students">
                                <i class="las la-minus"></i><span>Reportes Estudiantes</span>
                            </button>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#reports_items" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash9" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect>
                        </svg>
                        <span class="ml-4">Reportes Items</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="reports_items" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('items/general/study-center') ? 'active' : '' }}">
                            <a href="{{route('study-center.items_general')}}">
                                <i class="las la-minus"></i><span>General</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('items/pisa/study-center') ? 'active' : '' }}">
                            <a href="{{route('study-center.items_pisa')}}">
                                <i class="las la-minus"></i><span>Pruebas PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('items/nacional/study-center') ? 'active' : '' }}">
                            <a href="{{route('study-center.items_nacional')}}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('items/diagnostic/study-center') ? 'active' : '' }}">
                            <a href="{{route('study-center.items_diagnostic')}}">
                                <i class="las la-minus"></i><span>Exámenes Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('') ? 'active' : '' }}">
                    <a href="https://fundacionmagistral.org/ayuda">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9 9c0-1.5 1-2.5 2-2.5s2 1 2 2c0 1-1 1.5-1 2h-1"></path>
                            <line x1="12" y1="16" x2="12" y2="16"></line>
                        </svg>
                        <span class="ml-4">Ayuda</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">
            <div class="card border-none">
                <div class="card-body p-0">
                    <div class="sidebarbottom-content">
                        <div class="image"><a href="https://fundacionmagistral.org/"> <img
                                    src="{{ asset('img/icono/fm-plataforma.png') }}" class="img-fluid"
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

