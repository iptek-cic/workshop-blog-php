<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Role User
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Role User</li>
        </ol>
    </section>

    <?php
        $action = isset($_GET['action']) ? $_GET['action'] : "";
        if ($action == "list") {
            require_once 'role/list-all.php';
        } elseif ($action == "create") {
            require_once 'role/form-create.php';
        } elseif ($action == "edit") {
            require_once 'role/form-edit.php';
        } elseif ($action == "delete") {
            require_once 'role/delete.php';
        } else {
            require_once 'role/list-all.php';
        }

    ?>
</div>
<!-- /.content-wrapper -->