$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();

    $.ajax({
        type: "post",
        url: "PHP/automoviles.php",
        data: {
            idUsuario: idUsuarioActual
        },
        success: function (response) {
            response = JSON.parse(response);

            var misAutos = "";
            response.map(item => {
                misAutos += `
                    <div class="row my-3 py-2 border border-secondary">
                        <div class="col-md-2">
                            <p>${item.marca}</p>
                        </div>
                        <div class="col-md-2">
                            <p>${item.modelo}</p>
                        </div>
                        <div class="col-md-2">
                            <p>${item.color}</p>
                        </div>
                        <div class="col-md-2">
                            <p>${item.placas}</p>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                            <button type="button" class="btn btn-outline-danger" onclick="eliminarAuto('${item.idAuto}')">Eliminar</button>
                        </div>
                    </div>
                `;
            });

            misAutos += `
                <h3 class="text-center mt-5">
                    <small class="text-muted">No se han encontrado mas automóviles de su pertenencia</small>
                </h3>
            `;

            $("#Automoviles").html(misAutos);
        }
    });

    $("#enviarAuto").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var marca = $("#inputMarca").val();
        var modelo = $("#inputModelo").val();
        var color = $("#inputColor").val();
        var placas = $("#inputPlacas").val();

        if (marca == null || marca == "") {
            alert("Marca vacio");
            return;
        }
        if (modelo == null || modelo == "") {
            alert("Modelo vacio");
            return;
        }
        if (color == null || color == "") {
            alert("Color vacio");
            return;
        }
        if (placas == null || placas == "") {
            alert("Placas vacias");
            return;
        }

        $.ajax({
            type: "post",
            url: "PHP/registrarAuto.php",
            data: {
                marca: marca,
                modelo: modelo,
                color: color,
                placas: placas,
                idUsuario: idUsuarioActual
            },
            success: function (response) {
                if (response == "Exitoso") {
                    alert("Registrado con exito");
                    location.reload();
                } else if (response == "Automovil resgitrado") {
                    alert("Automovil resgitrado");
                } else {
                    alert("Algo salio mal");
                }
            }
        });
    });

    $(".disclaimer").hide();
});

function eliminarAuto(idAuto) {
    $.ajax({
        type: "post",
        url: "PHP/eliminarAuto.php",
        data: {
            idAuto: idAuto
        },
        success: function (response) {
            if (response == "Exitoso") {
                alert("Eliminado con exito");
                location.reload();
            } else {
                alert("Algo salio mal");
                location.reload();
            }
        }
    });
}