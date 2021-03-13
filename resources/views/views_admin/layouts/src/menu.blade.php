
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="mb-3">
                    <a href="/admin" class="waves-effect">
                        <div class="d-inline-block icons-sm mr-1 uim-icon-primary"><i class="uim uim-airplay"></i></div>
                        <span class="text-dark">Escritorio</span>
                    </a>
                </li>

                @if ( Request::is('admin') || Request::is('informacion/covid') )

                    <li class="menu-title">Modulos</li>

                    {{-- @canany(['blog', 'universal']) --}}
                        <li>
                            <a href="/admin/blog" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-document-layout-left"></i></div>
                                <span>Blog</span>
                            </a>
                        </li>

                    <li class="menu-title">Landing Page</li>
                        <li>
                            <a href="/admin/promociones" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-bookmark"></i></div>
                                <span>Promociones</span>
                            </a>
                            
                        </li>
                    {{-- @endcanany


                    @canany(['universal']) --}}

                        <li class="menu-title">Administrador</li>

                        <li>
                            <a href="/admin/users" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-object-group"></i></div>
                                <span>Usuarios</span>
                            </a>
                        </li>

                    {{-- @endcanany --}}

                @endif

                @if ( Request::is('admin/blog') || Request::is('admin/blog/*') )

                    <li class="menu-title">Blog</li>

                    <li>
                        <a href="/admin/blog" class="waves-effect">
                            <div class="d-inline-block icons-sm"></div>
                            <span>Lista Posts</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/blog/post/crear"  class="waves-effect">
                            <div class="d-inline-block icons-sm"></div>
                            <span>Crear</span>
                        </a>
                    </li>

                @endif

                @if ( Request::is('admin/promociones') || Request::is('admin/promociones/*') )

                    <li class="menu-title">Promociones</li>

                    <li>
                        <a href="/admin/promociones" class="waves-effect">
                            <div class="d-inline-block icons-sm"></div>
                            <span>Lista Planes</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" data-toggle="modal" data-target="#create-promocion" class="waves-effect">
                            <div class="d-inline-block icons-sm"></div>
                            <span>Crear</span>
                        </a>
                    </li>

                @endif

                @if ( Request::is('admin/users') || Request::is('admin/users/*') )

                    <li class="menu-title">Usuarios</li>

                    <li>
                        <a href="/admin/users" class="waves-effect">
                            <div class="d-inline-block icons-sm"></div>
                            <span>Lista de Usuarios</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" data-toggle="modal" data-target="#modal-create-user" class="waves-effect">
                            <div class="d-inline-block icons-sm"></div>
                            <span>Crear</span>
                        </a>
                    </li>

                @endif
                            
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
