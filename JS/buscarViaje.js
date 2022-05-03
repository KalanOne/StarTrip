

$(document).ready(function () {

    $.ajax({
        type: "post",
        url: "PHP/lugares.php",
        success: function (response2) {

            response2 = JSON.parse(response2);

            let selectores = "";
            response2.map(objeto => {

                selectores += `
                    <option value="${objeto.idMunicipio}">${objeto.nombreMun}</option>
                `;

            });

            $("#inputOrigen").html(selectores);
            $("#inputDestino").html(selectores);
        }
    });


    $("#buscarViajeBTN").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var origen = $("#inputOrigen").val();
        var destino = $("#inputDestino").val();
        var fecha = $("#inputFecha").val();

        if (fecha == null || fecha == "") {
            alert("Escoge la fecha del viaje");
            return;
        }

        $.ajax({
            type: "POST",
            url: "PHP/busquedaViaje.php",
            data: {
                origen: origen,
                destino: destino,
                fecha: fecha
            },
            success: function (response) {
                let tablas = "";
                let modales = "";

                response = JSON.parse(response);

                response.map(item => {
                    tablas += `
                        <tr>
                            <th scope="row">${item.idViaje}</th>
                            <td>${origen}</td>
                            <td>${destino}</td>
                            <td>${fecha}</td>
                            <td>${item.hora}</td>
                            <td>${item.lugares}</td>
                            <td>${item.nombre} ${item.apePa} ${item.apeMa}</td>
                            <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Opinion${item.idUsuario}">Ver</button></td>
                            <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Reservar${item.idViaje}">Reservar</button></td>
                        </tr>
                    `;

                    $.ajax({
                        type: "POST",
                        url: "PHP/opiniones.php",
                        data: {
                            idUsuario: item.idUsuario
                        },
                        success: function (respuesta) {

                            respuesta = JSON.parse(respuesta);

                            modales += `
                            <div class="modal fade" id="Opinion${item.idUsuario}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">${item.nombre} ${item.apePa} ${item.apeMa}</h5>
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

                            respuesta.map(item2 => {
                                modales += `
                                <tr>
                                    <th scope="row">${item2.idOpinion}</th>
                                    <td>${item2.calificacion}</td>
                                    <td>${item2.descripcion}</td>
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

                    modales += `
                        <div class="modal fade" id="Reservar${item.idViaje}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Viaje ${item.idViaje}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="PHP/reservarLugar.php" autocomplete="off" method="post" id="formulario${item.idViaje}">
                                            <div class="mb-3">
                                                <label for="lugaresViaje${item.idViaje}" class="form-label">Lugares</label>
                                                <input type="number" class="form-control" id="lugaresViaje${item.idViaje}" min="1" max="5"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="equipajeViaje${item.idViaje}" class="form-label">Equipaje</label>
                                                <div class="form-floating">
                                                    <textarea class="form-control docEquipaje" placeholder="Leave a comment here"
                                                        id="equipajeViaje${item.idViaje}" style="height: 100px"></textarea>
                                                    <label for="equipajeViaje1">Documenta tu equipaje</label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-success" onclick="reservar('${item.idViaje}')">Reservar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

                })

                $("#columnasViajes").html(tablas);
                $("#modales").html(modales);
            },
        });
    });
});


let f = "";