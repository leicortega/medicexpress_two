$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('#form_agg_contacto').submit(function () {
        btn = this;
        $(btn).find('button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $(btn).find('button').attr('disabled', 'true');
        $.ajax({
            url: '/terceros/agg_contacto',
            type: 'POST',
            data: $('#form_agg_contacto').serialize(),
            success: function (data) {
                $(btn).find('button').html('Enviar');
                $(btn).find('button').removeAttr('disabled');
                $('#agg_contacto').modal('hide');
                $('#form_agg_contacto')[0].reset();
                cargar_contactos(data);
            }
        });

        return false;
    });

    $('#agg_documento').submit(function () {
        btn = this;
        $(btn).find('button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $(btn).find('button').attr('disabled', 'true');
        var form = document.getElementById('agg_documento');
        var formData = new FormData(form);
        $.ajax({
            url: '/terceros/agg_documento',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
	        processData: false,
            success: function (data) {
                $(btn).find('button').html('Enviar');
                $(btn).find('button').removeAttr('disabled');
                $('#agg_documento')[0].reset();
                $('#agg_documento_modal').modal('hide');
                cargar_documentos(data.terceros_id);
            }
        });

        return false;
    });

    $('#form_crear_cotizacion').submit(function () {
        if($('#cotizacion_creada').val() == ''){
            if ($('#fecha_ida').val() == '' ||
                $('#fecha_regreso').val() == '' ||
                $('#tipo_servicio').val() == '' ||
                $('#tipo_vehiculo').val() == '' ||
                $('#departamento_origen').val() == '' ||
                $('#ciudad_origen').val() == '' ||
                $('#departamento_destino').val() == '' ||
                $('#ciudad_destino').val() == '' ||
                $('#cotizacion_por').val() == '' ||
                $('#valor_unitario').val() == '' ||
                $('#cantidad').val() == '') {
                $('#alert_crear_cotizacion').removeClass('d-none');
            } else {
                $('#btn_submit_cotizacion').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                $('#btn_submit_cotizacion').attr('disabled', 'true');
                $('#alert_crear_cotizacion').addClass('d-none');
                $.ajax({
                    url: '/terceros/crear_cotizacion',
                    type: 'POST',
                    data: $('#form_crear_cotizacion').serialize(),
                    success: function (data) {
                        $('#btn_submit_cotizacion').html('Enviar');
                        $('#btn_submit_cotizacion').removeAttr('disabled');
                        window.open('/terceros/print_cotizacion/'+data.id, '_blank');
                        $('#form_crear_cotizacion')[0].reset();
                        $('#modal_crear_cotizacion').modal('hide');
                        cargar_cotizaciones(data.tercero_id);
                        back_cotizacion();
                    }
                });
            }
        }else{
            $('#btn_submit_cotizacion').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $('#btn_submit_cotizacion').attr('disabled', 'true');
            $('#alert_crear_cotizacion').addClass('d-none');
            $.ajax({
                url: '/terceros/crear_cotizacion',
                type: 'POST',
                data: $('#form_crear_cotizacion').serialize(),
                success: function (data) {
                    console.log(data);
                    $('#btn_submit_cotizacion').html('Enviar');
                    $('#btn_submit_cotizacion').removeAttr('disabled');
                    window.open('/terceros/print_cotizacion/'+data.id, '_blank');
                    $('#form_crear_cotizacion')[0].reset();
                    $('#modal_crear_cotizacion').modal('hide');
                    cargar_cotizaciones(data.tercero_id);
                    back_cotizacion();
                }
            });
        }


        return false;
    });

    $('#form_eliminar_cotizacion').submit(function () {
        $.ajax({
            url: '/terceros/eliminar_cotizacion',
            type: 'POST',
            data: $('#form_eliminar_cotizacion').serialize(),
            success: function (data) {
                $('#modal_eliminar_cotizacion').modal('hide');
                $('#form_eliminar_cotizacion')[0].reset();
                console.log(data);
                cargar_cotizaciones(data);
                cargar_contratos(data);
            }
        });

        return false;
    });

    $('#form_eliminar_contrato').submit(function () {
        $.ajax({
            url: '/terceros/eliminar_contrato',
            type: 'POST',
            data: $('#form_eliminar_contrato').serialize(),
            success: function (data) {
                $('#modal_eliminar_contrato').modal('hide');
                $('#form_eliminar_contrato')[0].reset();
                cargar_contratos(data);
            }
        });

        return false;
    });

    $('#form_generar_contrato').submit(function () {
        $('#btn_generar_contrato').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $('#btn_generar_contrato').attr('disabled', 'true');
        $.ajax({
            url: '/terceros/generar_contrato',
            type: 'POST',
            data: $('#form_generar_contrato').serialize(),
            success: function (data) {
                $('#modal-crear-contrato').modal('hide');
                $('#form_generar_contrato')[0].reset();
                cargar_contratos(data.tercero);
                $('#collapseContratos').collapse('show');
                window.open('/terceros/print_contrato/'+data.trayecto, '_blank');
                $('#btn_generar_contrato').html('Enviar');
                $('#btn_generar_contrato').removeAttr('disabled');
            }
        });

        return false;
    });

    $('#form_actualizar_contrato').submit(function () {
        $('#btn_actualizar_contrato').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $('#btn_actualizar_contrato').attr('disabled', 'true');
        $.ajax({
            url: '/terceros/actualizar_contrato',
            type: 'POST',
            data: $('#form_actualizar_contrato').serialize(),
            success: function (data) {
                $('#modal_editar_contrato').modal('hide');
                $('#form_actualizar_contrato')[0].reset();
                cargar_contratos(data.tercero);
                window.open('/terceros/print_contrato/contrato/'+data.contrato, '_blank');
                $('#btn_actualizar_contrato').html('Enviar');
                $('#btn_actualizar_contrato').removeAttr('disabled');
            }
        });

        return false;
    });

    $('#form_agregar_trayecto').submit(function () {
        $('#btn_agg_trayecto').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $('#btn_agg_trayecto').attr('disabled', 'true');
        $.ajax({
            url: '/terceros/agregar_trayecto',
            type: 'POST',
            data: $('#form_agregar_trayecto').serialize(),
            success: function (data) {
                $('#modal_agregar_trayecto').modal('hide');
                $('#form_agregar_trayecto')[0].reset();
                ver_trayectos(data.contrato);
                window.open('/terceros/print_contrato/'+data.trayecto, '_blank');
                $('#btn_agg_trayecto').html('Enviar');
                $('#btn_agg_trayecto').removeAttr('disabled');
            }
        });

        return false;
    });


    $('#form_agregar_trayecto_cotizacion').submit(function () {
        $('#btn_agg_trayecto_cotizacion').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $('#btn_agg_trayecto_cotizacion').attr('disabled', 'true');
        $.ajax({
            url: '/terceros/agregar_trayecto_cotizacion',
            type: 'POST',
            data: $('#form_agregar_trayecto_cotizacion').serialize(),
            success: function (data) {
                $('#modal_agregar_trayecto_cotizacion').modal('hide');
                $('#form_agregar_trayecto_cotizacion')[0].reset();
                ver_trayectos_cotizacion(data.cotizacion_id);
                window.open('/terceros/print_cotizacion/'+data.trayecto, '_blank');
                $('#btn_agg_trayecto_cotizacion').html('Enviar');
                $('#btn_agg_trayecto_cotizacion').removeAttr('disabled');
            }
        });

        return false;
    });

    cargarDepartamentos();
});





