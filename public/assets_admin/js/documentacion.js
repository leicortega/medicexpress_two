$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('#form_agregar_documento').submit(function () {
        $('#btn_submit_agregar_documento').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        var form = document.getElementById('form_agregar_documento');
        var formData = new FormData(form);
        $.ajax({
            url: '/informacion/documentacion/agregar_documento',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
	        processData: false,
            success: function (data) {
                $('#btn_submit_agregar_documento').html('Enviar').attr('disabled', false);
                $('#form_agregar_documento')[0].reset();
                $('#fechas_vigencias').addClass('d-none');
                $('#fecha_inicio_vigencia').removeAttr('required').val('');
                $('#fecha_fin_vigencia').removeAttr('required').val('');
                $('#modal_agregar_documento').modal('hide');
                $('#collapse_'+data).collapse('show');
                cargar_documentos(data);
            }
        });

        return false;
    });

    $('#form_exportar_documentos').submit(function () {
        $('#btn_submit_exportar_documentos').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);

        $.ajax({
            url: '/informacion/documentacion/exportar_documentos',
            type: 'POST',
            data: $('#form_exportar_documentos').serialize(),
            success: function (data) {
                $('#btn_submit_exportar_documentos').html('Enviar').attr('disabled', false);
                $('#form_exportar_documentos')[0].reset();
                $('#modal_exportar').modal('hide');
                window.open('/storage/docs/documentacion/documentacion.zip', '_blank');
            }
        });

        return false;
    });

});

function eliminar_modulo(id) {
    if (window.confirm('¿Seguro desea eliminar el modulo?')) {
        $.ajax({
            url: '/informacion/documentacion/delete_modulo',
            type: 'post',
            data: {id:id},
            success: function (data) {
                window.location.reload();
            }
        });
    }
}


function cambiarviegencia(act){
    if(act){
        $('#fechas_vigencias').removeClass('d-none');
        $('#fecha_inicio_vigencia').attr('required', true);
        $('#fecha_fin_vigencia').attr('required', true);
    }else{
        $('#fechas_vigencias').addClass('d-none');
        $('#fecha_inicio_vigencia').removeAttr('required').val('');
        $('#fecha_fin_vigencia').removeAttr('required').val('');
    }
}

function agregar_documento(id) {
    switch (id) {
        case 1:
                $('#nombre_documento').html(`
                    <option value="">Seleccione</option>
                    <option value="C.C REPRESENTANTE LEGAL">C.C REPRESENTANTE LEGAL</option>
                    <option value="CAMARA DE COMERCIO DE FLORENCIA">CAMARA DE COMERCIO DE FLORENCIA</option>
                    <option value="CAMARA DE COMERCIO DE NEIVA">CAMARA DE COMERCIO DE NEIVA</option>
                    <option value="RUT">RUT</option>
                    <option value="EGISTRO UNICO DE PROPONENTE">EGISTRO UNICO DE PROPONENTE</option>
                    <option value="Otros">Otros</option>
                `);
            break;

        case 2:
                $('#nombre_documento').html(`
                    <option value="">Seleccione</option>
                    <option value="HABILITACIÓN SERVICIO PUBLICO TERRESTRE ESPECIAL">HABILITACIÓN SERVICIO PUBLICO TERRESTRE ESPECIAL</option>
                    <option value="HABILITACIÓN TRANSPORTE DE CARGA">HABILITACIÓN TRANSPORTE DE CARGA</option>
                    <option value="CAPACIDAD TRANSPORTADORA">CAPACIDAD TRANSPORTADORA</option>
                    <option value="Otros">Otros</option>
                `);
            break;

        case 3:
                $('#nombre_documento').html(`
                    <option value="">Seleccione</option>
                    <option value="SEDE NEIVA">SEDE NEIVA</option>
                    <option value="SEDE PAUJIL">SEDE PAUJIL</option>
                    <option value="Otros">Otros</option>
                `);
            break;

        case 4:
                $('#nombre_documento').html(`
                    <option value="">Seleccione</option>
                    <option value="AÑO GRAVABLE 2018 (DECLARACIÓN DE RENTA, ESTADOS FINANCIEROS BASICOS, NOTAS EXPLICATIVAS, ANEXO DE AUXILIARES)">AÑO GRAVABLE 2018 (DECLARACIÓN DE RENTA, ESTADOS FINANCIEROS BASICOS, NOTAS EXPLICATIVAS, ANEXO DE AUXILIARES)</option>
                    <option value="AÑO GRAVABLE 2019 (DECLARACIÓN DE RENTA, ESTADOS FINANCIEROS BASICOS, NOTAS EXPLICATIVAS, ANEXO DE AUXILIARES)">AÑO GRAVABLE 2019 (DECLARACIÓN DE RENTA, ESTADOS FINANCIEROS BASICOS, NOTAS EXPLICATIVAS, ANEXO DE AUXILIARES)</option>
                    <option value="AÑO GRAVABLE 2020 (DECLARACIÓN DE RENTA, ESTADOS FINANCIEROS BASICOS, NOTAS EXPLICATIVAS, ANEXO DE AUXILIARES)">AÑO GRAVABLE 2020 (DECLARACIÓN DE RENTA, ESTADOS FINANCIEROS BASICOS, NOTAS EXPLICATIVAS, ANEXO DE AUXILIARES)</option>
                    <option value="Otros">Otros</option>
                `);
            break;

        default:
                $('#nombre_documento').html(`
                    <option value="">Seleccione</option>
                    <option value="Otros">Otros</option>
                `);
            break;
    }

    $('#documentacion_id').val(id);

    $('#modal_agregar_documento').modal('show')
}

function change_nombre(nombre) {
    if (nombre == 'Otros') {
        $('#change_nombre').removeClass('d-none');
    } else {
        $('#change_nombre').addClass('d-none');
    }
}

function cargar_documentos(id) {
    $.ajax({
        url: '/informacion/documentacion/cargar_documentos',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            let content = '';
            data.forEach(item => {
                content += `
                    <tr>
                        <td class="text-left">${item.nombre}</td>
                        <td class="text-left">${formatoFecha(item.fecha_inicio_vigencia) ?? 'N/A'}</td>
                        <td class="text-left">${formatoFecha(item.fecha_fin_vigencia) ?? 'N/A'}</td>

                        <td>
                            <a href="/storage/${item.file}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-danger" onclick="eliminar_documento(${item.id}, ${id})"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });

            $('#content_table_documentos_'+id).html(content);
        }
    });
}

function formatoFecha(texto){
    if(texto == '' || texto == null){
      return null;
    }
    return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
  
}

function eliminar_documento(id, id_modulo) {
    if (window.confirm('¿Seguro desea eliminar el documento?')) {
        $.ajax({
            url: '/informacion/documentacion/delete_documento',
            type: 'post',
            data: {id:id},
            success: function (data) {
                cargar_documentos(id_modulo);
            }
        });
    }
}

function exportar_documentos() {
    $.ajax({
        url: '/informacion/documentacion/cargar_documentos_all',
        type: 'POST',
        success: function (data) {
            let content = '';
            data.forEach(item => {
                content += `
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="customCheck${item.id}" name="documentos[]" value="${item.id}">
                        <label class="custom-control-label" for="customCheck${item.id}">${item.nombre}</label>
                    </div>
                `;
            });

            $('#content_exportar_documentos').html(content);
            $('#modal_exportar').modal('show');
        }
    });
}
