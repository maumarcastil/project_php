$(document).ready(() => {
    listar_requerimientos_disponibles()
    listar_mis_requerimientos()


    if ($("#contenedor_lista_requerimientos").length) {
        setInterval(() => {
            listar_requerimientos_disponibles()
        }, 3000)
    }

});



// lista los requerimientos disponibles a darle soporte
function listar_requerimientos_disponibles() {
    $.ajax({
        url: '../functions/back_sopor_listar_requerimiento.php',
        success: function (r) {
            response = JSON.parse(r)

            html = `<table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Fecha creacion</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>`

            response.forEach(res => {
                fecha = new Date(res[6])
                html += `<tr>
                        <td><a href="">
                        ${res[1]}
                        </a></td>
                        <td>${fecha.getDay()+"/"+fecha.getMonth()+"/"+fecha.getFullYear()}</td>
                        <td>${res[3]}</td>
                        <td><button type="button" class="btn btn-primary btn-sm p-1" id="atender${res[1]}">Atender servicio</button></td>
                        </tr>`
            })
            html += `</tbody></table>`

            html += `<script> 
                    $("button[id^=atender]").click(function () {
                        var codigo = $(this).attr('id')
                        document.querySelector("#" + codigo).parentNode.parentNode.remove()
                        codigo = codigo.replace("atender", "")

                        $.ajax({
                            type: 'POST',
                            url: '../functions/back_sopor_asignar_requerimiento.php',
                            data: {
                                "codigo":codigo,
                            },
                            success: function (respuesta) {     
                                location.reload()                           
                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });
                    })
                    </script>`

            $("#contenedor_lista_requerimientos").html(html)
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    })

}




//lista los requerimientos escojidos para darle soporte
function listar_mis_requerimientos() {
    $.ajax({
        url: '../functions/back_sopor_mis_requerimientos.php',
        success: function (r) {
            response = JSON.parse(r)
            if (response.length) {

                html = `<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Fecha creacion</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>`

                response.forEach(res => {
                    fecha = new Date(res[6])
                    html += `<tr>
                            <td><a href="">
                            ${res[1]}
                            </a></td>
                            <td>${fecha.getDay()+"/"+fecha.getMonth()+"/"+fecha.getFullYear()}</td>
                            <td>${res[3]}</td>
                            <td><button type="button" class="btn btn-primary btn-sm p-1" id="responder${res[1]}" data-toggle="modal" data-target="#responder_requerimiento">Responder</button> <button type="button" class="btn btn-danger btn-sm p-1" id="descartar${res[1]}">Descartar servicio</button></td>
                            </tr>`
                })
                html += `</tbody></table>`

                html += `<script> 
                    $("button[id^=responder]").click(function () {
                        var codigo = $(this).attr('id')
                        codigo = codigo.replace("responder", "")
                        $("#txt_codigo").val(codigo)
                    })

                    $("button[id^=descartar]").click(function () {
                        var codigo = $(this).attr('id')
                        document.querySelector("#" + codigo).parentNode.parentNode.remove()
                        codigo = codigo.replace("descartar", "")

                        $.ajax({
                            type: 'POST',
                            url: '../functions/back_sopor_cancelar_requerimiento.php',
                            data: {
                                "codigo":codigo,
                            },
                            success: function (respuesta) {
                                console.log(respuesta)
                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });



                    })



                    </script>`

                $("#contenedor_mis_requerimientos").html(html)
            }
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    })

}


/* html += `<script> 
                    $("button[id^=atender]").click(function () {
                        var codigo = $(this).attr('id')
                        document.querySelector("#" + codigo).parentNode.parentNode.remove()
                        codigo = codigo.replace("atender", "")

                        $.ajax({
                            type: 'POST',
                            url: '../functions/back_sopor_asignar_requerimiento.php',
                            data: {
                                "codigo":codigo,
                            },
                            success: function (respuesta) {     
                                location.reload()                           
                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });
                    })
                    </script>` */