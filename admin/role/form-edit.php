<?php
$id = $_GET['id'];
$sql = "SELECT * FROM roles WHERE id = '$id'";
$query = mysqli_query($link, $sql);
$role = mysqli_fetch_object($query);


//If roles click button Update
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $sql = "UPDATE roles SET name = '$name' WHERE id = '$id'";

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));

    if ($query) {
        echo "<script>
            alert('Edit data role berhasil');
            window.location= '?page=roles';
        </script>";
    } else {
        echo "<script>
            alert('Edit data role gagal');
        </script>";
    }
}


?>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data User</h3>
                </div>
                <div class="box-body">
                    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <label for="nama_lengkap" class="control-label col-md-offset-2 col-md-2">
                                Nama Lengkap
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" required value="<?= $role->name ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" name="update" class="btn btn-primary">
                                    <i class="fa fa-floppy-o"></i>
                                    <span> Simpan</span>
                                </button>
                                <button type="reset" name="reset" class="btn btn-default">
                                    <i class="fa fa-refresh"></i>
                                    <span> Reset</span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->