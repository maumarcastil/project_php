<?php
require_once './templates/header.php';

require_once "../functions/helpers.php";
redirect_unset_session();
?>


<br>
<!-- VIEW -->
<div class="d-flex justify-content-center align-items-center">

    <div class="card border-light w-75">
        <div class="card-header text-center">
            <h4>Panel de administración</h4>
        </div>
        <div class="card-body"><br>

            <div class="d-flex flex-row bd-highlight mb-3 justify-content-around">

                <div class="d-flex p-2 flex-fill text-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item active">Usuarios</li>
                        <li class="list-group-item"><a data-toggle="modal" data-target="#modal_crear_usuario" href="">Crear usuario</a></li>
                        <li class="list-group-item" id="consultar_usuarios">Consultar usuario</li>
                    </ul>
                </div>

                <div class="d-flex p-2 flex-fill text-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item active">Categorias</li>
                        <li class="list-group-item"><a data-toggle="modal" data-target="#modal_crear_categoria" href="">Crear categorias</a></li>
                        <li class="list-group-item" id="consultar_categorias">Consultar categorias</li>

                    </ul>
                </div>

                <div class="d-flex p-2 flex-fill text-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item active">Servicios</li>
                        <li class="list-group-item"><a data-toggle="modal" data-target="#modal_crear_servicio" href="">Crear servicios</a></li>
                        <li class="list-group-item" id="consultar_servicio">Consultar servicios</li>
                    </ul>
                </div>
            </div>



        </div>


        <div id="tabla">
        </div>

    </div>


</div>


<!-- Modal CREAR USUARIOS -->
<div class="modal fade" id="modal_crear_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../functions/back_admin_crear_usuario.php" method="POST">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre completo</label>
                        <input type="text" class="form-control" name="txt_nombre" placeholder="Nombre completo">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Direccion</label>
                        <input type="text" class="form-control" name="txt_dir" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telefono</label>
                        <input type="number" class="form-control" name="txt_num" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" name="txt_email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" class="form-control" name="txt_password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo usuario</label>
                        <select class="form-control" name="select_tipo">
                            <option value="0"> Seleccione una opcion</option>
                            <?php
                            $tipos = obtener_tipo();
                            foreach ($tipos as $tipo) {
                                echo ("<option value='" . $tipo[0] . "'>" . $tipo[1] . "</option>" . "<br>");
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal CREAR CATEGORIA -->
<div class="modal fade" id="modal_crear_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../functions/back_admin_crear_categoria.php" method="POST">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Categoria</label>
                        <input type="text" class="form-control" name="txt_categoria" placeholder="Categoria">
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal CREAR SERVICIO -->
<div class="modal fade" id="modal_crear_servicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../functions/back_admin_crear_servicio.php" method="POST">

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria para el servicio</label>
                        <select class="form-control" name="select_categoria">
                            <option value="0"> Seleccione una opcion</option>
                            <?php
                            $tipos = obtener_categorias_select();
                            foreach ($tipos as $tipo) {
                                echo ("<option value='" . $tipo[0] . "'>" . $tipo[1] . "</option>" . "<br>");
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Servicio</label>
                        <input type="text" class="form-control" name="txt_servicio" placeholder="Servicio">
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<!-- Modal EDITAR USUARIOS -->
<div class="modal fade" id="modal_editar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../functions/back_admin_crear_usuario.php" method="POST">

                    <div class="form-group" hidden>
                        <label for="exampleFormControlInput1">id</label>
                        <input type="number" class="form-control" id="txt_id" name="txt_id" placeholder="id" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre completo</label>
                        <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre completo">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Direccion</label>
                        <input type="text" class="form-control" id="txt_dir" name="txt_dir" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telefono</label>
                        <input type="number" class="form-control" id="txt_num" name="txt_num" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo usuario</label>
                        <select class="form-control" name="select_tipo">
                            <option value="0"> Seleccione una opcion</option>
                            <?php
                            $tipos = obtener_tipo();
                            foreach ($tipos as $tipo) {
                                echo ("<option value='" . $tipo[0] . "'>" . $tipo[1] . "</option>" . "<br>");
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal EDITAR CATEGORIA -->
<div class="modal fade" id="modal_editar_categoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../functions/back_admin_crear_categoria.php" method="POST">

                    <div class="form-group" hidden>
                        <label for="exampleFormControlInput1">id</label>
                        <input type="number" class="form-control" id="txt_id" name="txt_id" placeholder="id" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Categoria</label>
                        <input type="text" class="form-control" id="txt_categoria" name="txt_categoria" placeholder="Categoria">
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal EDITAR SERVICIO -->
<div class="modal fade" id="modal_editar_servicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../functions/back_admin_crear_categoria.php" method="POST">

                    <div class="form-group" hidden>
                        <label for="exampleFormControlInput1">id</label>
                        <input type="number" class="form-control" id="txt_id" name="txt_id" placeholder="id" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria para el servicio</label>
                        <select class="form-control" name="select_categoria">
                            <option value="0"> Seleccione una opcion</option>
                            <?php
                            $tipos = obtener_categorias_select();
                            foreach ($tipos as $tipo) {
                                echo ("<option value='" . $tipo[0] . "'>" . $tipo[1] . "</option>" . "<br>");
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Servicio</label>
                        <input type="text" class="form-control" id="txt_servicio" name="txt_categoria" placeholder="Categoria">
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script src="./js/helpers_view_admin.js" type="text/javascript"></script>
<?php
require_once './templates/footer.php';
?>