function mostrar_imagen(url, btn) {
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'true');
    $('#modal_ver_documento_content').html(`<img src="/storage/${url}" class="img-fluid" alt="">`);
    $('#modal_ver_documento').modal('show');
    $(btn).html('<i class="fa fa-eye"></i>').removeAttr('disabled');
}

function eliminar_factura(id, btn) {
    if (window.confirm('¿Seguro desea eliminar la factura?')) {
        $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'true');
        window.location.href = '/vehiculos/mantenimientos/eliminar_factura/'+id;
    }
}

function cargarbtn(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}
