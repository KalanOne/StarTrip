$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();
    var relleno = "";

    $.ajax({
        type: "post",
        url: "PHP/rellenoCalificarUsuario1.php",
        data: {
            idUsuario: idUsuarioActual
        },
        success: function (response) {
            response = JSON.parse(response);

            

            response.map(item => {

                $.ajax({
                    type: "post",
                    url: "PHP/rellenoCalificarUsuario2.php",
                    data: {
                        idCalificado: item.idCalificado
                    },
                    success: function (response2) {
                        response2 = JSON.parse(response2);

                        response2.map(item2 => {
                            relleno += `
                                <form action="#">
                                    <div class="row mt-3 border border-secondary py-2">
                                        <div class="col-md-3">
                                            <p>${item2.nombre} ${item2.apePaterno} ${item2.apeMaterno}</p>
                                            <p>ID Viaje: ${item.idViaje}</p>
                                            <p>${item2.telefono}</p>
                                            <p>${item2.correo}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputCalificacion${item.idOpinion}" class="col-form-label mb-3">Calificación</label>
                                            <input type="number" id="inputCalificacion${item.idOpinion}" class="form-control" min="0" max="5" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputOpinion${item.idOpinion}" class="form-label">Opinión</label>
                                            <div class="form-floating">
                                                <textarea class="form-control docOpinion" placeholder="Leave a comment here"
                                                    id="inputOpinion${item.idOpinion}" style="height: 120px"></textarea>
                                                <label for="inputOpinion${item.idOpinion}">Opina sobre el usuario</label>
                                            </div>
                                        </div>
                                        <div class="col my-2"></div>
                                        <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                                            <button type="button" class="btn btn-outline-success" onclick="calificar('${item.idOpinion}')">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            `;
                        });
                    }
                });

            });

            
        }
    });

    $(document).ajaxStop(function () {
        console.log(relleno);
        $("#contienePersonas").html(relleno);
    });

});

function calificar(idOpinion) {
    var calificacion = $(`#inputCalificacion${idOpinion}`).val();
    var opinion = $(`#inputOpinion${idOpinion}`).val();

    if (calificacion == null || calificacion == "") {
        alert("Calificacion vacia");
        return;
    }else if (calificacion < 0 || calificacion > 5) {
        alert("No se acepta calificacion menor a 0 y mayor a 5");
        return;
    }
    if (opinion == null || opinion == "") {
        alert("Opinion vacia");
        return;
    }

    $.ajax({
        type: "post",
        url: "PHP/calificarUsuario.php",
        data: {
            idOpinion: idOpinion,
            calificacion: calificacion,
            opinion: opinion
        },
        success: function (response) {
            if (response == "Exitoso") {
                alert("Registrado con exito");
                location.reload();
            } else {
                alert("Algo salio mal");
            }
        }
    });
}