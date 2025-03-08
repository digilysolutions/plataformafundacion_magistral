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
                    <a href="#membership" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M5 20H19V18C19 15.2 13 14 12 14C11 14 5 15.2 5 18V20Z"></path>
                        </svg>
                        <span class="ml-1">Usuarios Generales</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="membership" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Registrar usuario</span></a>
                        </li>

                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Usuarios Registrados</span></a>
                        </li>
                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Registro Centro Educativo </span></a>
                        </li>
                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Centros Educativos Registrados </span></a>
                        </li>
                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Registro de Validadores </span></a>
                        </li>
                        <li class="{{ request()->is('regionals*') ? 'active' : '' }}">
                            <a href="{{ route('regionals.index') }}"><i class="las la-minus"></i>

                                <span>Validadores Registrados </span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#items_resueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        <span class="ml-1">ITEMS Resueltos</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="items_resueltos" class="iq-submenu collapse" >
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Prueba PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#items_noresueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
                        <span class="ml-1">ITEMS No Resueltos</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="items_noresueltos" class="iq-submenu collapse">
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
                                <i class="las la-minus"></i><span>Pruebas Diagnóstico</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#examenes_resueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        <span class="ml-4">Exámenes Resueltos</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="examenes_resueltos" class="iq-submenu collapse">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Prueba PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#examenes_noresueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                          </svg>
                        <span class="ml-4">Exámenes No Resueltos</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="examenes_noresueltos" class="iq-submenu collapse">
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
                                <i class="las la-minus"></i><span>Pruebas Diagnóstico</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#metrica" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 15 9 9 15 12 21 6"></polyline>
                            <circle cx="3" cy="15" r="2"></circle>
                            <circle cx="9" cy="9" r="2"></circle>
                            <circle cx="15" cy="12" r="2"></circle>
                            <circle cx="21" cy="6" r="2"></circle>
                        </svg>
                        <span class="ml-1">Métricas</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="metrica" class="iq-submenu collapse">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Por Regionales</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Por Distrito Educativo </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Por Centro Educativo </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Por Usuario General </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Por ITEMS </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Por Exámenes </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span> Por tiempo en plataforma </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#examenes_resueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 8c0-1.1 1.34-2 3-2h14c1.66 0 3 0.9 3 2v10c0 1.1-1.34 2-3 2H5c-1.66 0-3-0.9-3-2V8z"></path>
                            <path d="M9 11l-3 4h6l-3-4z"></path>
                            <path d="M2 6l2 2h14l2-2"></path>
                        </svg>
                        <span class="ml-4">Certificados</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="examenes_resueltos" class="iq-submenu collapse">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Solicitados</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Impresos  </span>
                            </a>
                        </li>

                    </ul>
                </li>
                @if ($user->role == 'Administrador')
                    <li class="">
                        <a href="{{ route('levels.index') }}" class="{{ request()->is('levels*') ? 'active' : '' }}">
                            <svg class="svg-icon" id="p-dash9" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                </rect>
                                <rect x="7" y="7" width="3" height="9"></rect>
                                <rect x="14" y="7" width="3" height="5"></rect>
                            </svg>
                            <span class="ml-1">Niveles</span>
                        </a>
                        <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        </ul>
                    </li>
                @endif
                <li class="{{ request()->is('specialties*') ? 'active' : '' }}">
                    <a href="{{ route('specialties.index') }}">
                        <svg class="svg-icon" id="p-dash3" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                        <span class="ml-1">Especialidades</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash6" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="4 14 10 14 10 20"></polyline>
                            <polyline points="20 10 14 10 14 4"></polyline>
                            <line x1="14" y1="10" x2="21" y2="3"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        <span class="ml-1">Centros de estudios</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="return" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Ver Centros de Estudios</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('students*') ? 'active' : '' }}">
                            <a href="{{ route('students.index') }}">
                                <i class="las la-minus"></i><span>Estudiantes</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('tutors*') ? 'active' : '' }}">
                            <a href="{{ route('tutors.index') }}">
                                <i class="las la-minus"></i><span>Tutores</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class=" ">
                    <a href="#membership" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash14" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span class="ml-1">Ubicación</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="membership" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

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
                    </ul>
                </li>


                @if (Auth::check() && ($user->role == 'Administrador' || $user->role == 'Centro Educativo'))
                    <li class=" ">
                        <a href="#feature" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <svg class="svg-icon" id="p-dash5" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                </rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            <span class="ml-1">Membresía</span>
                            <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="10 15 15 20 20 15"></polyline>
                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                            </svg>
                        </a>
                        <ul id="feature" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            @if ($user->role == 'Centro Educativo')
                                <!--Solo para los centros educativos y los estudiantes que no pertenencen a un centro--->
                                <li class="{{ request()->is('memberships*') ? 'active' : '' }}">
                                    <a>
                                        <i class="las la-minus"></i>
                                        <span>Detalles de Membresía</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('memberships*') ? 'active' : '' }}">
                                    <a href="{{ route('memberships.index') }}">
                                        <i class="las la-minus"></i>
                                        <span>Renovar Membresía</span>
                                    </a>
                                </li>
                            @endif
                            @if ($user->role == 'Administrador')
                                <li class="{{ request()->is('memberships*') ? 'active' : '' }}">
                                    <a href="{{ route('memberships.index') }}">
                                        <i class="las la-minus"></i>
                                        <span>Ver Membresías</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('membership-features*') ? 'active' : '' }}">
                                    <a href="{{ route('membership-features.index') }}"><i class="las la-minus"></i>
                                        <span>Características</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
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
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                    <a href="" class="svg-icon">
                        <svg class="svg-icon" id="p-dash1" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="ml-1">Ubicación</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="return" class="iq-submenu collapse ml-4" data-parent="#iq-sidebar-toggle">



                    </ul>
                </li>

                <li class="{{ request()->is('admin/specialties*') ? 'active' : '' }}">
                    <a href=""><i class=""></i>

                        </svg>
                        <span class="ml-4">Especialidad</span>
                    </a>
                </li>


                <li class="{{ request()->is('admin/memberships*') ? 'active' : '' }}">
                    <a href=""><i class=""></i>
                        </svg>
                        <span class="ml-4">Memebresía</span>
                    </a>
                </li>


                <li class="{{ request()->is('admin/tutors*') ? 'active' : '' }}">
                    <a href="{{ route('tutors.index') }}"><i class=""></i>
                        </svg>
                        <span class="ml-4">Tutores</span>
                    </a>
                </li>


                <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class="{{ request()->is('admin/people*') ? 'active' : '' }}">
                        <a href="{{ route('people.index') }}" class="submenu-link">
                            <i class="las la-minus"></i><span>Personas</span>
                        </a>
                    </li>
                </ul>

            </ul>
        </nav>
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">

        </div>
        <div class="p-3"></div>
    </div>

</div>
