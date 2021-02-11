function editar_datos_proveedores(id){
      $.ajax({
         data: 'id='+id,
         url: '/admin/sistema/ver_proveedor',
         type: 'POST',
         success: function (respuesta) {
               $('#nombre_proveedor').val(respuesta.nombre);
               $('#id_proveedor').val(respuesta.id);
         }
      }); 

   }

function delete_datos_proveedores(id){
   $.ajax({
      data: 'id='+id,
      url: '/admin/sistema/delete_proveedor',
      type: 'POST',
      success: function (respuesta) {
            location.reload();
      }
   }); 

}


