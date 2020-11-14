$(document).ready(function () {

    document.getElementById("consultar_usuarios").addEventListener("click", () => {

        if (document.getElementsByClassName("card-footer").length == 1) {
            console.log(document.getElementsByClassName("card-footer"))
            document.getElementsByClassName("card-footer")[0].remove()
        }
            $.ajax({
                url: '../functions/back_admin_listar_usuario.php',
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
                        tr += `
                    <tr>
                    <td>${value[1]}</td>
                    <td>${value[2]}</td>
                    <td>${value[3]}</td>
                    <td>${value[4]}</td>
                    <td id="opciones"><i id="edit${value[0]}" class="fas fa-edit p-1 text-primary" data-toggle="modal" data-target="#modal_editar_usuario"></i> <i id="borrar${value[0]}" class="fas fa-minus-circle p-1 text-danger"></i></td>
                    </tr>`;
                    })

                    tr += `</tbody></table></div>`

                    tr += `<script> 
                    $("i[id^=borrar]").click(function () {
                        var id = $(this).attr('id')
                        document.querySelector("#" + id).parentNode.parentNode.remove()
                        id = id.replace("borrar", "")
                        id = parseInt(id)
                
                        $.ajax({
                            type: 'POST',
                            url: '../functions/back_admin_borrar_usuario.php',
                            data: {
                                "id":id,
                            },
                            success: function (respuesta) {
                                console.log(respuesta)
                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });
                    })

                    $("i[id^=edit]").click(function () {
                        var id = $(this).attr('id')
                        nombre = document.querySelector("#" + id).parentNode.parentNode.children[0].innerText
                        dir = document.querySelector("#" + id).parentNode.parentNode.children[1].innerText
                        tel = document.querySelector("#" + id).parentNode.parentNode.children[2].innerText
                        email = document.querySelector("#" + id).parentNode.parentNode.children[3].innerText
                        id = id.replace("edit", "")
                        id = parseInt(id)
                        $("#txt_id").val(id)
                        $("#txt_nombre").val(nombre)
                        $("#txt_dir").val(dir)
                        $("#txt_num").val(tel)
                        $("#txt_email").val(email)
                    })
                            </script>`


                    $("#tabla").append(tr)
                },
                error: function () {
                    console.log("No se ha podido obtener la información");
                }
            });
    })

    document.getElementById("consultar_categorias").addEventListener("click", () => {
        
        if (document.getElementsByClassName("card-footer").length == 1) {
            console.log(document.getElementsByClassName("card-footer"))
            document.getElementsByClassName("card-footer")[0].remove()
        }
            $.ajax({
                url: '../functions/back_admin_listar_categoria.php',
                success: function (respuesta) {
                    a = JSON.parse(respuesta)


                    tr = `<div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Categorias</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>`

                    a.forEach(value => {
                        tr += `
                    <tr>
                    <td>${value[1]}</td>
                    <td id="opciones"><i id="edit${value[0]}" class="fas fa-edit p-1 text-primary" data-toggle="modal" data-target="#modal_editar_categoria"></i> <i id="borrar${value[0]}" class="fas fa-minus-circle p-1 text-danger"></i></td>
                    </tr>`;
                    })

                    tr += `</tbody></table></div>`

                    tr += `<script> 
                    $("i[id^=borrar]").click(function () {
                        var id = $(this).attr('id')
                        document.querySelector("#" + id).parentNode.parentNode.remove()
                        id = id.replace("borrar", "")
                        id = parseInt(id)
                
                        $.ajax({
                            type: 'POST',
                            url: '../functions/back_admin_borrar_categoria.php',
                            data: {
                                "id":id,
                            },
                            success: function (respuesta) {
                                console.log(respuesta)
                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });
                    })

                    $("i[id^=edit]").click(function () {
                        var id = $(this).attr('id')
                        categoria = document.querySelector("#" + id).parentNode.parentNode.children[0].innerText         
                        id = id.replace("edit", "")
                        id = parseInt(id)
                        $("#txt_id").val(id)
                        $("#txt_categoria").val(categoria)
                    })
                            </script>`


                    $("#tabla").append(tr)
                },
                error: function () {
                    console.log("No se ha podido obtener la información");
                }
            });
        

    })

    document.getElementById("consultar_servicio").addEventListener("click", () => {


        if (document.getElementsByClassName("card-footer").length == 1) {
            console.log(document.getElementsByClassName("card-footer"))
            document.getElementsByClassName("card-footer")[0].remove()
        }
            $.ajax({
                url: '../functions/back_admin_listar_servicios.php',
                success: function (respuesta) {
                    a = JSON.parse(respuesta)


                    tr = `<div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Categorias</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>`

                    a.forEach(value => {
                        tr += `
                    <tr>
                    <td>${value[1]}</td>
                    <td>${value[2]}</td>
                    <td id="opciones"><i id="edit${value[0]}" class="fas fa-edit p-1 text-primary" data-toggle="modal" data-target="#modal_editar_servicio"></i> <i id="borrar${value[0]}" class="fas fa-minus-circle p-1 text-danger"></i></td>
                    </tr>`;
                    })

                    tr += `</tbody></table></div>`

                    tr += `<script> 
                    $("i[id^=borrar]").click(function () {
                        var id = $(this).attr('id')
                        document.querySelector("#" + id).parentNode.parentNode.remove()
                        id = id.replace("borrar", "")
                        id = parseInt(id)
                
                        $.ajax({
                            type: 'POST',
                            url: '../functions/back_admin_borrar_servicio.php',
                            data: {
                                "id":id,
                            },
                            success: function (respuesta) {
                                console.log(respuesta)
                            },
                            error: function () {
                                console.log("No se ha podido obtener la información");
                            }
                        });
                    })

                    $("i[id^=edit]").click(function () {
                        var id = $(this).attr('id')
                        servicio = document.querySelector("#" + id).parentNode.parentNode.children[1].innerText
                        id = id.replace("edit", "")
                        id = parseInt(id)
                        $("#txt_id").val(id)
                        $("#txt_servicio").val(servicio)
                    })
                            </script>`


                    $("#tabla").append(tr)
                },
                error: function () {
                    console.log("No se ha podido obtener la información");
                }
            });

    })

});