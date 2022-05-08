$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();

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

    $("#apuntarViaje").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var origen = $("#inputOrigen").val();
        var destino = $("#inputDestino").val();
        var fecha = $("#inputFecha").val();
        var hora = $("#inputHora").val();
        var auto = $("#inputAuto").val();
        var lugares = $("#inputLugares").val();

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
});