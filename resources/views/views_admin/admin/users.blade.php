@section('title') Usuarios @endsection

@extends('views_admin.layouts.app')

@section('jsMain')
    <script src="{{ asset('assets_admin/js/admin.js') }}"></script>
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-xl-5 p-md-3">
                            <div class="table-responsive mb-3" id="Resultados">

                                @if ($errors->any())
                                    <div class="alert alert-danger mb-0" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session()->has('create') && session('create') == 1)
                                    <div class="alert alert-success">
                                        El Usuario se creo correctamente.
                                    </div>
                                @endif

                                @if (session()->has('update') && session('update') == 1)
                                    <div class="alert alert-success">
                                        El Usuario se actualizo correctamente.
                                    </div>
                                @endif

                                @if (session()->has('create') && session('create') == 0)
                                    <div class="alert alert-danger">
                                        Ocurrio un error, contacte al desarrollador.
                                    </div>
                                @endif

                                <a href="{{ route('index') }}"><button type="button" class="btn btn-dark btn-lg mb-2" onclick="cargarbtn(this)">Atras</button></a>

                                {{-- botones de filtro --}}
                                @if(request()->routeIs('users_filtro'))
                                    <a href="{{route('users')}}" class="btn btn-primary btn-lg mb-2 float-right ml-1" onclick="cargarbtn(this)">
                                        Limpiar <i class="fa fa-eraser" aria-hidden="true"></i>
                                    </a>
                                @endif

                                <button type="button" class="btn btn-primary btn-lg float-right mb-2" data-toggle="modal" data-target="#modal-filtro">Filtrar <i class="fa fa-filter" aria-hidden="true"></i>
                                </button>
                                {{-- end botones de fitro --}}

                                <table class="table table-centered table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="12" class="text-center">
                                                <div class="d-inline-block icons-sm mr-2"><i class="fas fa-users"></i></div>
                                                <span class="header-title mt-2">Usuarios</span>
                                            </th>
                                        </tr>
                                        <!--Parte de busqueda de datos-->
                                        <tr>
                                            <th colspan="12" class="text-center">
                                                {{-- <form action="/dashboard/programacion-viaje/get-ciudades" method="get" class="d-inline-block w-50">
                                                    @csrf

                                                    <div class="row col-12 text-center">
                                                        <div class="styled-select col-5">
                                                            <select class="form-control required" id="ciudad_origen" name="ciudad_origen" required onchange="ciudadDestino(this.value)">
                                                                <option value="">Ciudad Origen</option>
                                                            </select>
                                                        </div>
                                                        <div class="styled-select col-5">
                                                            <select class="form-control required" id="ciudad_destino" name="ciudad_destino" required>
                                                                <option value="">Ciudad Destino</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="submit" class="btn btn-primary">Buscar</button>

                                                        </div>
                                                    </div>
                                                </form> --}}
                                            </th>
                                        </tr>
                                        <!--Fin parte de busqueda de datos-->
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Identificacion</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">
                                                    <a href="#">{{ $user->id }}</a>
                                                </th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->identificacion }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->estado }}</td>
                                                <td>{{ $user->roles()->first()->name }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showUser({{ $user->id }}, this)" data-toggle="tooltip" data-placement="top" title="Editar Usuario">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            {{ $users->appends(request()->input())->links() }}

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

<div class="modal fade bs-example-modal-lg" id="modal-create-user" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/users/create" method="POST" onsubmit="cargarbtn('#create_user_btn')">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" placeholder="Escriba el nombre" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificacion</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="identificacion" placeholder="Escriba la identificacion" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo (opcional)</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" placeholder="Escriba el correo" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select name="estado" class="form-control" required>
                                <option value="">Seleccione el estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" placeholder="Escriba la contraseña" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="tipo" class="form-control" onchange="selectTipo(this.value)" required>
                                <option value="">Seleccione el tipo</option>
                                <option value="admin">admin</option>
                                <option value="general">general</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row d-none divPermisos">
                        <label for="permiso" class="col-sm-2 col-form-label">Permiso</label>
                        <div class="col-sm-10 mt-2">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="custominlineCheck1" name="permisos[]" value="universal">
                                <label class="custom-control-label" for="custominlineCheck1">Universal</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="custominlineCheck2" name="permisos[]" value="correos">
                                <label class="custom-control-label" for="custominlineCheck2">Correos</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="custominlineCheck3" name="permisos[]" value="cotizaciones">
                                <label class="custom-control-label" for="custominlineCheck3">Cotizaciones</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="custominlineCheck4" name="permisos[]" value="control ingreso">
                                <label class="custom-control-label" for="custominlineCheck4">Control Ingreso</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="custominlineCheck5" name="permisos[]" value="vehiculos">
                                <label class="custom-control-label" for="custominlineCheck5">Vehiculos</label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary btn-lg waves-effect waves-light" id="create_user_btn" type="submit">Crear</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- AGREGAR FILTRO --}}
<div class="modal fade bs-example-modal-xl" id="modal-filtro" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-title-personal">Agregar Filtros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('users_filtro')}}" id="form-create-tercero" method="GET" onsubmit="cargarbtn('#agregar_filtro_btn')">
                    @csrf
                    <div class="container">
                        <div class="form-group row">                            
                            <div class="col-sm-12 d-flex">

                                <div class="col-sm-6">
                                    <label class="col-sm-12 col-form-label">Ordenar Por</label>
                                    <select name="ordenarpor" class="form-control">
                                        <option value="">Selecciona </option>
                                        <option value="identificacion">Identificacion</option>
                                        <option value="name">Nombre</option>
                                        <option value="email">Correo</option>
                                    </select>
                                </div>


                                <div class="col-sm-6">
                                    <label class="col-sm-12 col-form-label">Estado</label>
                                    <select name="estado" id="propietario" class="form-control">
                                        <option value="">Selecciona</option>
                                        <option value="true">Activo </option>
                                        <option value="false">Inactivo </option>
                                        
                                    </select>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="form-group row">                            
                            <div class="col-sm-12 d-flex">
                                <div class="col-sm-12">
                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Buscar</label>
                                        <input type="text" class="form-control" placeholder="Buscar" name="search"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="mt-5 text-center">
                        <button class="btn btn-primary btn-lg waves-effect waves-light" id="agregar_filtro_btn" type="submit">Aplicar Filtros</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection







