$(document).ready(function () {
    var idUsuarioActual = $("#idUsuarioActual").html();

    $.ajax({
        type: "post",
        url: "PHP/rellenoPromociones.php",
        success: function (response) {
            response = JSON.parse(response);
            var relleno = "";
            

            response.map(item => {
                relleno += `
                    <div class="col">
                        <div class="card h-100">
                            <img src="IMGPU/${item.ruta}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">${item.empresa}</h5>
                                <p class="card-text">Vigencia ${item.vigencia}</p>
                            </div>
                        </div>
                    </div>
                `;
            });

            $("#contienePromociones").html(relleno);
        }
    });
});