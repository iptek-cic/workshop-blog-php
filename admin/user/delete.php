<?php

$id = $_GET['id'];
if ($action == "delete" && $id != "") {
    $sql = "DELETE FROM users WHERE id = '$id'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>
            alert('Data user berhasil dihapus!');
            window.location='?page=user';
        </script>";
    } else {
        echo "<script>
            alert('Data user gagal dihapus!');
            window.location='?page=user';
        </script>";
    }
}