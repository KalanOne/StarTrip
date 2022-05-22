// var d = "<" + "div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"" + "><" + "strong" + ">" + "Holy guacamole!" + "<" + "/" + "strong" + ">" + "You should check in on some of those fields below." + "<" + "button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"" + ">" + "<" + "/" + "button" + ">" + "<" + "/" + "div" + ">";

// document.getElementById('alertas').innerHTML = d;

$(document).ready(function () {
    $("#iniciarSesionBTN").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var correo = $("#correoIniciar").val();
        var contra = $("#contraIniciar").val();

        if (correo == null || correo == "") {
            alert("Correo vacio");
            return;
        }
        if (contra == null || contra == "") {
            alert("Contraseña vacia");
            return;
        }
        var pet = $("#inicioSesionFormulario").attr("action");
        var met = $("#inicioSesionFormulario").attr("method");

        $.ajax({
            type: met,
            url: pet,
            data: {
                correo: correo,
                contra: contra,
            },
            success: function (response) {
                if (response == "Usuario") {
                    // ~~~~~~~~~~ Usuario logeado ~~~~~~~~~ //
                    window.open("buscarViaje.php", "_self");
                } else if (response == "Admin") {
                    // ~~~~~~~~~~~~ Admin logueado ~~~~~~~~~~~ //
                    window.open("subirPublicidad.php", "_self");
                } else if (response == "Datos mal") {
                    // No hay informacion del usuario
                    alert("Correo y/o contraseña incorrectos");
                } else {
                    alert("Ninguno");
                }
            },
        });
    });

    $("#registrarSesionBTN").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var correo = $("#correoRegistro").val();
        var nombre = $("#nombreRegistro").val();
        var apePa = $("#apePaRegistro").val();
        var apeMa = $("#apeMaRegistro").val();
        var direccion = $("#direccionRegistro").val();
        var tel = $("#telRegistro").val();
        var contra = $("#contraRegistro").val();
        var fecha = $("#fechaNacRegistro").val();
        var edoCiv = $("#estadoCivRegistro").val();
        var correoCont = $("#correoContRegistro").val();
        var nombreCont = $("#nombreContRegistro").val();
        var fechaCont = $("#fechaNacContRegistro").val();
        var telCont = $("#telContRegistro").val();

        if (correo == null || correo == "") {
            alert("Correo vacio");
            return;
        } else if (!/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo)) {
            alert("La dirección de email " + correo + " es incorrecta.");
            return;
        }
        if (nombre == null || nombre == "") {
            alert("Nombre vacio");
            return;
        }
        if (apePa == null || apePa == "") {
            alert("Apellido paterno vacio");
            return;
        }
        if (apeMa == null || apeMa == "") {
            alert("Apellido materno vacio");
            return;
        }
        if (direccion == null || direccion == "") {
            alert("Dirección vacio");
            return;
        }
        if (tel == null || tel == "") {
            alert("Telefono vacio");
            return;
        }
        if (contra == null || contra == "") {
            alert("Contraseña vacio");
            return;
        }
        if (fecha == null || fecha == "") {
            alert("Fecha de nacimiento vacio");
            return;
        }
        if (edoCiv == null || edoCiv == "") {
            alert("Estado civil vacio");
            return;
        }
        if (correoCont == null || correoCont == "") {
            alert("Correo de contacto de confianza vacio");
            return;
        } else if (!/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correoCont)) {
            alert("La dirección de email " + correoCont + " es incorrecta.");
            return;
        } else if (correo == correoCont) {
            alert("La direccion de correo de usuario y de contacto de confianza no pueden ser la misma");
            return;
        }
        if (nombreCont == null || nombreCont == "") {
            alert("Nombre completo de contacto de confianza vacio");
            return;
        }
        if (fechaCont == null || fechaCont == "") {
            alert("Fecha de nacimiento de contacto de confianza vacia");
            return;
        }
        if (telCont == null || telCont == "") {
            alert("Telefono de contacto de confianza vacia");
            return;
        }

        var pet = $("#registroSesionFormulario").attr("action");
        var met = $("#registroSesionFormulario").attr("method");

        $.ajax({
            type: met,
            url: pet,
            data: {
                correo: correo,
                nombre: nombre,
                apePa: apePa,
                apeMa: apeMa,
                direccion: direccion,
                tel: tel,
                contra: contra,
                fecha: fecha,
                edoCiv: edoCiv,
                correoCont: correoCont,
                nombreCont: nombreCont,
                fechaCont: fechaCont,
                telCont: telCont
            },
            success: function (response) {
                if (response == "Registrado") {
                    alert("Registrado con exito, porfavor inicia sesion");
                    location.reload();
                } else {
                    alert("Correo electrónico registrado");
                }

            },
        });

    });


    $.ajax({
        type: "post",
        url: "PHP/actualizarBD.php",
        success: function (response) {
            console.log(response);
        }
    });
});