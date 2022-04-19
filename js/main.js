jQuery(document).on('btnlg','formlg', function (event) { 
    event.preventDefault();//EVITA EL ENVIO POR DEFECTO DE DATOS

    $.ajax({
        type: "POST",//TIPO DE ENVIO DE DATOS
        url: "login.html",
        data: $(this).serialize(),//DEVUELVE UNA CADENA PARA ENVIO
        dataType: "json",
        beforeSend: function () {
            
        }
    })
    .done(function (respuesta) { 
        console.log(respuesta.responseText);
     })
     .fail(function (resp) { 
        console.log(resp.responseText);
      })
    .always(function () { 
        console.log("Complete");
      });
 });