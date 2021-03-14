@section('title') Promociones @endsection

@extends('views_admin.layouts.app')

@section('jsMain')
    <script src="{{ asset('assets_admin/js/promociones.js') }}"></script>
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


                                <a href="#" class="btn btn-primary btn-lg float-right mb-2" data-toggle="modal" data-target="#create-promocion">Agregar +</a>

                                <table class="table table-centered table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="12" class="text-center">
                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-document-layout-left"></i></div>
                                                <span class="header-title mt-2">Promociones</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" scope="col">Titulo</th>
                                            <th class="text-center" scope="col">Precio</th>
                                            <th class="text-center" scope="col">Descripción</th>
                                            <th class="text-center" scope="col">Imagen</th>
                                            <th class="text-center" scope="col">Fecha</th>
                                            <th class="text-center" scope="col">Estado</th>
                                            <th class="text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promociones as $promocion)
                                            <tr>
                                                <th class="text-center">{{ $promocion->titulo }}</th>
                                                <td class="text-center">${{ $promocion->precio }}</td>
                                                <td class="text-center">{{ $promocion->descripcion }}</td>
                                                <td class="text-center">
                                                    <img src="{{ \Storage::url($promocion->imagen) }}" alt="" style="width: 50px;">
                                                </td>
                                                <td class="text-center">{{ Carbon\Carbon::parse($promocion->fecha)->format('d-m-Y') }}</td>
                                                <td class="text-center">{{$promocion->estado}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showPlan({{$promocion->id}})" data-toggle="tooltip" data-placement="top" title="Ver Plan">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <a href="javascript:eliminar_plan({{ $promocion->id }})"><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Plan" style="margin-left: 2px">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $promociones->links() }}

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->

        <!-- The Modal -->
        <div class="modal fade" id="create-promocion">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Promoción</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <form action="{{route('promociones-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="titulo" class="col-sm-2 col-form-label">Titulo:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="titulo" id="titulo" autocomplete="off" required>
                                    </div>   
                                </div>
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="precio" id="precio" autocomplete="off" required>
                                    </div>   
                                </div>
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" autocomplete="off" required>
                                    </div>   
                                </div>
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
                                    </div>   
                                </div>
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="">Seleccione Estado</option>
                                            <option value="activo">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        </select>
                                    </div>   
                                </div>
                            
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

    </div> <!-- container-fluid -->
</div>
@endsection