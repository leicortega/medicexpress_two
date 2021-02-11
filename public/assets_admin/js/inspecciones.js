function cargarbtn(btn){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
}


function cargarbtnmodal(btn, modal, htm){
    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $(btn).attr('disabled', 'true');
    $(modal).modal('show');
    setTimeout(function () {
        $(btn).html(htm);
        $(btn).removeAttr('disabled');
    },1500);
}