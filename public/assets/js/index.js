$(document).ready(function(){
    $('#cotizar').on('shown.bs.modal', function () {
        $.ajax({
            url: '/show/services',
            type: 'POST',
            success: function (data) {
                console.log(data)
                let html = `<form>`;
                            data.forEach((element, key) => {
                                html += `
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="font-size: 1.5rem;">
                                        <input class="form-check-input" type="checkbox" id="servicio_${key}" name="servicio_${key}" onchange="habilitar_servicio(this)">
                                        <label class="form-check-label" for="gridCheck1">
                                            ${element.nombre}
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="js-example-basic-multiple js-states form-control w-100 disabled" id="detalle_servicio_${key}" name="detalle_servicio_${key}[]" multiple="multiple">
                                            <option value="">Seleccione servicios</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                </div>`;
                            });

                html += `<button type="submit" class="btn btn-primary" style="width: 60%; margin: 0 20%;">Cotizar</button>
                            </form>`;

                $('#content_servicios').html(html);
            }
        })
    });

    $('.js-example-basic-multiple').select2();

    $('#agregar').change(function () {
        if($(this).prop('checked') == true) {
        total = total + 5;
      }
      else {
        total = total - 5;
      }

      alert(total);

    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function habilitar_servicio(obj) {
    if($(obj).prop('checked') == true) {
        $('#detalle_'+obj.id).removeClass('disabled');
    } else {
        $('#detalle_'+obj.id).val('');
        $('#detalle_'+obj.id).addClass('disabled');
    }
}
