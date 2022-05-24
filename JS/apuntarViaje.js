$(document).ready(function () {

    // ~ Se obtiene el id del usuario actual ~ //
    var idUsuarioActual = $("#idUsuarioActual").html();

    //  Relleno de municipios en Michoacan para los selects de Origen y Destino  //
    $.ajax({
        type: "post",
        url: "PHP/lugares.php",
        success: function (response) {

            response = JSON.parse(response);

            let selectores = "";
            response.map(item => {

                selectores += `
                    <option value="${item.idMunicipio}">${item.nombreMun}</option>
                `;

            });

            $("#inputOrigen").html(selectores);
            $("#inputDestino").html(selectores);
        }
    });

    //  Relleno de automoviles del usuario actual para el select de automovil  //
    $.ajax({
        type: "post",
        url: "PHP/automoviles.php",
        data: {
            idUsuario: idUsuarioActual
        },
        success: function (response) {
            response = JSON.parse(response);

            let selectores = "";
            response.map(item => {

                selectores += `
                    <option value="${item.idAuto}">${item.marca} - ${item.modelo} - ${item.color} - ${item.placas}</option>
                `;

            });

            $("#inputAuto").html(selectores);
        }
    });

    var fecha = new Date();
    fecha.setDate(fecha.getDate() + 2);
    $("#inputFecha").attr("min", fecha.toISOString().split('T')[0]);

    //  Se genera la accion al dar click en el boton para crear viaje  //
    $("#apuntarViaje").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        //  Se obtienen los datos puestos en el formulario  //
        var origen = $("#inputOrigen").val();
        var destino = $("#inputDestino").val();
        var fecha = $("#inputFecha").val();
        var hora = $("#inputHora").val();
        var auto = $("#inputAuto").val();
        var lugares = $("#inputLugares").val();

        //  Se verifican que sean no vacios los datos  //
        if (origen == null || origen == "") {
            alert("Origen vacio");
            return;
        }
        if (destino == null || destino == "") {
            alert("Destino vacio");
            return;
        }
        if (fecha == null || fecha == "") {
            alert("Fecha vacia");
            return;
        }
        if (hora == null || hora == "") {
            alert("Hora de salida vacia");
            return;
        }
        if (auto == null || auto == "") {
            alert("Automovil vacio\nPrimero registre su automovil para dar de alta algun viaje");
            return;
        }
        if (lugares == null || lugares == "") {
            alert("Lugares disponibles vacio");
            return;
        }
        if (origen == destino) {
            alert("El lugar de origen no puede serl el mismo que el de destino\nPor favor seleccione el origen y destino correcto");
            return;
        }

        //  Se hace solicitud para el registro del viaje pasando cada uno de los viajes  //
        $.ajax({
            type: "post",
            url: "PHP/resgistrarViaje.php",
            data: {
                origen: origen,
                destino: destino,
                fecha: fecha,
                hora: hora,
                auto: auto,
                lugares: lugares,
                idUsuario: idUsuarioActual
            },
            success: function (response) {
                if (response == "Exitoso") {
                    alert("Viaje apuntado con exito");
                    location.reload();
                } else {
                    alert("Algo salio mal");
                }
            }
        });
    });

    $(".disclaimer").hide();
});