
    function agrega_concepto() {
        var campo = $('.add_concept_campo');
        var fieldHTML = '<div class="row"><div class="col-sm-5"><div class="form-group form-group-custom mb-4"><input type="text" class="form-control" placeholder="Defina un concepto" name="concepto[]"/></div></div><div class="col-sm-5"><div class="form-group form-group-custom mb-4"><input type="number" class="form-control" placeholder="Precio" name="precio[]"/></div></div><div class="col-sm-2"><div class="form-group form-group-custom mb-4"><a href="javascript:void(0)" onclick="remove_l(this)" class="delete_btn_d btn btn-danger btn-lg mb-2 float-left" data-toggle="tooltip" data-placement="top" title="Eliminar concepto"><i class="fas fa-trash"></i></a></div></div></div>'; 
        $(campo).append(fieldHTML);
    }

    function remove_l(rem){
        $(rem).parent('div').parent('div').parent('div').remove();
    }

    function add_id_t(maximo,id){ 
        $('#soporte').attr('max', maximo);
        $('.id_agregar_soporte').val(id);
    }


    function see_soportes(id){
        $('#btn_ver_soporte_sop').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('required', true);
         $.ajax({
            data: 'id='+id,
            url: '/solicitud-dinero/versoporte',
            type: 'POST',
            success: function (respuesta) {
                $('.table_soportes').empty();
                respuesta.forEach(soporte => {
                    var dateTime = new Date(soporte.created_at);
                    var fecha =  dateTime.getDate() + "/" + (dateTime.getMonth()+1) + "/" +  dateTime.getFullYear() ;
                    var html = '<tr><td class="align-middle">'+fecha+'</td><td><a target="_blank" href="/storage/'+soporte.archivo+ '"><img class="img-fluid" src="/storage/'+soporte.archivo+ '"></a></td><td class="align-middle">'+soporte.valor_soporte+'</td></tr>';
                    $('.table_soportes').append(html);
                    $('#btn_ver_soporte_sop').html('<i class="mdi mdi-eye"></i>').removeAttr('required');
                    $('#ver_soporte').modal('show');
                });
                
            }
         }); 

    }

    function add_id_estado(id,estado){
        $('.id_estado').val(id);
         $('#estados_selec').empty();

        var html='<option value="">Seleccione</option>';
        if(estado == "Solicitado"){
            html = html + '<option value="Aprobado">Aprobado</option><option value="Negado">Negado</option>';
        }
        if(estado == "Cancelado" || estado == 'Negado'){
            html = html + '<option value="Aprobado">Aprobado</option>';
        }
        if(estado == "Aprobado"){
            html = html + '<option value="Cancelado">Cancelado</option><option value="Entregado">Entregado</option>';
        }
        $('#estados_selec').append(html);
    }

   function verestado(id){
    $('#ver_estado_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('required', true);
         $.ajax({
            data: 'id='+id,
            url: '/solicitud-dinero/verestado',
            type: 'POST',
            success: function (respuesta) {
                $('.table_estados').empty();
                respuesta.forEach(estado => {
                    var dateTime = new Date(estado.created_at);
                    var fecha = dateTime.getDate()  + "/" + (dateTime.getMonth()+1) + "/" +  dateTime.getFullYear();
                    var html = '<tr class="text-center table-bg-dark"><td class="align-middle">'+estado['estado']+'</td><td class="align-middle">'+estado.name+'</td><td class="align-middle">'+fecha+'</td><td class="align-middle">'+estado.descripcion+'</td></tr>'
                    $('.table_estados').append(html);
                });

                $('#ver_estado_btn').html('<i class="mdi mdi-eye"></i>').removeAttr('required');
                $('#ver_estado').modal('show');
                
            }
         }); 

    }

    
function cargarbtn(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}








