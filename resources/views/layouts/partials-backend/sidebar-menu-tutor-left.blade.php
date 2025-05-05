<div class="iq-sidebar  sidebar-default " >
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
                    <a href="{{ route('tutor.dashboard') }}" class="svg-icon">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="3" x2="9" y2="21"></line>
                        </svg>
                        <span class="ml-4">Escritorio</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('tutor.dashboard') }}" class="svg-icon">
                        <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-4">Estudiantes Asignados </span>
                    </a>
                </li>
                <li class="">
                    <a href="#items" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash14" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span class="ml-4">Reportes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="items" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li>
                            <a href="#items_noresueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" id="p-dash07" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">ITEMS Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="items_noresueltos" class="iq-submenu collapse" data-parent="#items">
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Prueba PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#items_resueltos" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg class="svg-icon" id="p-dash07" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">ITEMS No Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="items_resueltos" class="iq-submenu collapse" data-parent="#items">
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Prueba PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#examen_noresueltos" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg class="svg-icon" id="p-dash07" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Examen Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="examen_noresueltos" class="iq-submenu collapse" data-parent="#items">
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Prueba PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#examen_resueltos" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg class="svg-icon" id="p-dash07" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Exámen No Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="examen_resueltos" class="iq-submenu collapse" data-parent="#items">
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Prueba PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                                    <a href="{{ route('under.construction') }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                                    </a>
                                </li>

                            </ul>
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
