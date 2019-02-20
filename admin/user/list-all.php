<?php
$sql = "SELECT *, users.id as UID FROM users JOIN roles ON users.role_id = roles.id WHERE roles.name = 'Administrator' OR roles.name = 'Operator'";
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
                    <h3 class="box-title">Daftar Data User</h3>
                    <div class="box-tools pull-right">
                        <a href="?page=user&action=create" class="btn btn-primary">
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
                                <td>Foto</td>
                                <td>Nama Lengkap</td>
                                <td>Username</td>
                                <td>E-mail</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($cek > 0) {
                                    while ($usr = mysqli_fetch_object($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <img src='../uploads/<?= $usr->picture; ?>' width="120px">
                                    </td>
                                    <td><?= $usr->name; ?></td>
                                    <td><?= $usr->username; ?></td>
                                    <td><?= $usr->email; ?></td>
                                    <td>
                                        <a href='?page=user&action=edit&id=<?= $usr->UID ?>' class='btn btn-success'>
                                            <i class='fa fa-pencil'></i>
                                            <span>Edit</span>
                                        </a>
                                        <a onclick="return tanya()" href='?page=user&action=delete&id=<?= $usr->UID ?>' class='btn btn-danger'>
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