@section('title') Dashnoard @endsection

@extends('views_admin.layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5>Bienvenido</h5>
                                <p class="text-muted">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <div class="row mt-5">

                            @canany(['correos', 'universal'])
                                <div class="col-lg-4">
                                    <div class="card border shadow-none">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="icons-md mr-3">
                                                    <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M17 9H7A1 1 0 0 1 7 7H17a1 1 0 0 1 0 2zM17 13H7a1 1 0 0 1 0-2H17a1 1 0 0 1 0 2z"></path><path class="uim-tertiary" d="M19,2H5A3.00328,3.00328,0,0,0,2,5V15a3.00328,3.00328,0,0,0,3,3H16.58594l3.707,3.707A.99991.99991,0,0,0,22,21V5A3.00328,3.00328,0,0,0,19,2ZM17,13H7a1,1,0,0,1,0-2H17a1,1,0,0,1,0,2Zm0-4H7A1,1,0,0,1,7,7H17a1,1,0,0,1,0,2Z"></path></svg></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Correos</h5>
                                                    <p class="text-muted">If several languages coalesce</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <a href="#">Ir a Correos</a>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            @endcanany

                            @canany(['cotizaciones', 'universal'])
                                {{-- <div class="col-lg-3"> --}}
                                    <div class="card border shadow-none">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="icons-md mr-3">
                                                    <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><polygon class="uim-quaternary" points="22 11 10 11 10 2 8 2 8 11 8 11 8 13 8 13 8 22 10 22 10 13 22 13 22 11"></polygon><path class="uim-primary" d="M3,2H8A0,0,0,0,1,8,2V22a0,0,0,0,1,0,0H3a1,1,0,0,1-1-1V3A1,1,0,0,1,3,2Z"></path><path class="uim-tertiary" d="M10 2H21a1 1 0 0 1 1 1v8a0 0 0 0 1 0 0H10a0 0 0 0 1 0 0V2A0 0 0 0 1 10 2zM10 13H22a0 0 0 0 1 0 0v8a1 1 0 0 1-1 1H10a0 0 0 0 1 0 0V13A0 0 0 0 1 10 13z"></path></svg></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Cotizaciones</h5>
                                                    <p class="text-muted">Neque porro quisquam est</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-center">
                                            <a href="#">Ir a Cotizaciones</a>
                                        </div>
                                    </div>
                                </div>
                            @endcanany

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right ml-2">
                                            <a href="#">Ver todas</a>
                                        </div>
                                        <h5 class="header-title mb-4">Notificaciones</h5>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Mensaje</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection