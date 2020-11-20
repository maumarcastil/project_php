<!-- VIEW -->
<div class="d-flex justify-content-center align-items-center">
    <div class="card border-light w-75">
        <div class="card-header text-center">
            <h4>Panel de soporte</h4>
        </div>
        <div class="card-body"><br>
            <div class="d-flex flex-row bd-highlight mb-3 justify-content-around">
                <div class="d-flex p-2 flex-fill text-center">
                    <ul class="list-group w-100">
                        <li class="list-group-item active">Requerimientos</li>
                        <li class="list-group-item"><a data-toggle="modal" data-target="#mis_requerimientos" href="">Mis requerimientos</a></li>
                        <li class="list-group-item"><a data-toggle="modal" data-target="#lista_requerimientos" href="">Requerimientos Disponibles</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal MIS Requerimientos -->
<div class="modal fade" id="mis_requerimientos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mis requerimientos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contenedor_mis_requerimientos">
                    Sin requerimientos!!
                </div><br>
            </div>

            <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                <div class="p-2 w-50">
                    <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal RESPONDER REQUERIMIENTOS-->
<div class="modal fade" id="responder_requerimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear requerimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../functions/back_sopor_finalizar_requerimiento.php" method="POST">

                <div class="form-group" hidden>
                        <label for="exampleFormControlInput1">Codigo</label>
                        <input type="text" class="form-control" id="txt_codigo" name="txt_codigo" placeholder="Servicio">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Detalle</label>
                        <textarea class="form-control" id="txt_detalle" name="txt_detalle" rows="3"></textarea>
                    </div>

                    <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                        <div class="p-2 w-50">
                            <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                        </div>
                        <div class="p-2 w-50">
                            <button class="btn btn-success btn-block" type="submit">Finalizar servicio</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal LISTA Requerimientos -->
<div class="modal fade" id="lista_requerimientos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mis requerimientos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contenedor_lista_requerimientos">
                    Sin requerimientos!!
                </div><br>
            </div>

            <div class="d-flex flex-row bd-highlight mb-2 justify-content-around">
                <div class="p-2 w-50">
                    <button class="btn btn-danger btn-block" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>