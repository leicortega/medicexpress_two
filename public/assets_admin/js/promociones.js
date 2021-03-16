$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function showPlan(id, btn){

    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'true');
    $.ajax({
        url: '/admin/promociones/show/'+id,
        type: 'get',
        success: function(data){
            console.log(data)
            $('#modal-blade').modal('show');
            $('#modal-blade-title').html(data.name);

            let content = `
                <form action="/admin/promociones/update" method="POST" onsubmit="cargarbtn('#actual_btn_sumie')" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                    <input type="hidden" name="id" value="${data.id}">  
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="titulo" class="col-sm-2 col-form-label">Titulo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="${data.titulo}" name="titulo" id="titulo" autocomplete="off" required>
                        </div>   
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="${data.precio}" name="precio" id="precio" autocomplete="off" required>
                        </div>   
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="descripcion" class="col-sm-2 col-form-label">Descripción:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="${data.descripcion}" name="descripcion" id="descripcion" autocomplete="off" required>
                        </div>   
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                        </div>  
                        <img src="/storage/${data.imagen}" alt="" class="rounded" style="width: 150px; height: auto; margin: 0 auto;"> 
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="estado" id="estado" required>
                                <option value="">Seleccione Estado</option>
                                <option value="activo"${data.estado == 'activo' ? 'selected' : ''}>Activo</option>
                                <option value="inactivo"${data.estado == 'inactivo' ? 'selected' : ''}>Inactivo</option>
                            </select>
                        </div>   
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-lg waves-effect waves-light" id="actual_btn_sumie" type="submit">Actualizar</button>
                    </div>
                </form>
            `;
            $(btn).html('<i class="mdi mdi-pencil"></i>').removeAttr('disabled');
            $('#modal-blade-body').html(content);

            $('#estado').val(data.estado);
        }
    });
}
function eliminar_plan(id) {
    if (confirm('Seguro desea eliminar esta promoción?')) {
        window.location.href = '/admin/promociones/delete/'+id;
    }
}