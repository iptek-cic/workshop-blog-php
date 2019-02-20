<?php
$sql = "SELECT * FROM posts";

if($_SESSION['user']['level'] == "Author" || $_SESSION['user']['level'] == "Writer") {
    $user_id = $_SESSION['user']['id'];
    $sql .= " WHERE posts.user_id = '$user_id'";
}

$query = mysqli_query($link, $sql);
$cek = mysqli_num_rows($query);

$no = 1;
?>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Postingan oleh Anda</h3>
                    <div class="box-tools pull-right">
                        <a href="?page=blog-posts&action=create" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            <span>Tambah Data</span>
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-boredered table-responsive">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Judul</td>
                                <td>Kategori</td>
                                <td>Jum. Komentar</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($cek > 0) {
                                    while ($post = mysqli_fetch_object($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $post->title; ?></td>
                                    <td>
                                        <?php
                                            $sql_cat = "SELECT name as kategori FROM categories WHERE id = '$post->category_id'";
                                            $query_cat = mysqli_query($link, $sql_cat);
                                            $cat = mysqli_fetch_object($query_cat);
                                            echo $cat->kategori;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $sql_com = "SELECT COUNT(*) as jumlah_komentar FROM comments WHERE post_id = '$post->id'";
                                            $query_com = mysqli_query($link, $sql_com);
                                            $com = mysqli_fetch_object($query_com);
                                            if($com->jumlah_komentar > 0) {
                                                echo $com->jumlah_komentar;
                                            } else {
                                                echo "Tidak ada komentar";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href='?page=blog-posts&action=edit&id=<?= $post->id ?>' class='btn btn-success'>
                                            <i class='fa fa-pencil'></i>
                                            <span>Edit</span>
                                        </a>
                                        <a onclick="return tanya()" href='?page=blog-posts&action=delete&id=<?= $post->id ?>' class='btn btn-danger'>
                                            <i class='fa fa-trash'></i>
                                            <span>Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->