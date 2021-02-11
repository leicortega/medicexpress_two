$(window).ready(function () {
    $('input[type=radio][name=galeria]').change(function() {
        if (this.value == 'Si') {
            $('#input_galeria').removeClass('d-none');
        }
        else if (this.value == 'No') {
            $('#input_galeria').addClass('d-none');
        }
    });

    // $('#form_crear_post').submit(function () {
    //    $
    // });
})

function eliminar_post(id) {
    if (confirm('Seguro desea eliminar el post?')) {
        window.location.href = '/blog/post/delete/'+id;
    }
}