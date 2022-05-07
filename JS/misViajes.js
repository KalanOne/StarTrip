$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();
    var info = "";
    var modales = "";

    $.ajax({
        type: "post",
        url: "PHP/rellenoMisViaje1.php",
        data: {
            idUsuarioActual, idUsuarioActual
        },
        success: function (response) {

            response = JSON.parse(response);

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
                                        <p>${item2.telefono}</p>
                                        <p>${item2.correo}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>
                                            ${item2.direccion}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>${item2.equipaje}</p>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#Opinion${item2.idUsuario}">
                                            Opiniones
                                        </button>
                                    </div>
                            `;

                            if (item2.estadoPasajero == 0) {
                                info += `
                                    <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                                        <button type="button" class="btn btn-outline-success" onclick="aceptarUsuario('${item2.idUsuario}', '${item.idViaje}', '${item2.idPasajero}')">Aceptar</button>
                                        <button type="button" class="btn btn-outline-danger" onclick="rechazarUsuario('${item2.idPasajero}')>Rechazar</button>
                                    </div>
                                </div>
                                `;
                            } else {
                                info += `
                                    <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                                        <button type="button" class="btn btn-outline-success" onclick="aceptarUsuario('${item2.idUsuario}', '${item.idViaje}', '${item2.idPasajero}')" disabled>Aceptado</button>
                                    </div>
                                </div>
                                `;
                            }

                            $.ajax({
                                type: "POST",
                                url: "PHP/opiniones.php",
                                data: {
                                    idUsuario: item2.idUsuario
                                },
                                success: function (response3) {

                                    response3 = JSON.parse(response3);

                                    modales += `
                                    <div class="modal fade" id="Opinion${item2.idUsuario}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">${item2.nombrePasajero} ${item2.apePaPasajero} ${item2.apeMaPasajero}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-responsive table-striped">
                                                    <thead>
                                                        <tr class="table-dark">
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Calificación</th>
                                                            <th scope="col">Opinión</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                    `;

                                    respuesta.map(item3 => {
                                        modales += `
                                        <tr>
                                            <th scope="row">${item3.idOpinion}</th>
                                            <td>${item3.calificacion}</td>
                                            <td>${item3.descripcion}</td>
                                        </tr>
                                        `;
                                    })

                                    modales += `
                                                    </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                },
                            });
                        });

                    }
                });

            });
        }
    });

    $.ajax({
        type: "post",
        url: "PHP/rellenoMisViajes3.php",
        data: {
            idUsuarioActual: idUsuarioActual
        },
        success: function (response) {
            response = JSON.parse(response);

            response.map(item => {
                $.ajax({
                    type: "post",
                    url: "PHP/rellenoMisViajes4.php",
                    data: {
                        idViaje: item.idViaje
                    },
                    success: function (response2) {
                        response2 = JSON.parse(response2);

                        response2.map(item2 => {
                            info += `
                                <section class="container py-3 my-2">
                                    <div class="row">
                                        <ul class="list-group list-group-horizontal-md">
                                            <li class="list-group-item flex-fill">ID: ${item.idViaje}</li>
                                            <li class="list-group-item flex-fill">${item2.nombreOrigen} - ${item2.nombreDestino}</li>
                                            <li class="list-group-item flex-fill">${item2.fechaViaje}</li>
                                            <li class="list-group-item flex-fill">${item2.horaViaje}</li>
                                            <li class="list-group-item flex-fill">Conductor: ${item2.nombreConductor} ${item2.apePaConductor} ${item2.apeMaConductor}</li>
                                            <li class="list-group-item flex-fill">Automóvil: ${item2.marcaAuto} ${item2.modeloAuto} ${item2.colorAuto} ${item2.placasAuto}</li>
                                        </ul>
                                    </div>
                            `;

                            $.ajax({
                                type: "post",
                                url: "PHP/rellenoMisViajes5.php",
                                data: {
                                    idViaje: item.idViaje
                                },
                                success: function (response3) {
                                    response3 = JSON.parse(response3);

                                    response3.map(item3 => {
                                        info += `
                                            <div class="row mt-3 border border-secondary">
                                                <div class="col-md-3">
                                                    <p>${item3.nombrePasajero} ${item3.apePaPasajero} ${item3.apeMaPasajero}</p>
                                                    <p>${getEdad(item3.fechaNacimiento.toString())} años</p>
                                                    <p>${item3.telefono}</p>
                                                    <p>${item3.correo}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>
                                                        ${item3.direccion}
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>${item3.equipaje}</p>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                        data-bs-target="#Opinion${item3.idUsuario}">
                                                        Opiniones
                                                    </button>
                                                </div>
                                            </div>
                                        `;

                                        $.ajax({
                                            type: "POST",
                                            url: "PHP/opiniones.php",
                                            data: {
                                                idUsuario: item3.idUsuario
                                            },
                                            success: function (response4) {

                                                response4 = JSON.parse(response4);

                                                modales += `
                                                <div class="modal fade" id="Opinion${item3.idUsuario}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">${item3.nombrePasajero} ${item3.apePaPasajero} ${item3.apeMaPasajero}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-responsive table-striped">
                                                                <thead>
                                                                    <tr class="table-dark">
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Calificación</th>
                                                                        <th scope="col">Opinión</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                `;

                                                respuesta.map(item4 => {
                                                    modales += `
                                                    <tr>
                                                        <th scope="row">${item4.idOpinion}</th>
                                                        <td>${item4.calificacion}</td>
                                                        <td>${item4.descripcion}</td>
                                                    </tr>
                                                    `;
                                                })

                                                modales += `
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                `;
                                            },
                                        });
                                    });
                                }
                            });


                        });
                    }
                });
            });
        }
    });

    $("#contieneModales").html(modales);
    $("#contieneViajes").html(info);
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

function rechazarUsuario(idPasajero) {
    $.ajax({
        type: "post",
        url: "PHP/rechazar.php",
        data: {
            idPasajero: idPasajero
        },
        success: function (response) {
            if (response == "Exitoso") {
                alert("Rechazado con exito");
            } else {
                alert("Algo salio mal");
            }
            location.reload();
        }
    });
}

function aceptarUsuario(idUsuario, idViaje, idPasajero) {
    $.ajax({
        type: "post",
        url: "PHP/rellenoMisViajes5.php",
        data: {
            idViaje: idViaje
        },
        success: function (response) {
            response = JSON.parse(response);

            response.map(item => {
                $.ajax({
                    type: "post",
                    url: "PHP/aceptarUsuario1.php",
                    data: {
                        idUsuario1: idUsuario,
                        idUsuario2: item.idUsuario,
                        idViaje: idViaje
                    },
                    success: function (response2) {
                        if (response2 != "Exitoso") {
                            alert("Algo salio mal");
                            location.reload();
                        }
                    }
                });
            });
        }
    });

    $.ajax({
        type: "post",
        url: "PHP/rellenoMisViajes4.php",
        data: {
            idViaje: idViaje
        },
        success: function (response) {
            response = JSON.parse(response);

            response.map(item => {
                $.ajax({
                    type: "post",
                    url: "PHP/aceptarUsuario1.php",
                    data: {
                        idUsuario1: idUsuario,
                        idUsuario2: item.idConductor,
                        idViaje: idViaje
                    },
                    success: function (response2) {
                        if (response2 != "Exitoso") {
                            alert("Algo salio mal");
                            location.reload();
                        }
                    }
                });
            });
        }
    });

    location.reload();
}