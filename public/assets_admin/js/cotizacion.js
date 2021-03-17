$(document).ready(function () {
    $('#form_aggitems').submit(function () {
        $.ajax({
            url: '/admin/cotizacion/items/create',
            type: 'POST',
            data: $('#form_aggitems').serialize(),
            success: function (data) {
                showItemsServicio(data.id);
                $('#detalle_cotizacion_id').val('');
                $('#aggitems-cotizacion').modal('hide');
            }
        });

        return false;
    })
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showServicio(id) {
    $.ajax({
        url: '/admin/cotizacion/show',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            $('#nombre').val(data.nombre);
            $('#id').val(data.id);
            $("#estado option[value='"+ data.estado +"']").attr("selected", true);
            $('#create-cotizacion').modal('show');
        }
    });
}

function LimpiarFormulario() {
    $('#nombre').val('');
    $('#id').val('');
    $("#estado option").removeAttr("selected");
}

function eliminarServicio(id) {
    if (confirm('¿Esta seguro de eliminar el servico de cotización?')) {
        window.location.href = '/admin/cotizacion/delete/'+id;
    }
}

function showItemsServicio(id) {
    $.ajax({
        url: '/admin/cotizacion/items/show',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            let html = `
            <a href="#" class="btn btn-primary btn-lg float-right mb-2" data-toggle="modal" data-target="#aggitems-cotizacion" onclick="aggItem(${id})">Agregar +</a>

            <table class="table table-centered table-hover table-bordered mb-0">
                <thead>
                    <tr>
                        <th colspan="12" class="text-center">
                            <div class="d-inline-block icons-sm mr-2"><i class="uim uim-document-layout-left"></i></div>
                            <span class="header-title mt-2">Items de Servicio de Cotización</span>
                        </th>
                    </tr>
                    <tr>
                        <th class="text-center" scope="col">Titulo</th>
                        <th class="text-center" scope="col">Estado</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>`;
                    data.forEach(item => {
                        html += `
                        <tr>
                            <th class="text-center">${item.nombre}</th>
                            <td class="text-center">${item.estado == 1 ? 'Activo' : 'Inactivo'}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showServicio({{$cotizacion->id}})" data-toggle="tooltip" data-placement="top" title="Ediar Servicio">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a href="javascript:eliminarServicio({{ $cotizacion->id }})"><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Servicio" style="margin-left: 2px">
                                    <i class="mdi mdi-delete"></i>
                                </button></a>
                            </td>
                        </tr>`;
                    });
            html += `
                </tbody>
            </table>`;

            $('#content_table_items').html(html);
        }
    });
    $('#showitems-cotizacion').modal('show');
}

function aggItem(id) {
    $('#detalle_cotizacion_id').val(id);
}
