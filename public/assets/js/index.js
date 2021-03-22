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
                                        <input class="form-check-input" type="checkbox" id="servicio_${key}" name="servicio_${key}" onchange="habilitar_servicio(this)" style="width: 20px; height: 20px;">
                                        <label class="form-check-label" for="gridCheck1" style="margin-left: 15px;">
                                            ${element.nombre}
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="js-select2 form-control w-100 disabled" id="detalle_servicio_${key}" name="detalle_servicio_${key}[]" multiple="multiple">
                                    `;
                                    element.servicios.forEach((item, key) => {
                                        html += `
                                        <option value="${item.id}">${item.nombre}</option>
                                        `;
                                    });
                                    html += `
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

    $('.js-select2').select2();

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
