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
            console.log(data)
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
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="showitem(${item.id})" data-toggle="tooltip" data-placement="top" title="Ediar Servicio">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a href="javascript:deleteItem(${item.id})"><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Servicio" style="margin-left: 2px">
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

function showitem(id){
    $.ajax({
        url: '/admin/cotizacion/items/item/show/'+id,
        type: 'POST',
        data: { id:id },
        success: function (data) {
            console.log(data)
            $('#updateitems-cotizacion').modal('show');
            let contenido = `
            <div class="modal-header">
                <h4 class="modal-title">Actualizar items de servicio</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

                <!-- Modal body -->
                <form action="/admin/cotizacion/items/item/update" id="form_aggitems" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                            <input type="hidden" name="id" value="${data.id}">
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="nombre" class="col-sm-2 col-form-label">Titulo:</label>
                                <div class="col-sm-10">
                                    <input type="text" value="${data.nombre}" class="form-control" name="nombre" id="nombre_item" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="estado" id="estado_item" required>
                                    <option value="">Seleccione Estado</option>
                                    <option value="1"${data.estado == '1' ? 'selected' : ''}>Activo</option>
                                    <option value="0"${data.estado == '0' ? 'selected' : ''}>Inactivo</option>
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
            `;
            $('#modal-content').html(contenido);
            // $('#nombre_item').val(data.nombre);
            // $('#id').val(data.id);
            // $("#estado_item option[value='"+ data.estado +"']").attr("selected", true);
            // $('#aggitems-cotizacion').modal('show');
        }
    });
}
function deleteItem(id){
    if(confirm('Desea eliminar este item?')){
        window.location.href = '/admin/cotizacion/items/item/delte/'+id;
    }
}
