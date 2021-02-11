function ver_anexo(anexo) {
    $('#content_modal_anexo').html(`
        <img src="/storage/${anexo}" alt="Anexo">
    `);

    $('#modal_ver_anexo').modal('show');
}


function cargarbtn(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}
