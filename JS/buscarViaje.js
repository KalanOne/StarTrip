$(document).ready(function () {

    //  Relleno de municipios en Michoacan para los selects de Origen y Destino  //
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

    var fecha = new Date();
    fecha.setDate(fecha.getDate() + 1);
    $("#inputFecha").attr("min", fecha.toISOString().split('T')[0]);

    //  Se genera la accion al dar click en el boton para buscar viaje  //
    $("#buscarViajeBTN").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        //  Se obtienen los datos puestos en el formulario  //
        var origen = $("#inputOrigen").val();
        var destino = $("#inputDestino").val();
        var fecha = $("#inputFecha").val();

        //  Se declaran las variables de relleno para el html dividio en 2  //
        let tablas = "";
        let modales = "";

        //  Se verifican que sean vacios los datos  //
        if (fecha == null || fecha == "") {
            alert("Escoge la fecha del viaje");
            return;
        }

        //  Se hace solicitud para la busqueda viaje con las caracterisiticas dadas  //
        $.ajax({
            type: "POST",
            url: "PHP/busquedaViaje.php",
            data: {
                origen: origen,
                destino: destino,
                fecha: fecha
            },
            success: function (response) {


                response = JSON.parse(response);

                //  Para el caso de los resultados se genera las tuplas  //
                //  para la tabla donde se mostraran los resultados con  //
                //  sus respectivos botones para accionar los modales de  //
                //  opiniones del conductor y reservar lugares pasando  //
                // ~ por una iteracion de cada resultado ~ //
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


                    //  Se hace solicitud para la busqueda de las opiniones  //
                    //  de cada uno de los conductores de los viajes encontrados  //
                    $.ajax({
                        type: "POST",
                        url: "PHP/opiniones.php",
                        data: {
                            idUsuario: item.idUsuario
                        },
                        success: function (respuesta) {

                            respuesta = JSON.parse(respuesta);

                            //  Se crea el modal para la opinion del conductor  //
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

                            //  Se crean las tuplas para la tabla con cada opinion del conductor  //
                            respuesta.map(item2 => {
                                modales += `
                                <tr>
                                    <th scope="row">${item2.idOpinion}</th>
                                    <td>${item2.calificacion}</td>
                                    <td>${item2.descripcion}</td>
                                </tr>
                                `;
                            });

                            //  Se termina el modal de las opiniones del conductor  //
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

                    //  Se genera el modal para la reserva del lugar  //
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
                                            <button type="button" class="btn btn-success" onclick="reservarViaje('${item.idViaje}')">Reservar</button>
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


            },
        });

        //  Se crea funcion para ejectar primero todas las solicitudes  //
        $(document).ajaxStop(function () {

            //  Al final de la tabla de los resultados  //
            //  se crea una leyenda para indicar que ya  //
            // ~~~~~~~~~~ no hay mas viajes ~~~~~~~~~~ //
            tablas += `
                <tr>
                    <th scope="row" colspan="9" class="text-center">No se han encontrado mas viajes</th>
                </tr>
            `;

            //  Se insertan las cadenas de html generados en los puntos que corresponden  //
            $("#columnasViajes").html(tablas);
            $("#modales").html(modales);
        });
    });
});

//  Se crea funcion para reservar el lugar en el viaje  //
//  Se solicita el id del viaje a reservar  //
function reservarViaje(idViaje) {

    // ~ Se obtiene el id del usuario actual ~ //
    var idUsuario = $("#idUsuarioActual").html();

    //  Se obtienen los datos puestos en el formulario  //
    var lugares = $(`#lugaresViaje${idViaje}`).val();
    var equipaje = $(`#equipajeViaje${idViaje}`).val();

    //  Se verifican que no sean vacios los datos  //
    if (lugares == null || lugares == "") {
        alert("Defina los lugares");
        return;
    }
    if (equipaje == null || equipaje == "") {
        alert("Defina su equipaje");
        return;
    }

    //  Se hace solicitud para reservar el lugar en el viaje  //
    $.ajax({
        type: "post",
        url: "PHP/reservarLugar.php",
        data: {
            idUsuario: idUsuario,
            lugares: lugares,
            equiaje: equipaje,
            idViaje, idViaje
        },
        success: function (response) {
            if (response == "Exitoso") {
                alert("Viaje agendado");
                location.reload();
            } else {
                alert("Error al agendar viaje");
                location.reload();
            }
        }
    });
}