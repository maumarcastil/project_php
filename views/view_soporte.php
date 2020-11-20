<?php
require_once './templates/header.php';
require_once "../functions/helpers.php";
redirect_unset_session();
?>

<div class="container p-3">
    <?php require_once "./templates/soporte_requerimientos.php";?>
</div>




<script src="./js/helpers_view_sop.js" type="text/javascript"></script>
<?php
require_once './templates/footer.php';
?>