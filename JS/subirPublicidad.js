

$(document).ready(function () {
    const imageUploader = document.getElementById('inputPublicidad');

    // const CLOUDINARY_URL = `cloudinary://876686384591216:nk12oxEyc7TztizrZoaZYdIjCGA@dmebr3keg`;

    const CLOUDINARY_URL = `https://api.cloudinary.com/v1_1/dmebr3keg/image/upload`;
    const CLOUDINARY_UPLOAD_PRESET = 'hrkamjta';

    var file;
    var formData = new FormData();

    var rec = 0;

    imageUploader.addEventListener('change', async (e) => {
        // console.log(e);
        file = e.target.files[0];
        formData = new FormData();
        formData.append('file', file);
        formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET);

        rec = 1;
        console.log(file);

    });

    $("#EnviarPublicidad").click(function async(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var vigencia = $("#inputVigencia").val();
        var empresa = $("#inputEmpresa").val();
        var idUsuarioActual = $("#idUsuarioActual").html();

        if (rec == 0) {
            alert("Selecciona una imagen");
            return;
        }
        if (empresa == null || empresa == "") {
            alert("Empresa vacia");
            return;
        }
        if (vigencia == null || vigencia == "") {
            alert("Vigencia vacia");
            console.log(vigencia)
            return;
        }

        // Send to cloudianry
        const res = axios.post(
            CLOUDINARY_URL,
            formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
                // onUploadProgress(e) {
                //     let progress = Math.round((e.loaded * 100.0) / e.total);
                //     console.log(progress);
                //     imageUploadbar.setAttribute('value', progress);
                // }
            }
        ).then((result) => {
            $.ajax({
                type: "post",
                url: "PHP/subirPublicidad.php",
                data: {
                    vigencia: vigencia,
                    empresa: empresa,
                    url: result.data.secure_url,
                    idUsuario: idUsuarioActual
                },
                success: function (response) {
                    if (response == "Exitoso") {
                        alert("Subido con exito");
                        location.reload();
                    } else {
                        alert("Hubo un error");
                    }
                }
            });
        }).catch((err) => {

        });
        console.log(res);
        // imagePreview.src = res.data.secure_url;

        

    });

    $(".disclaimer").hide();
});