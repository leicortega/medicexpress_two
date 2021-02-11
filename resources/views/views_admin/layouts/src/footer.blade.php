<script src="{{ asset('assets_admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets_admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets_admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets_admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets_admin/libs/node-waves/waves.min.js') }}"></script>

<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<!-- datepicker -->
<script src="{{ asset('assets_admin/libs/air-datepicker/js/datepicker.min.js') }}"></script>
<script src="{{ asset('assets_admin/libs/air-datepicker/js/i18n/datepicker.es.js') }}"></script>

<!-- apexcharts -->
{{-- <script src="{{ asset('assets_admin/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

<script src="{{ asset('assets_admin/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!-- Jq vector map -->
<script src="{{ asset('assets_admin/libs/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets_admin/libs/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

@yield('Plugins')

{{-- <script src="{{ asset('assets_admin/js/pages/dashboard.init.js') }}"></script> --}}

<script src="{{ asset('assets_admin/js/app.js') }}"></script>
<script src="{{ asset('assets_admin/js/peticiones.js') }}"></script>

@yield('jsMain')

<script>
    // Alerta Documentos
    $.ajax({
        url: '/app/sistema/alertas/documentos',
        type: 'POST',
        success: function (data) {
            console.log(data);
        }
    });
</script>