function limpiarFormulario(form, fecha, nombre, tipo_identificacion, identificacion, direccion, correo, telefono, cotiza, name, cargo, telefo, corre){
    $('#'+form)[0].reset();
    $('#table_cotizaciones_id').html(`<tr>
                                                                <td id="fecha_ida_preview"></td>
                                                                <td id="fecha_regreso_preview"></td>
                                                                <td id="descripcion_preview" style="text-align: justify; padding:5px;"></td>
                                                                <td id="valor_unitario_preview"></td>
                                                                <td id="cantidad_preview"></td>
                                                                <td id="total_preview"></td>
                                                            </tr>`);
    cotizacion_uno = `Neiva, ${ fecha }


Señores:
${ nombre }`;



cotizacion_uno += `
`+ (tipo_identificacion == 'Cedula de Ciudadania' ? 'CC. ' + identificacion : 'NIT. ' + identificacion) ;

cotizacion_uno += `
Dirección:  `+ direccion ?? 'N/A ';

cotizacion_uno += `
E-mail:  `+ correo ?? 'N/A ';

cotizacion_uno += `
E-Telefono(s):  `+ telefono ?? 'N/A ';

$('#cotizacion_parte_uno').val(cotizacion_uno + `

COTIZACIÓN No. ${ cotiza }

Agradecemos su interés y preferencia, de acuerdo a su solicitud me permito remitir propuesta comercial, tenga en cuenta que los precios aquí expuestos son de uso exclusivo para el servicio al cual cotizo.

Descripción del servicio:`);

$('#numero_cotizacion').val(cotiza);

$('#cotizacion_parte_dos').val(`El servicio se presta según lo pactado, si es CON DISPONIBILIDAD (para hacer varios recorridos) o SIN DISPONIBILIDAD (recoger y dejar en un punto acordado). Inf. En el formato de cotización se especifica. En caso tal que cambie lo pactado, tiene un valor diferente.

Se debe confirmar el servicio con un día de anticipación dependiendo el destino.

La reserva se confirma y se garantiza con la consignación o formato de transferencia del anticipo correspondiente al 100% del valor del servicio.

En caso de cancelar el servicio se cobra el 50% del valor del pagado.

Al remitir consignación daremos por hecho  al servicio y se acoge a las políticas aquí expuestas.





________________________________________________
`+name+`
`+cargo+`
`+telefo+`
`+corre);

    back_cotizacion();
}

function cargar_contactos(id) {
    $.ajax({
        url: '/terceros/cargar_contactos',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            let content = '';
            data.forEach(contacto => {
                content += `
                    <tr>
                        <td scope="row">${ contacto.identificacion }</td>
                        <td>${ contacto.nombre }</td>
                        <td>${ contacto.telefono }</td>
                        <td>${ contacto.direccion }</td>
                        <td class="text-center"><button type="button" onclick="eliminar_contacto(${ contacto.id }, this)" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button></td>
                    </tr>
                `;
            });
            $('#content_table_contactos').html(content);
        }
    });
}

function cargar_documentos(terceros_id) {
    $.ajax({
        url: '/terceros/cargar_documentos',
        type: 'POST',
        data: {terceros_id:terceros_id},
        success: function (data) {
            content = '';
            data.forEach( function (documento, indice) {
                content += `
                <tr>
                    <td scope="row">${ indice+1 }</td>
                    <td>${ documento.tipo }</td>
                    <td>${ documento.descripcion }</td>
                    <td class="text-center">
                        <button type="button" onclick="editar_documento(${ documento.id }, this)" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_documento('${ documento.adjunto_file }', '${ documento.tipo }', this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <a href="/storage/${ documento.adjunto_file }" onclick="cargar_btn_link(this)" download class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-download"></i></a>
                        <button type="button" onclick="eliminar_documento(${ documento.id }, ${ documento.terceros_id }, this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                `;
            });

            $('#content_table_documentos_adjuntos').html(content);

        }
    });
}

