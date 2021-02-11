
$(document).ready(function () {
    $('#form_agg_conductor').submit(function () {
        $('#btn_crear_conductr').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        $.ajax({
            url: '/vehiculos/agg_conductor',
            type: 'POST',
            data: $('#form_agg_conductor').serialize(),
            success: function (data) {
                cargar_conductores(data)
                $('#btn_crear_conductr').html('Enviar').removeAttr('disabled');
                $('#alerta_success').removeClass('d-none');
                $('#alerta_success').html('Se ha Creado el Conductor Correctamente');
                window.setTimeout(function() {
                    $('#alerta_success').addClass('d-none');
                }, 3000);
                $("#form_agg_conductor")[0].reset();
            }
        })

        return false;
    })


    $('#agg_compraventa').submit(function () {

        $('#btn_submit_compra').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        var form = document.getElementById('agg_compraventa');
        var formData = new FormData(form);
        $.ajax({
            url: '/vehiculos/agg_compraventa',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
	        processData: false,
            success: function (data) {
                documentos_compraventa()
                $('#btn_submit_compra').html('Enviar').removeAttr('disabled');
                $("#agg_compraventa")[0].reset();
                $('#id_existe').val('');
                $('#agg_doc_compraventa').modal('hide');
            }
        })
        return false;
    });

    $('#form_exportar_documentos').submit(function () {
        $('#btn_submit_exportar_documentos').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);

        $.ajax({
            url: '/vehiculos/exportar_documentos',
            type: 'POST',
            data: $('#form_exportar_documentos').serialize(),
            success: function (data) {
                console.log(data);
                $('#btn_submit_exportar_documentos').html('Enviar').attr('disabled', false);
                $('#form_exportar_documentos')[0].reset();
                $('#modal_exportar').modal('hide');
                window.open('/storage/docs/vehiculos/documentacion.zip', '_blank');
            }
        });

        return false;
    });


    $('#agg_targeta_propiedad').submit(function () {
        $('#btn_submit_documentos').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
        var form = document.getElementById('agg_targeta_propiedad');
        var formData = new FormData(form);
        $.ajax({
            url: '/vehiculos/agg_targeta_propiedad',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
	        processData: false,
            success: function (data) {
                $('#agg_targeta_propiedad')[0].reset();
                $('#agg_doc_legal').modal('hide');
                $('#btn_submit_documentos').html('Enviar').removeAttr('disabled');
                documentos_legales(data.tipo, data.vehiculo_id, data.id_table, data.vigencia);
            }
        })

        return false;
    })

})

function estado_nuevo(seleccion){
    if($(seleccion).val()=='inactivo'){
        $('#estado_inactivo').removeClass('d-none');
        $('#observacion_estado').prop('required');
        $('#fecha_estado').prop('required');
    }else{
        $('#estado_inactivo').addClass('d-none');
        $('#observacion_estado').removeAttr('required');
        $('#fecha_estado').removeAttr('required');
    }
}

function cargar_conductores(id) {
    $.ajax({
        url: '/vehiculos/cargar_conductores',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            content = '';
            data.forEach( function (conductor, indice) {
                fecha = new Date(conductor.fecha_final);
                content += `
                <tr>
                    <td scope="row">${ indice+1 }</td>
                    <td>${ conductor.personal.nombres } ${ conductor.personal.primer_apellido } ${ conductor.personal.segundo_apellido ?? '' }</td>
                    `;

                //verifica que este activo o no
                if((fecha.getDate() >= new Date().getDate()) && (fecha.getFullYear() >= new Date().getFullYear()) && (fecha.getMonth() >= new Date().getMonth())){
                    content += `<td>Activo</td>`;
                }else{
                    content += `<td>Inactivo</td>`;
                }

                content +=`<td class="text-center"><button type="button" onclick="ver_historial_conductor(${ conductor.personal_id}, ${conductor.vehiculo_id}, this)"  class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#modal_ver_historial_conductor"><i class="fa fa-eye"></i></button></td></tr> `;
            });

           if(content!=''){
            $('#content_table_conductores').html(content);
            }else{
                $('#content_table_conductores').html(`
                <tr>
                    <td colspan="8" class="text-center">
                        <p>No Existen Conductores</p>
                    </td>
                </tr>`);
            }

        }
    })
}

