
$(document).ready(function () {

    
    document.getElementById("consultar_usuarios").addEventListener("click", () => {

        $.ajax({
            url: '../functions/back_admin_usuario.php',
            success: function (respuesta) {
                a = JSON.parse(respuesta)


                tr = `<div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirreccion</th>
                            <th scope="col">Numero</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>`

                a.forEach(value => {
                    tr +=`
                    <tr>
                    <td>${value[1]}</td>
                    <td>${value[2]}</td>
                    <td>${value[3]}</td>
                    <td>${value[4]}</td>
                    <td><i class="fas fa-edit p-1 text-primary"></i><i class="fas fa-minus-circle p-1 text-danger"></i></td>
                    </tr>`;
                })

                tr += `</tbody></table></div>`
                $("#tabla").append(tr)

            },
            error: function () {
                console.log("No se ha podido obtener la información");
            }
        });
    
    })
    
    document.getElementById("consultar_categorias").addEventListener("click", () => {
    
    
    })
    
    document.getElementById("consultar_servicio").addEventListener("click", () => {
    
    
    })


});