function eliminar_documento(id, terceros_id,btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/delete_documento',
        type: 'POST',
        data: { id:id, terceros_id:terceros_id },
        success: function (data) {
            $(btn).html('<i class="fa fa-trash"></i>');
            $(btn).removeAttr('disabled');
            cargar_documentos(data);
        }
    });
}

function ver_documento(adjunto, tipo, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    setTimeout(function(){
        $(btn).html('<i class="fa fa-eye"></i>');
        $(btn).removeAttr('disabled');
    }, 3000);
    $('#modal_ver_documento_title').text(tipo)
    $('#modal_ver_documento_content').html(`<iframe src="/storage/${ adjunto }" width="100%" height="810px" frameborder="0"></iframe>`)
    $('#modal_ver_documento').modal('show');
}

function editar_documento(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/editar_documento',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            $('#tipo').val(data.tipo);
            $('#descripcion_documento').val(data.descripcion);

            $('#id').val(data.id);

            $('#adjunto_file').removeAttr('required');

            $('#agg_documento_modal').modal('show');
            $('#agg_documento_title').text('Editar ' + data.tipo);

            $(btn).html('<i class="fa fa-edit"></i>');
            $(btn).removeAttr('disabled');
        }
    });
}

function cargar_cotizaciones(terceros_id) {
    $.ajax({
        url: '/terceros/cargar_cotizaciones',
        type: 'POST',
        data: {terceros_id:terceros_id},
        success: function (data) {
            content = '';
            data.forEach( function (cotizacion, indice) {
                content += `
                <tr>
                    <td scope="row">${ indice+1 }</td>
                    <td scope="row">${ cotizacion.num_cotizacion }</td>
                    <td>${ new Date(cotizacion.fecha).toLocaleDateString() }</td>
                    <td class="text-center">
                        <a href="javascript:generar_contrato(${ cotizacion.id })"  onclick="cargar_btn_link_var(this, 'fa-check')" class="btn btn-sm btn-primary waves-effect waves-light" title="Generar Contrato"><i class="fa fa-check"></i></a>
                        <button type="button" onclick="editar_cotizacion_principal(${ cotizacion.id }, this)" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_cotizacion(${ cotizacion.id }, this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <button type="button" onclick="ver_trayectos_cotizacion(${ cotizacion.id }, this)" class="btn btn-sm btn-dark waves-effect waves-light"><i class="fa fa-plus"></i></button>
                        <button type="button" onclick="eliminar_cotizacion(${ cotizacion.id }, 'Cotizacion', this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                        <button type="button" onclick="enviar_cotizacion(${ cotizacion.id }, this)" class="btn btn-sm btn-warning waves-effect waves-light"><i class="fa fa-envelope"></i></button>
                    </td>
                </tr>
                `;
            });

            $('#content_table_cotizaciones').html(content);

        }
    });
}

function enviar_cotizacion(id, btn){
    $('#modal_enviar_cotizacion').modal('show');
    $('#enviar_cot_cion').on('click', function () {
        $('#modal_enviar_cotizacion').modal('hide');
        $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        $.ajax({
            url: '/terceros/enviar_cotizacion',
            type: 'POST',
            data: {id:id},
            success: function (data) {
                console.log(data);
                if(data){
                    $('#alert_correo').removeClass('alert-danger').addClass('alert-success').removeClass('d-none').html('Correo enviado correctamente');  
                }else{
                    $('#alert_correo').removeClass('alert-success').addClass('alert-danger').removeClass('d-none').html('El Correo no se pudo enviar');
                }
                $(btn).html('<i class="fa fa-envelope"></i>').removeAttr('disabled');
                setTimeout(function () {
                    $('#alert_correo').addClass('d-none');
                }, 3000);

            }
        });
    });
}

function cargar_contratos(terceros_id) {
    $.ajax({
        url: '/terceros/cargar_contratos',
        type: 'POST',
        data: {terceros_id:terceros_id},
        success: function (data) {
            content = '';
            data.forEach( function (cotizacion, indice) {
                content += `
                <tr>
                    <td scope="row">${ indice+1 }</td>
                    <td>${ new Date(cotizacion.fecha).toLocaleDateString() }</td>
                    <td>${ cotizacion.nombre }</td>
                    <td>${ cotizacion.tipo_contrato }</td>
                    <td>${ cotizacion.objeto_contrato }</td>
                    <td class="text-center">
                        <button type="button" onclick="editar_contrato(${ cotizacion.id }, this)" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_contrato(${ cotizacion.id }, this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <button type="button" onclick="ver_trayectos(${ cotizacion.id }, this)" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-plus"></i></button>
                        <button type="button" onclick="eliminar_contrato(${ cotizacion.id }, 'Contrato', this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                `;
            });

            $('#content_table_contratos').html(content);

        }
    });
}

function ver_trayectos(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/ver_trayectos',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            content = `<button type="button" class="btn btn-lg btn-primary mb-3" onclick="agregar_trayecto(${id})">Agregar Trayecto</button>

                        <table class="table table-bordered">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Trayecto</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Vehiculo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
            `;

            data.forEach( function (trayecto, indice) {
                content += `
                <tr>
                    <td scope="row">${ indice+1 }</td>
                    <td>${ new Date(trayecto.fecha).toLocaleDateString() }</td>
                    <td>${ trayecto.ciudad_origen } - ${ trayecto.ciudad_destino }</td>
                    <td>${ trayecto.tipo_servicio }</td>
                    <td>${ trayecto.tipo_vehiculo }</td>
                    <td class="text-center">
                        <button type="button" onclick="editar_trayecto(${ trayecto.id }, this)" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_trayecto(${ trayecto.id }, this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <button type="button" onclick="eliminar_trayecto(${ trayecto.id }, ${ id }, this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                `;
            });

            content += `</tbody>
            </table>`;

            $('#content_ver_trayectos').html(content);
            $('#modal-ver-trayectos').modal('show');

            $(btn).html('<i class="fa fa-plus"></i>');
            $(btn).removeAttr('disabled');

        }
    });
}