function eliminar_conductor(id, personal_id, vehiculo_id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $.ajax({
        url: '/vehiculos/eliminar_conductor',
        type: 'POST',
        data: {id:id, personal_id:personal_id, vehiculo_id:vehiculo_id},
        success: function (data) {
            ver_historial_conductor(data.personal_id, data.vehiculo_id);
        }
    })
}

function ver_historial_conductor(id, vehiculo_id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $.ajax({
        url: '/vehiculos/ver_conductor_historial',
        type: 'POST',
        data: {id:id, vehiculo_id:vehiculo_id},
        success: function (data) {
            if(data.length == 0){
                $('#modal_ver_historial_conductor').modal('hide');
                cargar_conductores(vehiculo_id);
            }
            var content = '';
            contado=0;
            data.forEach( function (conductor, indice) {
                $('#modal_ver_historial_conductor_title').html('Historial del conductor ' + conductor.personal.nombres + ' '+ conductor.personal.primer_apellido)
                fecha = new Date(conductor.fecha_final);
                contado++;
                estado='inactivo';
                if((fecha.getDate() >= new Date().getDate()) && (fecha.getFullYear() >= new Date().getFullYear()) && (fecha.getMonth() >= new Date().getMonth())){
                    estado='activo';
                }
                content += `<tr>
                <th class="text-center">${contado}</th>
                <th class="text-center">${formatoFecha(conductor.fecha_inicial)}</th>
                <th class="text-center">${formatoFecha(conductor.fecha_final)}</th>
                <th class="text-center">${restaFechas(conductor.fecha_inicial, conductor.fecha_final)} dias</th>
                <th class="text-center">${estado}</th>
                <th class="text-center"><button type="button" onclick="eliminar_conductor(${ conductor.id }, ${conductor.personal_id}, ${conductor.vehiculo_id}, this)" class="btn btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button></th>
            </tr>`;
            $('#modal_ver_historial_conductor').modal('show');
            $(btn).html('<i class="fa fa-eye"></i>').removeAttr('disabled');
            });

            $('#table_ver_historial_vehiculo').html(content);

        }
    })
}



function restaFechas(fechaa,fechab){
    let fecha1 = new Date(fechaa);
    let fecha2 = new Date(fechab);

    let resta = fecha2.getTime() - fecha1.getTime();
    return Math.round(resta/ (1000*60*60*24));
  }

  function formatoFecha(texto){
      if(texto == '' || texto == null){
        return null;
      }
      return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');

  }


function agg_documento_legal(tipo_documento, id_table, vigencia, tipo_id, entidad_expide) {
    $('#agg_doc_legal').modal('show')
    $('#agg_doc_legal_title').text('Agregar '+tipo_documento)
    $('#consecutivo_title').text('Numero de '+tipo_documento)
    $('#tipo_id').val(tipo_id)
    $('#id_table').val(id_table)
    if(vigencia == '0'){
        $('#fechas_vigencias').addClass('d-none');
    }else{
        $('#fechas_vigencias').removeClass('d-none');
    }


    $('#consecutivo').val('');
    $('#fecha_expedicion').val('');
    $('#fecha_inicio_vigencia').val('');
    $('#fecha_fin_vigencia').val('');
    $('#id').val('');
    $('#estado').val('');


    $.ajax({
        url: '/vehiculos/carga_entidades',
        type: 'POST',
        data: {entidad:entidad_expide},
        success: function (data) {
            entidad_tr='<option value="">Seleccione</option>';
            data.forEach(entidad => {
                entidad_tr += `<option value="${entidad.nombre}">${entidad.nombre}</option>`;
            });
            $('#entidad_expide').html(entidad_tr);
        }
    });

}




