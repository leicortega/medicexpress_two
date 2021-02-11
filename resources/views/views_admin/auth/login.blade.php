
<!doctype html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>Login | Medicexpress </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Dashboard de administrador Amazonia C&L." name="description" />
        <meta content="Leiner Ortega" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets_admin/images/icono.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets_admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets_admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets_admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5 mt-5">
                            
                            <h5 class="font-size-16 text-white-50 mb-4">Dashboard de administrador Medicexpress.</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <div class="text-center">
                                        <a href="index.html" class="logo"><img src="{{ asset('assets_admin/images/logo.svg') }}" height="70" alt="logo" ></a>
                                    </div>
                                    
                                    <h5 class="mb-5 text-center">Bienvenido</h5>
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="number" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion" value="{{ old('identificacion') }}" name="identificacion" required>
                                                    <label for="identificacion">Identificacion</label>
                                                    
                                                    @error('identificacion')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control @error('identificacion') is-invalid @enderror" id="password" name="password" required>
                                                    <label for="password">Contraseña</label>

                                                    @error('email')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Recordarme</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 mb-5">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Ingresar</button>
                                                </div>
                                                <div class="mt-5 text-center">
                                                    <a href="auth-register.html" class="text-muted">2021 © Medicexpress.</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets_admin/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets_admin/libs/node-waves/waves.min.js') }}"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="{{ asset('assets_admin/js/app.js') }}"></script>

    </body>
</html>