function ver_trayectos_cotizacion(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/ver_trayectos_cotizacion',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            content = `<button type="button" class="btn btn-lg btn-primary mb-3" onclick="agregar_trayecto_cotizacion(${id})">Agregar Trayecto En Esta Cotizacion</button>

                        <table class="table table-bordered">
                            <thead class="thead-inverse">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Trayecto</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Vehiculo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
            `;

            data.forEach( function (trayecto, indice) {
                content += `
                <tr>
                    <td scope="row">${ indice+1 }</td>
                    <td>${ new Date(trayecto.created_at).toLocaleDateString() }</td>
                    <td>${ trayecto.ciudad_origen } - ${ trayecto.ciudad_destino }</td>
                    <td>${ trayecto.tipo_servicio }</td>
                    <td>${ trayecto.tipo_vehiculo }</td>
                    <td class="text-center">
                        <button type="button" onclick="editar_trayecto_cotizacion(${ trayecto.id }, this)" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_trayecto_cotizacion(${ id }, this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <button type="button" onclick="eliminar_trayecto_cotizacion(${ trayecto.id }, ${ id }, this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                `;
            });

            content += `</tbody>
            </table>`;

            $('#content_ver_trayectos').html(content);
            $('#modal-ver-trayectos').modal('show');

            $(btn).html('<i class="fa fa-plus"></i>');
            $(btn).removeAttr('disabled');

        }
    });
}

function agregar_trayecto(id) {
    $('#form_agregar_trayecto')[0].reset();
    $('#modal_agregar_trayecto').modal('show');
    $('#contratos_id').val(id);
    $('#trayecto_creado').val(null);
    $('#vehiculo_id_trayecto option[value=""]').attr("selected", true);
    $('#conductor_uno_id_trayecto option[value=""]').attr("selected", true);
    $('#conductor_dos_id_trayecto option[value=""]').attr("selected", true);
    $('#conductor_tres_id_trayecto option[value=""]').attr("selected", true);
    $('#tipo_servicio_trayecto option[value=""]').attr("selected", true);
    $('#tipo_vehiculo_trayecto option[value=""]').attr("selected", true);
    $('#departamento_origen_trayecto option[value=""]').attr("selected", true);
    $('#departamento_destino_trayecto option[value=""]').attr("selected", true);
    $('#ciudad_origen_trayecto').html('<option value="">Seleccione el departamento</option>');
    $('#ciudad_destino_trayecto').html('<option value="">Seleccione el departamento</option>');
    $('#ciudad_origen_trayecto option[value=""]').attr("selected", true);
    $('#ciudad_destino_trayecto option[value=""]').attr("selected", true);
}

function agregar_trayecto_cotizacion(id) {
    // $('#form_agregar_trayecto_cotizacion')[0].reset();
    $('#modal_agregar_trayecto_cotizacion').modal('show');
    $('#cotizacion_id_trayecto').val(id);
    $('#trayecto_creado_cotizacion').val(null);
    $('#tipo_servicio_trayecto_cotizacion option[value=""]').attr("selected", true);
    $('#tipo_vehiculo_trayecto_cotizacion option[value=""]').attr("selected", true);
    $('#departamento_origen_trayecto_cotizacion option[value=""]').attr("selected", true);
    $('#departamento_destino_trayecto_cotizacion option[value=""]').attr("selected", true);
    $('#ciudad_origen_trayecto_cotizacion').html('<option value="">Seleccione el departamento</option>');
    $('#ciudad_destino_trayecto_cotizacion').html('<option value="">Seleccione el departamento</option>');
    $('#ciudad_origen_trayecto_cotizacion option[value=""]').attr("selected", true);
    $('#ciudad_destino_trayecto_cotizacion option[value=""]').attr("selected", true);
}

function total_cotizacion_trayecto() {
    let valor = $('#valor_unitario_trayecto').val()
    let cantidad = $('#cantidad_trayecto').val()

    $('#total_trayecto').val(valor*cantidad)
}

function total_cotizacion_trayecto_cotizacion() {
    let valor = $('#valor_unitario_trayecto_cotizacion').val()
    let cantidad = $('#cantidad_trayecto_cotizacion').val()

    $('#total_trayecto_cotizacion').val(valor*cantidad)
}

function total_cotizacion() {
    let valor = $('#valor_unitario').val()
    let cantidad = $('#cantidad').val()

    $('#total').val(valor*cantidad)
}

function cargarDepartamentos() {
    let html = '<option value="">Seleccione el departamento</option>';
	$.ajax({
		url: '/app/sistema/get/departamentos',
        type: 'POST',
		success: function (data) {
			data.forEach(dpt => {
				html += '<option value="'+dpt.nombre+'">'+dpt.nombre+'</option>';
			});
            $('#departamento').html(html);
            $('#departamento_2').html(html);
			$('#departamento_origen').html(html);
            $('#departamento_destino').html(html);
            $('#departamento_origen_trayecto').html(html);
            $('#departamento_origen_trayecto_cotizacion').html(html);
            $('#departamento_destino_trayecto').html(html);
            $('#departamento_destino_trayecto_cotizacion').html(html);
		}
    })
}

function dptOrigen(dpt) {
    var html = '<option value="">Seleccione</option>';
    $.ajax({
        url: '/app/sistema/get/municipios',
        type: 'POST',
        data: { dpt:dpt },
        success: function (data) {
            data.municipios.forEach(dpt => {
                html += '<option value="'+dpt.nombre+'">'+dpt.nombre+'</option>';
            });
            $('.ciudad_origen').html(html)
        }
    })
}

