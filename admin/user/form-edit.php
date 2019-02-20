<?php
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$query = mysqli_query($link, $sql);
$user = mysqli_fetch_object($query);


//If users click button Update
if (isset($_POST['update'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];

    if ($_FILES['foto']) {
        $path = "../uploads/";
        $name = $_FILES['foto']['tmp_name'];
        $file_name = $_FILES['foto']['name'];
        move_uploaded_file($path.$name, $file_name);

        $foto = $file_name;

        $sql = "UPDATE users SET username = '$username', email = '$email', name = '$nama_lengkap', phone = '$telpon', picture = '$foto' WHERE id = '$id'";
    } else {
        $sql = "UPDATE users SET username = '$username', email = '$email', name = '$nama_lengkap', phone = '$telpon' WHERE id = '$id'";
    }

    $query = mysqli_query($link, $sql) or die(mysqli_error($link));

    if ($query) {
        echo "<script>
            alert('Edit data user berhasil');
            window.location= '?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Edit data user gagal');
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
                                <input type="text" class="form-control" name="nama_lengkap" required value="<?= $user->name ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="username" class="control-label col-md-offset-2 col-md-2">
                                Username
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="username" required  value="<?= $user->username ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="control-label col-md-offset-2 col-md-2">
                                E-mail
                            </label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" required  value="<?= $user->email ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="telpon" class="control-label col-md-offset-2 col-md-2">
                                No. Telpon
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="telpon" required  value="<?= $user->phone ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="foto" class="control-label col-md-offset-2 col-md-2">
                                Foto
                            </label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" name="foto">
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