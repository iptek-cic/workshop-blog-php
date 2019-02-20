<?php

//If users click button Create
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>
            alert('Tambah data kategori baru berhasil');
            window.location= '?page=categories';
        </script>";
    } else {
        echo "<script>
            alert('Tambah data kategori baru gagal');
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
                            <label for="name" class="control-label col-md-offset-2 col-md-2">
                                Nama Kategori
                            </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" required>
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