function dptDestino(dpt) {
    var html = '<option value="">Seleccione</option>';
    $.ajax({
        url: '/app/sistema/get/municipios',
        type: 'POST',
        data: { dpt:dpt },
        success: function (data) {
            data.municipios.forEach(dpt => {
                html += '<option value="'+dpt.nombre+'">'+dpt.nombre+'</option>';
            });
            $('.ciudad_destino').html(html)
        }
    })
}

function dptOrigentr(dpt) {
    var html = '<option value="">Seleccione</option>';
    $.ajax({
        url: '/app/sistema/get/municipios',
        type: 'POST',
        data: { dpt:dpt },
        success: function (data) {
            data.municipios.forEach(dpt => {
                html += '<option value="'+dpt.nombre+'">'+dpt.nombre+'</option>';
            });
            $('#ciudad_origen_trayecto_cotizacion').html(html)
        }
    })
}

function dptDestinotr(dpt) {
    var html = '<option value="">Seleccione</option>';
    $.ajax({
        url: '/app/sistema/get/municipios',
        type: 'POST',
        data: { dpt:dpt },
        success: function (data) {
            data.municipios.forEach(dpt => {
                html += '<option value="'+dpt.nombre+'">'+dpt.nombre+'</option>';
            });
            $('#ciudad_destino_trayecto_cotizacion').html(html)
        }
    })
}

function submit_cotizacion() {
    $('#fecha_ida_preview').html($('#fecha_ida').val());
    $('#fecha_regreso_preview').html($('#fecha_regreso').val());

    let descripcion = 'Recorrido 1: ' + $('#ciudad_origen').val() + ' - ' + $('#ciudad_destino').val();

    $('input:radio[name=recorrido]:checked').val() == 'Ida y vuelta' ? descripcion += ' con retorno a '+ $('#ciudad_origen').val() +' por el mismo corredor vial,' : '';

    if ($('input:radio[name=conductor]:checked').val() == 'Si' && $('input:radio[name=combustible]:checked').val() == 'Si' && $('input:radio[name=peajes]:checked').val() == 'Si') {
        descripcion += ' incluye conductor, combustible y peajes,';
    }

    if ($('input:radio[name=conductor]:checked').val() == 'Si' && $('input:radio[name=combustible]:checked').val() == 'Si' && $('input:radio[name=peajes]:checked').val() == 'No') {
        descripcion += ' incluye conductor y combustible,';
    }

    if ($('input:radio[name=conductor]:checked').val() == 'Si' && $('input:radio[name=combustible]:checked').val() == 'No' && $('input:radio[name=peajes]:checked').val() == 'Si') {
        descripcion += ' incluye conductor y peajes,';
    }

    if ($('input:radio[name=conductor]:checked').val() == 'No' && $('input:radio[name=combustible]:checked').val() == 'Si' && $('input:radio[name=peajes]:checked').val() == 'Si') {
        descripcion += ' incluye combustible y peajes,';
    }

    if ($('input:radio[name=conductor]:checked').val() == 'Si' && $('input:radio[name=combustible]:checked').val() == 'No' && $('input:radio[name=peajes]:checked').val() == 'No') {
        descripcion += ' incluye conductor,';
    }

    if ($('input:radio[name=conductor]:checked').val() == 'No' && $('input:radio[name=combustible]:checked').val() == 'Si' && $('input:radio[name=peajes]:checked').val() == 'No') {
        descripcion += ' incluye combustible,';
    }

    if ($('input:radio[name=conductor]:checked').val() == 'No' && $('input:radio[name=combustible]:checked').val() == 'No' && $('input:radio[name=peajes]:checked').val() == 'Si') {
        descripcion += ' incluye peajes,';
    }

    descripcion += 'el tipo de servicio es ' + $('#tipo_servicio').val() + ' el cual se prestara en un(a) ' + $('#tipo_vehiculo').val() + ' y el cobro se calcula por ' + $('input:radio[name=cotizacion_por]:checked').val() + '. ' + $('#observaciones').val();


    $('#descripcion_preview').html('<textarea name="descripcion_table" id="descripcion_table" rows="5" class="form-control" required>'+descripcion+'</textarea>');

    $('#valor_unitario_preview').html('$' + $('#valor_unitario').val());
    $('#cantidad_preview').html($('#cantidad').val());
    $('#total_preview').html('$' + $('#total').val());

    $('#form_part_one').addClass('d-none');
    $('#form_part_two').removeClass('d-none');

    $('#btn_next_cotizacion').addClass('d-none');
    $('#btn_submit_cotizacion').removeClass('d-none');
    $('#btn_back_cotizacion').removeClass('d-none');
}

function back_cotizacion() {
    $('#form_part_one').removeClass('d-none');
    $('#form_part_two').addClass('d-none');

    $('#btn_next_cotizacion').removeClass('d-none');
    $('#btn_submit_cotizacion').addClass('d-none');
    $('#btn_back_cotizacion').addClass('d-none');
}

