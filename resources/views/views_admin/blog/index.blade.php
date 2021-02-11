@section('title') Blog @endsection

@extends('views_admin.layouts.app')

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

                                <a href="/admin/blog/post/crear" class="btn btn-primary btn-lg float-right mb-2">Agregar +</a>

                                <table class="table table-centered table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="12" class="text-center">
                                                <div class="d-inline-block icons-sm mr-2"><i class="uim uim-document-layout-left"></i></div>
                                                <span class="header-title mt-2">Posts</span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Autor</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Titulo</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <th>{{ $post->users->name }}</th>
                                                <td>{{ Carbon\Carbon::parse($post->fecha)->format('d-m-Y') }}</td>
                                                <td>{{ $post->titulo }}</td>
                                                <td class="text-center">
                                                    <a href="/blog/post/ver/{{ $post->id }}"><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Post">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button></a>
                                                    <a href="javascript:eliminar_post({{ $post->id }})"><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Elinimar Post" style="margin-left: 2px">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                            {{ $posts->links() }}

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>

@endsection







