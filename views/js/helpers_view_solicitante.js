$(document).ready(() => {

    recargar_sevicio()

    $("#select_categoria").change(() => {
        recargar_sevicio()
    })


    if ($("#tabla_requerimientos").length) {
        listar_requerimientos()
    }

});



function recargar_sevicio() {
    $.ajax({
        type: 'POST',
        url: '../functions/back_solic_listar_servicio.php',
        data: "id=" + $("#select_categoria").val(),
        success: function (r) {
            $("#contenedor_servicio").html(r);
        }
    })
}


function listar_requerimientos() {
    $.ajax({
        url: '../functions/back_solic_listar_requerimiento.php',
        success: function (r) {
            response = JSON.parse(r)

            html = `<table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Fecha creacion</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>`

            response.forEach(res => {
                fecha= new Date(res[6])
                html += `<tr>
                        <td><a href="">
                        ${res[1]}
                        </a></td>
                        <td>${fecha.getDay()+"/"+fecha.getMonth()+"/"+fecha.getFullYear()}</td>
                        <td>${res[3]}</td>
                        <td>${res[2]}</td>
                        </tr>`
            })
            html += `</tbody></table>`

            $("#tabla_requerimientos").html(html)
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    })

}