function generar_contrato(id) {
    $('#modal-crear-contrato').modal('show');
    $('#cotizacion_id_contrato').val(id);

    $.ajax({
        url: '/terceros/generar_vehiculos_contratos',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            content ='';
            a=0;
            console.log(data.personal);
            data.cotizaciones.forEach(cotizacion => {
                a++;
                content += `<div class="form-group row">

                <h5 class="col-12">VEHICULO ${ a }</h5>

                <div class="col-sm-12 d-flex">

                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Vehiculo</label>
                        <select name="vehiculo_id[]" id="vehiculo_id" class="form-control" required>
                            <option value="">Seleccione vehiculo</option>`

                            data.vehiculos.forEach(vehiculo => {
                                content += `<option value="${vehiculo.id}"> ${ vehiculo.placa } -  ${ vehiculo.numero_interno }</option>`;
                            });

                       content +=  `</select>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Conductor uno</label>
                        <select name="conductor_uno_id[]" id="conductor_uno_id" class="form-control" required>
                            <option value="">Seleccione vehiculo</option>`;

                                data.personal.forEach(persona => {
                                    content += `<option value="${persona.personal_id}"> ${ persona.personal.nombres }  ${ persona.personal.primer_apellido }</option>`;
                                });

                    content += ` </select>
                    </div>

                </div>

                <div class="col-sm-12 d-flex">
                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Conductor dos</label>
                        <select name="conductor_dos_id[]" id="conductor_dos_id" class="form-control">
                            <option value="">Seleccione vehiculo</option>`;
                            data.personal.forEach(persona => {
                                content += `<option value="${persona.personal_id}"> ${ persona.personal.nombres }  ${ persona.personal.primer_apellido }</option>`;
                            });
                       content += ` </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-12 col-form-label">Conductor tres</label>
                        <select name="conductor_tres_id[]" id="conductor_tres_id" class="form-control">
                            <option value="">Seleccione vehiculo</option>`;
                            data.personal.forEach(persona => {
                                content += `<option value="${persona.personal_id}"> ${ persona.personal.nombres }  ${ persona.personal.primer_apellido }</option>`;
                            });
                        content += `</select>
                        <input type='hidden' name="id_cotizacion_trayecto[]" value="${ cotizacion.id }">
                    </div>
                </div>
            </div>`;

            console.log(data.personal);
            });

            $('#vehiculos_generar_contratos').html(content);

        }
    })


}


function ver_cotizacion(id, btn) {
    cargar_btn_link_var(btn, 'fa-eye');
    window.open('/terceros/print_cotizacion/' + id, '_blank');
}

function ver_contrato(id, btn) {
    cargar_btn_link_var(btn, 'fa-eye');
    window.open('/terceros/print_contrato/contrato/' + id, '_blank');
}

function ver_trayecto(id, btn) {
    cargar_btn_link_var(btn, 'fa-eye');
    window.open('/terceros/print_cotizacion/' + id, '_blank');
}

function ver_trayecto_cotizacion(id, btn) {
    cargar_btn_link_var(btn, 'fa-eye');
    window.open('/terceros/print_cotizacion/' + id, '_blank');
}

function eliminar_cotizacion(id, title, btn) {
    cargar_btn_link_var(btn, 'fa-trash');
    $('#modal_eliminar_cotizacion').modal('show');
    $('#cotizacion_id').val(id);
    $('#modal_eliminar_cotizacion_tilte').text('Eliminar ' + title);
    $('#modal_eliminar_cotizacion_content').html(`
        <h2>¿Seguro desea eliminar ${ title == 'Contrato' ? 'el contrato' : 'la cotizacion' }?</h2>
    `);
}

function eliminar_contrato(id, title, btn) {
    cargar_btn_link_var(btn, 'fa-trash');
    $('#modal_eliminar_contrato').modal('show');
    $('#contrato_id_delete').val(id);
    $('#modal_eliminar_contrato_tilte').text('Eliminar ' + title);
    $('#modal_eliminar_contrato_content').html(`
        <h2>¿Seguro desea eliminar ${ title == 'Contrato' ? 'el contrato' : 'la cotizacion' }?</h2>
    `);
}

function editar_cotizacion(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/editar_cotizacion',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            $('#ciudad_origen').html('<option value="'+data.ciudad_origen+'">'+data.ciudad_origen+'</option>');
            $('#ciudad_destino').html('<option value="'+data.ciudad_destino+'">'+data.ciudad_destino+'</option>');

            $('#modal_crear_cotizacion').modal('show');
            $('#fecha_ida').val(data.fecha_ida);
            $('#fecha_regreso').val(data.fecha_regreso);
            $('#tipo_servicio option[value="'+ data.tipo_servicio + '"]').attr("selected", true);
            $('#tipo_vehiculo option[value="'+ data.tipo_vehiculo + '"]').attr("selected", true);
            $('#departamento_origen option[value="'+ data.departamento_origen + '"]').attr("selected", true);
            $('#departamento_destino option[value="'+ data.departamento_destino + '"]').attr("selected", true);
            $('#ciudad_origen option[value="'+ data.ciudad_origen + '"]').attr("selected", true);
            $('#ciudad_destino option[value="'+ data.ciudad_destino + '"]').attr("selected", true);
            $('#observaciones').val(data.observaciones);
            $('input[name=combustible][value="'+data.combustible+'"]').attr('checked', true);
            $('input[name=conductor][value="'+data.conductor+'"]').attr('checked', true);
            $('input[name=peajes][value="'+data.peajes+'"]').attr('checked', true);
            $('input[name=cotizacion_por][value="'+data.cotizacion_por+'"]').attr('checked', true);
            $('input[name=recorrido][value="'+data.recorrido+'"]').attr('checked', true);
            $('#valor_unitario').val(data.valor_unitario);
            $('#cantidad').val(data.cantidad);
            $('#total').val(data.total);
            $('#cotizacion_parte_uno').val(data.cotizacion_parte_uno);
            $('#cotizacion_parte_dos').val(data.cotizacion_parte_dos);

            $('#cotizacion_creada').val(data.id);
            $(btn).html('<i class="fa fa-edit"></i>');
            $(btn).removeAttr('disabled');
        }
    });
}