function documentos_legales(tipo, vehiculo_id, id_table, vigencia) {
    $.ajax({
        url: '/vehiculos/cargar_tarjeta_propiedad',
        type: 'POST',
        data: {tipo:tipo, vehiculo_id:vehiculo_id},
        success: function (data) {
            content = '';
            data.forEach(documento => {
                content += `
                <tr>
                    <td scope="row">${ documento.consecutivo }</td>
                    <td>${ formatoFecha(documento.fecha_expedicion) }</td>`

                    if(documento.vigencia != '0'){
                        content += ` <td>${ formatoFecha(documento.fecha_inicio_vigencia) ?? 'No aplica' }</td>
                        <td>${ formatoFecha(documento.fecha_fin_vigencia) ?? 'No aplica' }</td>
                        <td>${ (formatoFecha(documento.fecha_inicio_vigencia)) ? restaFechas(documento.fecha_inicio_vigencia, documento.fecha_fin_vigencia)  : 'No aplica' }</td>`
                    }

                content += `<td width="250px">${ documento.entidad_expide }</td>
                    <td>${ documento.estado }</td>
                    <td width="180px" class="text-center">
                        <button type="button" onclick="editar_documento_legal(${ documento.id }, '${ id_table }', this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_documento_legal('${ documento.documento_file }', '${ documento.name }', this)" ${ (documento.documento_file) ? '' : 'disabled' } class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <a href="/storage/${ documento.documento_file }" download class="${ (documento.documento_file) ? '' : 'disabled' } btn btn-sm btn-primary waves-effect waves-light" onclick="cargarbtntime(this, 'fa-download')"><i class="fa fa-download"></i></a>
                        <button type="button" onclick="eliminar_documento_legal(${ documento.id }, ${ documento.vehiculo_id }, '${ documento.tipo_id }', '${ id_table }', ${ vigencia }, this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                `;
            });

            if(content != ''){
                $('#'+id_table).html(content);
            }else{
                if(vigencia != '0'){
                    $('#'+id_table).html(`<tr><td class="text-center" colspan="7">No hay documentos<td></tr>`);
                }else{
                    $('#'+id_table).html(`<tr><td class="text-center" colspan="4">No hay documentos<td></tr>`);
                }

            }

        }
    })
}

function documentos_compraventa() {
    $.ajax({
        url: '/vehiculos/cagar_compraventas',
        type: 'GET',
        success: function (data) {
            content = '';
            data.forEach((documento, indice) => {
                content += `
                <tr>
                    <td>${indice+1}</td>
                    <td>${ formatoFecha(documento.fecha_expedicion) }</td>

                    <td>${data[indice+1] == null ? 'Fabricante' : data[indice+1].nombres + ' ' + data[indice+1].primer_apellido + ' ' + data[indice+1].segundo_apellido}</td>
                    <td>${documento.nombres + ' ' + documento.primer_apellido + ' ' + documento.segundo_apellido}</td>
                    <td>${ documento.estado }</td>
                    <td width="180px" class="text-center">
                        <button type="button" onclick="editar_documento_compraventa(${ documento.id }, this)" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="ver_documento_legal('${ documento.documento_file }', 'Compraventa', this)" ${ (documento.documento_file) ? '' : 'disabled' } class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-eye"></i></button>
                        <a href="/storage/${ documento.documento_file }" download class="${ (documento.documento_file) ? '' : 'disabled' } btn btn-sm btn-primary waves-effect waves-light" onclick="cargarbtntime(this, 'fa-download')"><i class="fa fa-download"></i></a>
                        <button type="button" onclick="eliminar_compraventa(${ documento.id }, this)" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                `;
            });

            if(content != ''){
                $('#tabla_compraventas').html(content);
            }else{
                    $('#tabla_compraventas').html(`<tr><td class="text-center" colspan="5">No hay documentos<td></tr>`);
            }

        }
    })
}

function eliminar_compraventa(id, btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $.ajax({
        url: '/vehiculos/eliminar_documento_legal',
        type: 'POST',
        data: {id:id, vehiculo_id:2, tipo:3}, //vehiculo id y tipo son cualquiera para reutilizar rutas y funciones
        success: function (data) {
            documentos_compraventa();
        }
    });
}

function eliminar_documento_legal(id, vehiculo_id, tipo, id_table, vigencia, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $.ajax({
        url: '/vehiculos/eliminar_documento_legal',
        type: 'POST',
        data: {id:id, vehiculo_id:vehiculo_id, tipo:tipo},
        success: function (data) {
            documentos_legales(data.tipo, data.vehiculo_id, id_table, vigencia);
        }
    });
}

function editar_documento_compraventa(id, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $.ajax({
        url: '/vehiculos/get_documento_legal',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            console.log(data);
            $('#consecutivo_compraventa').val(data.consecutivo);
            $('#fecha_expedicion_compraventa').val(data.fecha_expedicion);
            $('#id_existe_compra').val(data.id);
            $("#comprador_id_compra option").removeAttr('selected');
            $("#comprador_id_compra option[value="+ data.comprador_id +"]").attr("selected",true);
            $('#agg_doc_compraventa').modal('show');

            $(btn).html('<i class="fa fa-edit"></i>').removeAttr('disabled');
        }
    })
}

