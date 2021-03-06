$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function showInfo(id, btn){

    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'true');
    $.ajax({
        url: '/admin/informacion/principal/show/'+id,
        type: 'get',
        success: function(data){
            console.log(data)
            $('#modal-blade').modal('show');
            $('#modal-blade-title').html(data.name);

            let content = `
                <form action="/admin/informacion/principal/update" method="POST" onsubmit="cargarbtn('#actual_btn_sumie')" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                    <input type="hidden" name="id" value="${data.id}">  
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="contenido" class="col-sm-2 col-form-label">contenido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="${data.contenido}" name="contenido" id="contenido" autocomplete="off" required>
                        </div>   
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                        </div>   
                        <img src="/storage/${data.imagen}" alt="" class="rounded" style="width: 150px; height: auto; margin: 12px auto;"> 
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
function eliminar_info(id) {
    if (confirm('Seguro desea eliminar esta información?')) {
        window.location.href = '/admin/informacion/principal/delete/'+id;
    }
}

function showAbout(id, btn){

    $(btn).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'true');
    $.ajax({
        url: '/admin/informacion/mision/show/'+id,
        type: 'get',
        success: function(data){
            console.log(data)
            $('#modal-blade').modal('show');
            $('#modal-blade-title').html(data.name);

            let content = `
                <form action="/admin/informacion/mision/update" method="POST" onsubmit="cargarbtn('#actual_btn_sumie')" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                    <input type="hidden" name="id" value="${data.id}">  
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tipo" id="tipo" required>
                                <option value="">Seleccione Tipo</option>
                                <option value="mision"${data.tipo == 'mision' ? 'selected' : ''}>Misión</option>
                                <option value="vision"${data.tipo == 'vision' ? 'selected' : ''}>Visión</option>
                            </select>
                        </div>   
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="contenido" class="col-sm-2 col-form-label">Contenido:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control"  name="contenido" id="contenido" cols="10" rows="2" required>${data.contenido}</textarea>
                        </div>   
                    </div>
                    <div class="form-group row" style="padding: 0 30px;">
                        <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                        </div>   
                        <img src="/storage/${data.imagen}" alt="" class="rounded" style="width: 150px; height: auto; margin: 12px auto;">
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
function eliminar_about(id) {
    if (confirm('Seguro desea eliminar esta información?')) {
        window.location.href = '/admin/informacion/mision/delete/'+id;
    }
}


// mostrar datos de la empresa
function show_datos(id){
    $.ajax({
        url: '/admin/informacion/principal/datos/show/'+id,
        type: 'get',
        success: function(data){
            console.log(data)
            $('#update-info').modal('show');
            let contenido = `
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Contenido</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <form action="/admin/informacion/principal/datos/create" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                            <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                            <input type="hidden" name="id" value="${data.id}">  
                        
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="telefono" class="col-sm-2 col-form-label">Telefono:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="${data.telefono}" name="telefono" id="telefono" autocomplete="off" required>
                                </div>   
                            </div>
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="correo" class="col-sm-2 col-form-label">correo:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" value="${data.correo}"  name="correo" id="correo" autocomplete="off" required>
                                </div>   
                            </div>
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="facebook" class="col-sm-2 col-form-label">link facebook:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="${data.facebook}"  name="facebook" id="facebook" autocomplete="off">
                                </div>   
                            </div>
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="instagram" class="col-sm-2 col-form-label">link instagram:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="${data.instagram}"  name="instagram" id="instagram" autocomplete="off">
                                </div>   
                            </div>
                            <div class="form-group row" style="padding: 0 30px;">
                                <label for="twitter" class="col-sm-2 col-form-label">link twitter:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="${data.twitter}"  name="twitter" id="twitter" autocomplete="off">
                                </div>   
                            </div>
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            `;
            $('#modal-content').html(contenido);
        }
    });
}