function editar_cotizacion_principal(id, btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/editar_cotizacion',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            ind=0;
            $('#modal_crear_cotizacion').modal('show');
            data.forEach(function (cotizacion, indice){
                ind=indice;
                $('#cotizacion_parte_uno').val(cotizacion.cotizacion_parte_uno);
                $('#cotizacion_parte_dos').val(cotizacion.cotizacion_parte_dos);
                fecha=`<tr><td>${ cotizacion.fecha_ida }</td><td>${ cotizacion.fecha_regreso }</td>`;

            let descripcion ='<td><textarea name="descripcion_table[]" id="descripcion_table" rows="5" class="form-control" required>' + cotizacion.descripcion_table;
            descripcion += `</textarea></td><input type="hidden" name="coti_id[]" value="${cotizacion.coti_id}">`;

            if(indice>=1){
                $('#table_cotizaciones_id').append(fecha + descripcion + `<td>${ cotizacion.valor_unitario }</td><td>${ cotizacion.cantidad }</td><td>${ cotizacion.total }</td></tr>`);
            }else{
                $('#table_cotizaciones_id').html(fecha + descripcion + `<td>${ cotizacion.valor_unitario }</td><td>${ cotizacion.cantidad }</td><td>${ cotizacion.total }</td></tr>`);
            }



            $('#cotizacion_creada').val(cotizacion.id);

            $('#form_part_one').addClass('d-none');
            $('#form_part_two').removeClass('d-none');

            $('#btn_next_cotizacion').addClass('d-none');
            $('#btn_submit_cotizacion').removeClass('d-none');
            });
            $(btn).html('<i class="fa fa-edit"></i>');
            $(btn).removeAttr('disabled');
        }
    });
}

function editar_contrato(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/editar_contrato',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            $('#modal_editar_contrato').modal('show');
            $('#select_responsable_update option[value="'+ data.responsable.identificacion + '"]').attr("selected", true);
            $('#identificacion_responsable_update').val(data.responsable.identificacion);
            $('#nombre_responsable_update').val(data.responsable.nombre);
            $('#direccion_responsable_update').val(data.responsable.direccion);
            $('#telefono_responsable_update').val(data.responsable.telefono);
            $('#tipo_contrato_update option[value="'+ data.contrato.tipo_contrato + '"]').attr("selected", true);
            $('#objeto_contrato_update').val(data.contrato.objeto_contrato);
            $('#contrato_parte_uno_update').val(data.contrato.contrato_parte_uno);
            $('#contrato_parte_dos_update').val(data.contrato.contrato_parte_dos);

            $('#contrato_id').val(data.contrato.id);

            $(btn).html('<i class="fa fa-edit"></i>');
            $(btn).removeAttr('disabled');
        }
    });
}

function cargar_responsable_contrato(responsable) {
    let tercero = $('#terceros_id').val();
    $.ajax({
        url: '/terceros/cargar_responsable_contrato',
        type: 'post',
        data: {responsable:responsable, tercero:tercero},
        success: function (data) {
            if ( data ) {
                $('#identificacion_responsable').val(data.identificacion).attr('readonly', true);
                $('#nombre_responsable').val(data.nombre).attr('readonly', true);
                $('#direccion_responsable').val(data.direccion).attr('readonly', true);
                $('#telefono_responsable').val(data.telefono).attr('readonly', true);
            }
        }
    });

    if (responsable == 'Nuevo') {
        $('#identificacion_responsable').val('').attr('readonly', false);
        $('#nombre_responsable').val('').attr('readonly', false);
        $('#direccion_responsable').val('').attr('readonly', false);
        $('#telefono_responsable').val('').attr('readonly', false);
    }
}

function eliminar_contacto(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/eliminar_contacto',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            cargar_contactos(data);
        }
    });
}

function editar_tercero(id) {
    $.ajax({
        url: '/terceros/get_tercero',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            $('#tipo_identificacion').val(data.tipo_identificacion);
            $('#identificacion').val(data.identificacion);
            $('#nombre').val(data.nombre);
            $('#tipo_tercero').val(data.tipo_tercero);
            $('#regimen').val(data.regimen);
            $('#departamento').val(data.departamento);
            $('#municipio').val(data.municipio);
            $('#direccion').val(data.direccion);
            $('#correo').val(data.correo);
            $('#telefono').val(data.telefono);

            $('#modal-editar-tercero').modal('show');
        }
    });
}

function eliminar_trayecto(id, contrato, btn) {
    if (window.confirm("¿Seguro desea eliminar el trayecto?")) {
        $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $(btn).attr('disabled', 'true');
        $.ajax({
            url: '/terceros/eliminar_trayecto',
            type: 'post',
            data: {id:id, contrato:contrato},
            success: function (data) {
                ver_trayectos(data);
                $(btn).html('<i class="fa fa-trash"></i>');
                $(btn).removeAttr('disabled');
            }
        });

    }
}

function eliminar_trayecto_cotizacion(id, cotizacion, btn) {
    if (window.confirm("¿Seguro desea eliminar el trayecto?")) {
        $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $(btn).attr('disabled', 'true');
        $.ajax({
            url: '/terceros/eliminar_trayecto_cotizacion',
            type: 'post',
            data: {id:id, cotizacion:cotizacion},
            success: function (data) {
                ver_trayectos_cotizacion(data);
                $(btn).html('<i class="fa fa-trash"></i>');
                $(btn).removeAttr('disabled');
            }
        });

    }
}

