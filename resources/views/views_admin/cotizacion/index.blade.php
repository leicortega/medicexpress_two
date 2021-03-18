@section('title') Cotizacion @endsection

@extends('views_admin.layouts.app')

@section('jsMain')
    <script src="{{ asset('assets_admin/js/cotizacion.js') }}"></script>
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

                                @if (session()->has('create'))
                                    <div class="alert alert-success {{ (session()->has('create') == 1) ? 'alert-success' : 'alert-danger' }}">
                                        {{ session('mensaje') }}
                                    </div>
                                @endif


                                <a href="{{ route('admin') }}"><button type="button" class="btn btn-dark btn-lg mb-2" onclick="cargarbtn(this)">Atras</button></a>


                                <a href="#" class="btn btn-primary btn-lg float-right mb-2" data-toggle="modal" data-target="#create-cotizacion" onclick="LimpiarFormulario()">Agregar +</a>

                                <table class="table table-centered table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="12" class="text-center">
                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-document-layout-left"></i></div>
                                                <span class="header-title mt-2">Servicios de Cotización</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" scope="col">Titulo</th>
                                            <th class="text-center" scope="col">Estado</th>
                                            <th class="text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cotizaciones as $cotizacion)
                                            <tr>
                                                <th class="text-center">{{ $cotizacion->nombre }}</th>
                                                <td class="text-center">{{ $cotizacion->estado == 1 ? 'Activo' : 'Inactivo' }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showItemsServicio({{$cotizacion->id}})" data-toggle="tooltip" data-placement="top" title="Items Servicio">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showServicio({{$cotizacion->id}})" data-toggle="tooltip" data-placement="top" title="Ediar Servicio">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="javascript:eliminarServicio({{ $cotizacion->id }})"><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Servicio" style="margin-left: 2px">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->

        <!-- The Modal -->
        <div class="modal fade" id="create-cotizacion">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Cotización</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{route('cotizacion.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="nombre" class="col-sm-2 col-form-label">Titulo:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="">Seleccione Estado</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="id">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="aggitems-cotizacion" style="z-index: 1051;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar items de servicio</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{route('cotizacion.create.item')}}" id="form_aggitems" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="nombre" class="col-sm-2 col-form-label">Titulo:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nombre" id="nombre_item" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="estado" id="estado_item" required>
                                            <option value="">Seleccione Estado</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="detalle_cotizacion_id" id="detalle_cotizacion_id">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="updateitems-cotizacion" style="z-index: 1051;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="modal-content">        

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="showitems-cotizacion">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Items de servicio</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                    <div class="modal-body" id="content_table_items">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
