<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users Management
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users Management</li>
        </ol>
    </section>

    <?php
        $action = isset($_GET['action']) ? $_GET['action'] : "";
        if ($action == "list") {
            require_once 'author/list-all.php';
        } elseif ($action == "create") {
            require_once 'author/form-create.php';
        } elseif ($action == "edit") {
            require_once 'author/form-edit.php';
        } elseif ($action == "delete") {
            require_once 'author/delete.php';
        } else {
            require_once 'author/list-all.php';
        }

    ?>
</div>
<!-- /.content-wrapper -->