function editar_documento_legal(id, id_tale, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $.ajax({
        url: '/vehiculos/get_documento_legal',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            $('#consecutivo').val(data.consecutivo);
            $('#fecha_expedicion').val(data.fecha_expedicion);
            $('#fecha_inicio_vigencia').val(data.fecha_inicio_vigencia);
            $('#fecha_fin_vigencia').val(data.fecha_fin_vigencia);
            $('#id').val(data.id);
            $('#estado').val(data.estado);
            entidad_tr='';
            terceo=data.entidad_expide;
            $.ajax({
                url: '/vehiculos/carga_entidades',
                type: 'POST',
                data: {entidad:data.tipo_tercero},
                success: function (data) {
                    entidad_tr='<option value="">Seleccione</option>';
                    data.forEach(entidad => {
                        if(entidad.nombre == terceo){
                            entidad_tr += `<option selected value="${entidad.nombre}">${entidad.nombre}</option>`;
                        }else{
                            entidad_tr += `<option value="${entidad.nombre}">${entidad.nombre}</option>`;
                        }
                    });
                    $('#entidad_expide').html(entidad_tr);
                }
            });
            $('#agg_doc_legal_title').text('Editar ' + data.name);
            $('#consecutivo_title').text('Editar ' + data.name);
            $('#agg_doc_legal').modal('show');

            $('#tipo_id').val(data.tipo_id)
            $('#id_table').val(id_tale)
            if(data.vigencia == '0'){
                $('#fechas_vigencias').addClass('d-none');
            }else{
                $('#fechas_vigencias').removeClass('d-none');
            }
            $(btn).html('<i class="fa fa-edit"></i>').removeAttr('disabled');
        }
    })
}

function ver_documento_legal(documento_file, tipo, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    $('#modal_ver_documento_title').text(tipo)
    $('#modal_ver_documento_content').html(`<iframe src="/storage/${ documento_file }" width="100%" height="810px" frameborder="0"></iframe>`)
    $('#modal_ver_documento').modal('show')
    $(btn).html('<i class="fa fa-eye"></i>').removeAttr('disabled');
}

function cargarbtn(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}

function addcheck(btn){
    if($(btn).find('i')['length'] == 0 && $('#consecutivo'+btn).val() != ''){
        $('#btn'+btn).append(' <i class="fa fa-check text-primary" aria-hidden="true"></i>');

    }
}


function select_tipo_vinculacion(tipo) {
    console.log(tipo);
    if (tipo == 1) {
        $('#div_empresa_convenio').removeClass('d-none');
        $('#div_item1').removeClass('col-sm-4').addClass('col-sm-3');
        $('#div_item2').removeClass('col-sm-4').addClass('col-sm-3');
        $('#div_item3').removeClass('col-sm-4').addClass('col-sm-3');
    } else {
        $('#div_empresa_convenio').addClass('d-none');
        $('#div_item1').removeClass('col-sm-3').addClass('col-sm-4');
        $('#div_item2').removeClass('col-sm-3').addClass('col-sm-4');
        $('#div_item3').removeClass('col-sm-3').addClass('col-sm-4');
    }
}

