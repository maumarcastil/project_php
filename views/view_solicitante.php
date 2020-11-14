<?php
require_once './templates/header.php';

require_once "../functions/helpers.php";
redirect_unset_session();
?>

<div class="container p-3">
<?php
existen_requerimientos();
?>
</div>



<!-- Modal CREAR REQUERIMIENTO -->
<div class="modal fade" id="modal_crear_requerimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear requerimiento</h5>
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


<?php
require_once './templates/footer.php';
?>