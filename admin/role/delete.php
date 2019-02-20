<?php

$id = $_GET['id'];
if ($action == "delete" && $id != "") {
    $sql = "DELETE FROM roles WHERE id = '$id'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>
            alert('Data role berhasil dihapus!');
            window.location='?page=role';
        </script>";
    } else {
        echo "<script>
            alert('Data role gagal dihapus!');
            window.location='?page=role';
        </script>";
    }
}