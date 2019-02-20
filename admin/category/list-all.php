<?php
$sql = "SELECT * FROM categories";
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
                    <h3 class="box-title">Daftar Data Kategori</h3>
                    <div class="box-tools pull-right">
                        <a href="?page=categories&action=create" class="btn btn-primary">
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
                                <td>Category Name</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($cek > 0) {
                                    while ($category = mysqli_fetch_object($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $category->name; ?></td>
                                    <td>
                                        <a href='?page=categories&action=edit&id=<?= $category->id ?>' class='btn btn-success'>
                                            <i class='fa fa-pencil'></i>
                                            <span>Edit</span>
                                        </a>
                                        <a onclick="return tanya()" href='?page=categories&action=delete&id=<?= $category->id ?>' class='btn btn-danger'>
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