function editar_trayecto(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/editar_trayecto',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            $('#ciudad_origen_trayecto').html('<option value="'+data.ciudad_origen+'">'+data.ciudad_origen+'</option>');
            $('#ciudad_destino_trayecto').html('<option value="'+data.ciudad_destino+'">'+data.ciudad_destino+'</option>');

            $('#modal_agregar_trayecto').modal('show');
            $('#fecha_ida_trayecto').val(data.fecha_ida);
            $('#fecha_regreso_trayecto').val(data.fecha_regreso);
            $('#tipo_servicio_trayecto option[value="'+ data.tipo_servicio + '"]').attr("selected", true);
            $('#tipo_vehiculo_trayecto option[value="'+ data.tipo_vehiculo + '"]').attr("selected", true);
            $('#departamento_origen_trayecto option[value="'+ data.departamento_origen + '"]').attr("selected", true);
            $('#departamento_destino_trayecto option[value="'+ data.departamento_destino + '"]').attr("selected", true);
            $('#ciudad_origen_trayecto option[value="'+ data.ciudad_origen + '"]').attr("selected", true);
            $('#ciudad_destino_trayecto option[value="'+ data.ciudad_destino + '"]').attr("selected", true);
            $('#observaciones_trayecto').val(data.observaciones);
            $('input[name=combustible_trayecto][value="'+data.combustible+'"]').attr('checked', true);
            $('input[name=conductor_trayecto][value="'+data.conductor+'"]').attr('checked', true);
            $('input[name=peajes_trayecto][value="'+data.peajes+'"]').attr('checked', true);
            $('input[name=cotizacion_por_trayecto][value="'+data.cotizacion_por+'"]').attr('checked', true);
            $('input[name=recorrido_trayecto][value="'+data.recorrido+'"]').attr('checked', true);
            $('#valor_unitario_trayecto').val(data.valor_unitario);
            $('#cantidad_trayecto').val(data.cantidad);
            $('#total_trayecto').val(data.total);
            $('#vehiculo_id_trayecto option[value="'+ data.vehiculo_id + '"]').attr("selected", true);
            $('#conductor_uno_id_trayecto option[value="'+ data.conductor_uno_id + '"]').attr("selected", true);
            $('#conductor_dos_id_trayecto option[value="'+ data.conductor_dos_id + '"]').attr("selected", true);
            $('#conductor_tres_id_trayecto option[value="'+ data.conductor_tres_id + '"]').attr("selected", true);

            $('#contratos_id').val(data.contratos.id);
            $('#trayecto_creado').val(data.id);
            $(btn).html('<i class="fa fa-edit"></i>');
            $(btn).removeAttr('disabled');
            console.log(data.conductor_uno_id);
        }
    });
}

function editar_trayecto_cotizacion(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $.ajax({
        url: '/terceros/editar_trayecto_cotizacion',
        type: 'POST',
        data: { id:id },
        success: function (data) {
            $('#ciudad_origen_trayecto_cotizacion').html('<option value="'+data.ciudad_origen+'">'+data.ciudad_origen+'</option>');
            $('#ciudad_destino_trayecto_cotizacion').html('<option value="'+data.ciudad_destino+'">'+data.ciudad_destino+'</option>');

            $('#modal_agregar_trayecto_cotizacion').modal('show');
            $('#fecha_ida_trayecto_cotizacion').val(data.fecha_ida);
            $('#fecha_regreso_trayecto_cotizacion').val(data.fecha_regreso);
            $('#tipo_servicio_trayecto_cotizacion option[value="'+ data.tipo_servicio + '"]').attr("selected", true);
            $('#tipo_vehiculo_trayecto_cotizacion option[value="'+ data.tipo_vehiculo + '"]').attr("selected", true);
            $('#departamento_origen_trayecto_cotizacion option[value="'+ data.departamento_origen + '"]').attr("selected", true);
            $('#departamento_destino_trayecto_cotizacion option[value="'+ data.departamento_destino + '"]').attr("selected", true);
            $('#ciudad_origen_trayecto_cotizacion option[value="'+ data.ciudad_origen + '"]').attr("selected", true);
            $('#ciudad_destino_trayecto_cotizacion option[value="'+ data.ciudad_destino + '"]').attr("selected", true);
            $('#observaciones_trayecto_cotizacion').val(data.observaciones);
            $('input[name=combustible_trayecto_cotizacion][value="'+data.combustible+'"]').attr('checked', true);
            $('input[name=conductor_trayecto_cotizacion][value="'+data.conductor+'"]').attr('checked', true);
            $('input[name=peajes_trayecto_cotizacion][value="'+data.peajes+'"]').attr('checked', true);
            $('input[name=cotizacion_por_trayecto_cotizacion][value="'+data.cotizacion_por+'"]').attr('checked', true);
            $('input[name=recorrido_trayecto_cotizacion][value="'+data.recorrido+'"]').attr('checked', true);
            $('#valor_unitario_trayecto_cotizacion').val(data.valor_unitario);
            $('#cantidad_trayecto_cotizacion').val(data.cantidad);
            $('#total_trayecto_cotizacion').val(data.total);
            $('#vehiculo_id_trayecto_cotizacion option[value="'+ data.vehiculo_id + '"]').attr("selected", true);
            $('#conductor_uno_id_trayecto_cotizacion option[value="'+ data.conductor_uno_id + '"]').attr("selected", true);
            $('#conductor_dos_id_trayecto_cotizacion option[value="'+ data.conductor_dos_id + '"]').attr("selected", true);
            $('#conductor_tres_id_trayecto_cotizacion option[value="'+ data.conductor_tres_id + '"]').attr("selected", true);

            $('#trayecto_creado_cotizacion').val(data.id);
            $(btn).html('<i class="fa fa-edit"></i>');
            $(btn).removeAttr('disabled');
        }
    });
}

function cargar_btn_form(btn){
    $(btn).find('button').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).find('button').attr('disabled', 'true');
}

function cargar_btn_single(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}

function cargar_btn_link(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    setTimeout(function(){
        $(btn).html('<i class="fa fa-download"></i>');
        $(btn).removeAttr('disabled');
    }, 5000);
}

function cargar_btn_link_var(btn, icon){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    setTimeout(function(){
        $(btn).html('<i class="fa '+icon+'"></i>');
        $(btn).removeAttr('disabled');
    }, 3000);
}













