function ver_documento(path) {
    $('#modal_ver_documento').modal('show');
    $('#content_modal_ver_documento').html(`
        <iframe style="width: 100%;" src="https://docs.google.com/document/d/${path}/edit" width="100%" height="720" frameborder="0" allowfullscreen target="_parent" scrolling="no"></iframe>
    `);
}

function ver_imagen(path) {
    $('#modal_ver_documento').modal('show');
    $('#content_modal_ver_documento').html(`
        <iframe style="width: 100%;" src="https://drive.google.com/file/d/${path}/preview?usp=drivesdk" width="100%" height="720" frameborder="0" allowfullscreen target="_parent" scrolling="no"></iframe>
    `);
}

function ver_pdf(path) {
    $('#modal_ver_documento').modal('show');
    $('#content_modal_ver_documento').html(`
        <iframe style="width: 100%;" src="https://drive.google.com/file/d/${path}/preview?usp=drivesdk" width="100%" height="720" frameborder="0" allowfullscreen target="_parent" scrolling="no"></iframe>
    `);
}

function ver_excel(path) {
    $('#modal_ver_documento').modal('show');
    $('#content_modal_ver_documento').html(`
        <iframe style="width: 100%;" src="https://docs.google.com/spreadsheets/d/${path}" width="100%" height="720" frameborder="0" allowfullscreen target="_parent" scrolling="no"></iframe>
    `);
}

function descargar(file, path, mimetype) {
    window.open('/hseq/descargar?file='+file+'&path='+path+'&mimetype='+mimetype, '_blank');
}

function eliminar_archivo(path) {
    if (confirm('¿Seguro desea eliminar el archivo?')) {
        window.location.href = '/hseq/eliminar_archivo?path='+path;
    }
}

function eliminar_carpeta(path) {
    if (confirm('¿Seguro desea eliminar la carpeta?')) {
        window.location.href = '/hseq/eliminar_carpeta?path='+path;
    }
}
