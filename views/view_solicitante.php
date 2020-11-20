<?php
require_once './templates/header.php';
require_once "../functions/helpers.php";
redirect_unset_session();
?>

<div class="container p-3">
    <?php existen_requerimientos_solicitantes();
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

                <form action="../functions/back_solic_crear_requerimiento.php" method="POST">

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria para el servicio</label>
                        <select class="form-control" name="select_categoria" id="select_categoria">
                            <option value="0"> Seleccione una opcion</option>
                            <?php
                            $categorias = obtener_categorias_select();
                            foreach ($categorias as $categoria) {
                                echo ("<option value='" . $categoria[0] . "'>" . $categoria[1] . "</option>" . "<br>");
                            }
                            ?>
                        </select>
                    </div>
                    <!-- CONTENEDOR DE SELECT ACTUALIZABLE SERVICIOS -->
                    <div class="form-group" id="contenedor_servicio">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripcion</label>
                        <textarea class="form-control" id="txt_descripcion" name="txt_descripcion" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ubicación dentro de la empresa</label>
                        <input type="text" class="form-control" name="txt_ubicacion" placeholder="Ubicación">
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

<script src="./js/helpers_view_solicitante.js" type="text/javascript"></script>
<?php
require_once './templates/footer.php';
?>