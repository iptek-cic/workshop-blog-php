<?php

//If users click button Create
if (isset($_POST['create'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $role = $_POST['role'];

    $path = "../uploads/";
    $name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];
    move_uploaded_file($name, $path.$file_name);

    $foto = $file_name;

    $sql = "INSERT INTO users (username, email, password, name, phone, picture, role_id) VALUES ('$username', '$email', '$password', '$nama_lengkap', '$telpon', '$foto', '$role')";

    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>
            alert('Tambah data user baru berhasil');
            window.location= '?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Tambah data user baru gagal');
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
                    <h3 class="box-title">Tambah User Baru</h3>
                </div>
                <div class="box-body">
                    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <label for="nama_lengkap" class="control-label col-md-offset-2 col-md-2">
                                Nama Lengkap
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="nama_lengkap" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="username" class="control-label col-md-offset-2 col-md-2">
                                Username
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="password" class="control-label col-md-offset-2 col-md-2">
                                Password
                            </label>
                            <div class="col-md-5">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <br>


                        <div class="row">
                            <label for="email" class="control-label col-md-offset-2 col-md-2">
                                E-mail
                            </label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="telpon" class="control-label col-md-offset-2 col-md-2">
                                No. Telpon
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="telpon" required>
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
                            <label for="foto" class="control-label col-md-offset-2 col-md-2">
                                Role
                            </label>
                            <div class="col-md-5">
                            <?php
                                $sql_role = "SELECT * FROM roles";
                                $query_role = mysqli_query($link, $sql_role);
                            ?>
                                <select class='form-control' name="role" required>
                                    <option>-- Pilih Hak Akses User --</option>
                                    <?php while($role = mysqli_fetch_object($query_role)):  ?>
                                        <option value="<?= $role->id; ?>"><?= $role->name; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" name="create" class="btn btn-primary">
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