function cambio_procesos(proceso){
    if(proceso){
        $.ajax({
            url: '/vehiculos/cargar_procesos',
            type: 'POST',
            data: {proceso:proceso},
            success: function (data) {
                content=`<div class="row">
                <h6 class="col-sm-12 mt-4"><b>${proceso.toUpperCase()}</b></h6>
                <input type="hidden" value="${data.length ? data[0].categoria_id : ''}" name="tipos_doc">
                <div class="border p-2">`;
                content_sec=``;
                if(data.length == 0){
                    content+=`<p class="text-center"> No hay Documentos en este proceso</p>`;
                }else{
                    data.forEach(documento => {
                        content+=`<button type="button" onclick="required_form('#${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}'); cargarselect('${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}', '${documento.tipo_tercero}')" class="btn border ml-2 mt-2 btn-lg waves-effect waves-light" id="btn${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}" data-toggle="modal" data-target="#${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}">${documento.name}  </button>`;

                        content_sec += `
                                        <div class="modal fade bs-example-modal-xl" id="${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="agg_doc_legal_title">Agregar ${documento.name}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="removecheck('${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}', '${documento.name}')">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">


                                                            <div class="container p-3">

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label for="consecutivo" id="consecutivo_title">Consecutivo de ${documento.name}</label>
                                                                        <div class="form-group form-group-custom mb-4">
                                                                            <input type="text" class="form-control" id="consecutivo" name="consecutivo${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="fecha_expedicion">Fecha expedición</label>
                                                                        <div class="form-group form-group-custom mb-4">
                                                                            <input type="text" class="form-control datepicker-here" autocomplete="off" data-language="es" data-date-format="yyyy-mm-dd" id="fecha_expedicion" name="fecha_expedicion${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}">
                                                                        </div>
                                                                    </div>
                                                                </div>`;

                                                                if(documento.vigencia != 0){
                                                                    content_sec += `<div class="row" id="fechas_vigencias">
                                                                        <div class="col-sm-6" id="fecha_inicio_vigencia_div">
                                                                            <label for="fecha_inicio_vigencia">Fecha inicio de vigencia</label>
                                                                            <div class="form-group form-group-custom mb-4">
                                                                                <input type="text" class="form-control datepicker-here" autocomplete="off" data-language="es" data-date-format="yyyy-mm-dd" name="fecha_inicio_vigencia${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}"  id="fecha_inicio_vigencia">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6" id="fecha_fin_vigencia_div">
                                                                            <label for="fecha_fin_vigencia">Fecha fin de vigencia</label>
                                                                            <div class="form-group form-group-custom mb-4">
                                                                                <input type="text" class="form-control datepicker-here" autocomplete="off" data-language="es" data-date-format="yyyy-mm-dd" name="fecha_fin_vigencia${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}"  id="fecha_fin_vigencia">
                                                                            </div>
                                                                        </div>
                                                                    </div>`;
                                                                }


                                                            content_sec += `<div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="entidad_expide${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}">Entidad expide</label>
                                                                    <div class="form-group form-group-custom mb-4">
                                                                        <select name="entidad_expide${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}" class="form-control entidad_expide" id="entidad_expide${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}">
                                                                            <option value="">Seleccione</option>`;



                                                                        content_sec += `</select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label for="documento_file">Agregar Adjunto</label>
                                                                        <div class="form-group form-group-custom mb-4">
                                                                            <input type="file" class="form-control" name="documento_file${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}" id="documento_file">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="id_${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}" id="id" value='${documento.id}'>

                                                                <div class="alert alert-danger mb-3 d-none" id="alert_camp" role="alert">
                                                                    <h5 class="text-danger"><b>Faltan Los Siguientes Campos</b></h5>
                                                                    <p id="capos_faltante"></p>
                                                                </div>

                                                            <div class="mt-3 text-center">
                                                                <button onclick="addcheck('${documento.name.replace(/ /g, "").replace(/["'()]/g,"")}', '${documento.name}')" class="btn btn-primary btn-lg waves-effect waves-light"  id="btn_agregar_doc">Agregar ${documento.name}</button>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

                    });
                }
                content+=`            </div>
                </div>`;

                $('#agregar_botones_procesos').html(content);
                $('#agregar_modales_procesos').html(content_sec);
                $(".datepicker-here").datepicker();
            }
        });
    }else{
        $('#agregar_botones_procesos').html('');
    }
}

function cargarselect(select, tipo_tercero){
    $.ajax({
        url: '/vehiculos/cargar_terceros',
        type: 'POST',
        data: {tipo_tercero:tipo_tercero},
        success: function (datos) {
            content=`<option value="">Seleccione</option>`;
            datos.forEach(item => {
                content +=`<option value="${item.nombre}">${item.nombre}</option>`;
            });

            $('#entidad_expide'+select).html(content);
        }
    });
}

function exportar_documentos() {
    $('#exporta_documentos_id').append('<span class="ml-2 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', true);
    id=$('#vehiculo_id_conductor').val();
    $.ajax({
        url: '/vehiculos/cargar_documentos_all',
        type: 'POST',
        data: {id:id},
        success: function (data) {
            let content = '';
            data.forEach(item => {
                if(item.documento_file != null && item.documento_file != ''){
                    content += `
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="customCheck${item.id}" name="documentos[]" value="${item.id}">
                        <label class="custom-control-label" for="customCheck${item.id}">${item.consecutivo} - ${item.name}</label>
                    </div>
                `;
                }
            });

            $('#exporta_documentos_id').html('Esxportar Documentos').attr('disabled', false);

            if(content != null && content != ''){
                $('#content_exportar_documentos').html(content);
            }else{
                $('#content_exportar_documentos').html(`<span class="text-center">No hay Documentos<span>`);
            }
            $('#modal_exportar').modal('show');
        }
    });
}

function cargar_btn_form(btn, find){
    $(btn).find(find).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).find(find).attr('disabled', 'true');
}

function cargarbtntime(btn, icon){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    setTimeout(function () {
        $(btn).html(`<i class="fa ${icon}"></i>`);
    }, 3000);
}

function cargar_btn_single(btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}


function cambiar_tipo_vehiculo(valor){
    $.ajax({
        url: '/vehiculos/get_vehiculo_categoria',
        type: 'POST',
        data: {categoria_vehiculo:valor},
        success: function (data) {
            $('#tipo_vehiculo_id').html(
                `<option value=""></option>`
            );
            data.forEach(tipo_vehiculo => {
                $('#tipo_vehiculo_id').append(
                    `<option value="${tipo_vehiculo.id}">${tipo_vehiculo.nombre}</option>`
                );
            });
        }
    });
}


function editar_tipo_vehiculo(valor){
    $.ajax({
        url: '/vehiculos/get_vehiculo_categoria',
        type: 'POST',
        data: {categoria_vehiculo:valor},
        success: function (data) {
            $('#tipo_vehiculo_id').html(
                `<option value="">Seleccione</option>`
            );
            data.forEach(tipo_vehiculo => {
                $('#tipo_vehiculo_id').append(
                    `<option value="${tipo_vehiculo.id}">${tipo_vehiculo.nombre}</option>`
                );
            });
        }
    });
}


function required_form(divform, btn){
    $(divform).find('#consecutivo').attr('required', true);
    $(divform).find('#fecha_expedicion').attr('required', true);
    $(divform).find('#fecha_inicio_vigencia').attr('required', true);
    $(divform).find('#fecha_fin_vigencia').attr('required', true);
    $(divform).find('.entidad_expide').attr('required', true);
    $(divform).find('#documento_file').attr('required', true);
}

function addcheck(divform, btn){
    campos = '';
    if($('#'+divform).find('#consecutivo').val() == '') {campos += 'Consecutivo, ';}
    if($('#'+divform).find('#fecha_expedicion').val() == '')  {campos+= 'Fecha Expedición,  ';}
    if($('#'+divform).find('#fecha_inicio_vigencia').val() == '')  {campos+= 'Fecha Inicio Vigencia, ';}
    if($('#'+divform).find('#fecha_fin_vigencia').val() == '')  {campos+= 'Fecha Fin Vigencia, ';}
    if($('#'+divform).find('.entidad_expide').val() == '')  {campos+= 'Entidad Expide, ';}
    if($('#'+divform).find('#documento_file').val() == '')  {campos+= 'Documento, ';}
    if(campos == ''){
        $('#'+divform).modal('hide');
        $('#btn'+divform).html(btn+' <i class="fa fa-check text-primary" aria-hidden="true"></i>');
        $('#'+divform).find('#alert_camp').addClass('d-none');
    }else{
        $('#'+divform).find('#capos_faltante').html(campos);
        $('#'+divform).find('#alert_camp').removeClass('d-none');

    }

}
function removecheck(divform, btn){
    $('#btn'+divform).html(btn);
    $('#'+divform).find('#consecutivo').val('');
    $('#'+divform).find('#fecha_expedicion').val('');
    $('#'+divform).find('#fecha_inicio_vigencia').val('');
    $('#'+divform).find('#fecha_fin_vigencia').val('');
    $(".entidad_expide option[value='']").attr("selected", true);
    $('#'+divform).find('#documento_file').val('');


    $('#'+divform).find('#alert_camp').addClass('d-none');
    $('#'+divform).find('#consecutivo').removeAttr('required');
    $('#'+divform).find('#fecha_expedicion').removeAttr('required');
    $('#'+divform).find('#fecha_inicio_vigencia').removeAttr('required');
    $('#'+divform).find('#fecha_fin_vigencia').removeAttr('required');
    $('#'+divform).find('.entidad_expide').removeAttr('required');
    $('#'+divform).find('#documento_file').removeAttr('required');
}
