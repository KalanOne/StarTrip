$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();

    $.ajax({
        type: "post",
        url: "PHP/rellenoCuenta.php",
        data: {
            idUsuario: idUsuarioActual
        },
        success: function (response) {
            response = JSON.parse(response);

            response.map(item => {
                $("#nombreCompleto").html(item.nombre + " " + item.apePaterno + " " + item.apeMaterno);
                $("#inputNombre").val(item.nombre + " " + item.apePaterno + " " + item.apeMaterno);
                $("#inputCorreo").val(item.correo);
                $("#inputFecha").val(item.fechaNac);
                $("#inputTel").val(item.telefono);
                $("#inputContra").val(item.contra);
                $("#inputDireccion").val(item.direccion);
                $("#inputEdoCivil").val(item.edoCivil);
                $("#inputNombreCont").val(item.nombreCont);
                $("#inputCorreoCont").val(item.correoCont);
                $("#inputFechaCont").val(item.fechaNacCont);
                $("#inputTelCont").val(item.telefonoCont);
            });
        }
    });

    $("#guardarInfo").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var tel = $("#inputTel").val();
        var contra = $("#inputContra").val();
        var direccion = $("#inputDireccion").val();
        var edoCivil = $("#inputEdoCivil").val();
        var nombreCont = $("#inputNombreCont").val();
        var correoCont = $("#inputCorreoCont").val();
        var fechaNacCont = $("#inputFechaCont").val();
        var telCont = $("#inputTelCont").val();
        var correo = $("#inputCorreo").val();

        if (tel == null || tel == "") {
            alert("Teléfono vacio");
            return;
        }
        if (contra == null || contra == "") {
            alert("Contraseña vacia");
            return;
        }
        if (direccion == null || direccion == "") {
            alert("Dirección vacia");
            return;
        }
        if (edoCivil == null || edoCivil == "") {
            alert("Estado civil vacio");
            return;
        }
        if (nombreCont == null || nombreCont == "") {
            alert("Nombre de contacto de confianza vacio");
            return;
        }
        if (correoCont == null || correoCont == "") {
            alert("Correo de contacto de confianza vacio");
            return;
        } else if (!/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correoCont)) {
            alert("La dirección de email " + correoCont + " es incorrecta.");
            return;
        } else if (correoCont == correo) {
            alert("La direccion de correo de usuario y de contacto de confianza no pueden ser la misma");
            return;
        }
        if (fechaNacCont == null || fechaNacCont == "") {
            alert("Fecha de nacimiento de contacto de confianza vacio");
            return;
        }
        if (telCont == null || telCont == "") {
            alert("Teléfono de nacimiento de contacto de confianza vacio");
            return;
        }

        $.ajax({
            type: "post",
            url: "PHP/actualizarUsuario.php",
            data: {
                tel: tel,
                contra: contra,
                direccion: direccion,
                edoCivil: edoCivil,
                nombreCont: nombreCont,
                correoCont: correoCont,
                fechaNacCont: fechaNacCont,
                telCont: telCont,
                idUsuario: idUsuarioActual
            },
            success: function (response) {
                if (response == "Exitoso") {
                    alert("Se han guardado con exito los datos");
                    location.reload();
                } else {
                    alert("Algo salio mal");
                }
            }
        });
    });
});