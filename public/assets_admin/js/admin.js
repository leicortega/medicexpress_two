function cargarbtn(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}

function eliminar_documentos_vehiculo(id, btn){
    if (window.confirm('¿Seguro desea eliminar el documento?')) {
        $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'true');
        window.location.href = '/admin/sistema/eliminar_documento_vehiculo/'+id;
    }
}

function eliminar_usuario(id){
    if(confirm('Seguro desea eliminar este usuario?')){
        window.location.href = '/admin/users/delete/'+id;
    }
}