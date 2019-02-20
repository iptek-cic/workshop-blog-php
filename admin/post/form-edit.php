<?php
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = '$id'";
$query = mysqli_query($link, $sql);
$post = mysqli_fetch_object($query);


//If users click button update
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    //Gambar
    $temp_file = $_FILES['gambar']['tmp_name'];
    $file_name = $_FILES['gambar']['name'];
    $path_file = "../uploads/posts/";
    move_uploaded_file($temp_file, $path_file.$file_name);

    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];

    $slug = str_replace(" ", "-", strtolower($judul));
    $user_id = $_SESSION['user']['id'];

    $sql = "UPDATE posts SET slug = '$slug', title =  '$judul', content =  '$isi', date =  '$tanggal', category_id = '$kategori', user_id = '$user_id' WHERE id = '$id'";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));

    if ($query) {
        echo "<script>
            alert('Post baru berhasil di diperbarui');
            window.location= '?page=blog-posts';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui postingan!');
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
                    <h3 class="box-title">Tambah Postingan Baru</h3>
                </div>
                <div class="box-body">
                    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <label for="judul" class="control-label col-md-offset-1 col-md-2">
                                Judul
                            </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="judul" required value="<?= $post->title; ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="isi" class="control-label col-md-offset-1 col-md-2">
                                Isi
                            </label>
                            <div class="col-md-8">
                                <textarea name="isi" id="isi" class="form-control" cols="30" rows="30" style="resize:none;"><?= $post->content; ?></textarea>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="gambar" class="control-label col-md-offset-1 col-md-2">
                                Gambar
                            </label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="gambar" required>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="tanggal" class="control-label col-md-offset-1 col-md-2">
                                Tanggal
                            </label>
                            <div class="col-md-8">
                                <input type="text" id="tanggal" class="form-control" name="tanggal" required value="<?= $post->date; ?>">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="kategori" class="control-label col-md-offset-1 col-md-2">
                                Kategori
                            </label>
                            <div class="col-md-8">
                                <select id="kategori" name="kategori" class="form-control">
                                    <option>-- Pilih Kategori --</option>
                                    <?php
                                        $sql_categories = "SELECT * FROM categories";
                                        $query_categories = mysqli_query($link, $sql_categories);
                                        while($cat = mysqli_fetch_object($query_categories)):
                                            if($post->category_id == $cat->id):
                                    ?>
                                                <option value='<?= $cat->id ?>' selected><?= $cat->name; ?></option>
                                            <?php else: ?>
                                                <option value='<?= $cat->id ?>'><?= $cat->name; ?></option>
                                            <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
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