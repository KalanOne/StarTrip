$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();

    $.ajax({
        type: "post",
        url: "PHP/rellenoMisViaje1.php",
        data: {
            idUsuarioActual, idUsuarioActual
        },
        success: function (response) {

            response = JSON.parse(response);

            let info = "";
            response.map(item => {

                info += `
                    <section class="container py-3 my-2">
                        <div class="row">
                            <ul class="list-group list-group-horizontal-md">
                                <li class="list-group-item flex-fill">ID: ${item.idViaje}</li>
                                <li class="list-group-item flex-fill">${item.nombreOrigen} - ${item.nombreDestino}</li>
                                <li class="list-group-item flex-fill">${item.fechaViaje}</li>
                                <li class="list-group-item flex-fill">${item.horaViaje}</li>
                                <li class="list-group-item flex-fill">Conductor: ${item.nombreConductor} ${item.apePaConductor} ${item.apeMaConductor}</li>
                                <li class="list-group-item flex-fill">Automóvil: ${item.marcaAuto} ${item.modeloAuto} ${item.colorAuto} ${item.placasAuto}</li>
                            </ul>
                        </div>
                `;

                $.ajax({
                    type: "post",
                    url: "PHP/rellenoMisViaje2.php",
                    data: {
                        idViaje: item.idViaje
                    },
                    success: function (response2) {
                        response2 = JSON.parse(response2);

                        response2.map(item2 => {
                            info += `
                                <div class="row mt-3 border border-secondary">
                                    <div class="col-md-3">
                                        <p>${item2.nombrePasajero} ${item2.apePaPasajero} ${item2.apeMaPasajero}</p>
                                        <p>${getEdad(item2.fechaNacimiento.toString())} años</p>
                                        <p>44 35 81 5700</p>
                                        <p>19121038@morelia.tecnm.mx</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            Rincon de San Francisco #570 Fracc. Fresnos Arboledas Morelia Michoacán
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>2 maletas de tamaño mediano, 1 mochila y una cubeta</p>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#Opinion1">
                                            Opiniones
                                        </button>
                                    </div>
                                    <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                                        <button type="button" class="btn btn-outline-success">Aceptar</button>
                                        <button type="button" class="btn btn-outline-danger">Rechazar</button>
                                    </div>
                                </div>
                            `;
                        });

                    }
                });

            });
        }
    });
});

function getEdad(dateString) {
    let hoy = new Date()
    let fechaNacimiento = new Date(dateString)
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
    let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
    if (
      diferenciaMeses < 0 ||
      (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
    ) {
      edad--
    }
    return edad
  }