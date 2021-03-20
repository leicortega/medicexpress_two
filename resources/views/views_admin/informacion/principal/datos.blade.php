@section('title') Información @endsection

@extends('views_admin.layouts.app')

@section('jsMain')
    <script src="{{ asset('assets_admin/js/informacion.js') }}"></script>
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


                                <a href="#" class="btn btn-primary btn-lg float-right mb-2" data-toggle="modal" data-target="#create-info">Agregar +</a>



                            </div>
                        </div>
                        <!-- mostrar datos de la empresa -->
                        <div class="form-inline" style="margin-bottom: 2rem;">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="" >Telefono:</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" value="+593 969 665 037" style="width: 100%;" disabled>
                                    </div>   
                                </div>                    
                            </div>
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="">Correo:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" value="servicioalcliente@medicexpress.com" style="width: 100%;" disabled>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="form-inline" style="margin-bottom: 2rem;">
                            <div class="col-xl-12">
                                <div class="col-lg-2" style="padding: 0 7px;">
                                    <label for="" style="display: block;">Redes Sociales:</label>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="redes sociales" style="width: 100%; margin-right: 5px;" disabled>
                                        </div>                                    
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="redes sociales" style="width: 100%; margin-right: 5px;" disabled>
                                        </div>                                      
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="redes sociales" style="width: 100%; margin-right: 5px;" disabled>
                                        </div> 
                                    </div>    
                                </div>                    
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cotizar">Actualizar Datos</a>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div> <!-- end row -->

        <!-- The Modal -->
        <div class="modal fade" id="create-info">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Contenido</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <form action="{{route('informacion-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            
                                <div class="form-group row" style="padding: 0 30px;">
                                    <label for="contenido" class="col-sm-2 col-form-label">contenido:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contenido" id="contenido" autocomplete="off" required>
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