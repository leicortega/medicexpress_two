@extends('views_admin.layouts.app')

@section('title') Ver Blog @endsection

@section('Plugins')
    <script src="{{ asset('assets_admin/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/pages/form-editor.init.js') }}"></script>
@endsection

@section('jsMain')
    <script src="{{ asset('assets_admin/js/blog.js') }}"></script>
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
                                    <div class="alert {{ (session()->has('create') == 1) ? 'alert-success' : 'alert-danger' }}">
                                        {{ session('mensaje') }}
                                    </div>
                                @endif

                                @if (session()->has('respuesta') && session('respuesta') == 1)
                                    <div class="alert alert-success">
                                        El correo fue enviado correctamente.
                                    </div>
                                @endif

                                <form action="/blog/post/crear" method="post" id="form_crear_post" enctype="multipart/form-data">
                                    @csrf

                                    <h4 class="header-title">Actualizar Post</h4>

                                    <div class="mt-5">
                                        <h5 class="font-size-14">Titulo</h5>
                                        <input class="form-control" type="text" name="titulo" id="titulo" value="{{ $post->titulo }}" required>
                                    </div>

                                    <div class="mt-3">
                                        <img src="{{ \Storage::url($post->imagen) }}" alt="" class="rounded" 
                                        style="width: 150px; height: auto;">
                                    </div>

                                    <div class="mt-3">
                                        <h5 class="font-size-14">Cambiar Imagen</h5>
                                        <input class="form-control" type="file" name="imagen" id="imagen" accept="image/*" value="{{ $post->imagen }}">
                                    </div>

                                    <div class="mt-3">
                                        <h5 class="font-size-14">Contenido</h5>
                                        <textarea id="elm1" class="elm1" name="contenido" class="text-white">{{ $post->contenido }}</textarea>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <h5 class="font-size-14">¿Tiene galeria de imagenes?</h5>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="custominlineRadio1" name="galeria" value="Si" class="custom-control-input" {{ $post->galeria == 'Si' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="custominlineRadio1">Si</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="custominlineRadio2" name="galeria" value="No" class="custom-control-input" {{ $post->galeria == 'No' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="custominlineRadio2">No</label>
                                        </div>
                                    </div>

                                    @if ( $post->galeria == 'Si' )
                                        <div class="mt-3">
                                            @foreach ($post->media_posts as $post_img)
                                                <img src="{{ \Storage::url($post_img->imagen) }}" alt="" class="rounded" style="width: 150px; height: auto;">
                                                <a href="/blog/post/delete/media/{{ $post_img->id }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="mt-4 {{ $post->galeria == 'Si' ? '' : 'd-none' }}" id="input_galeria">
                                        <h5 class="font-size-14">Seleccione las imagenes</h5>
                                        <input class="form-control" type="file" name="input_galeria[]" multiple accept="image/*">
                                    </div>

                                    <input type="hidden" name="id" value="{{ $post->id }}">

                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <button type="submit" class="btn btn-primary btn-lg mt-5">Enviar</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection







