<?php

$id = $_GET['id'];
if ($action == "delete" && $id != "") {
    $sql = "DELETE FROM categories WHERE id = '$id'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>
            alert('Data kategori berhasil dihapus!');
            window.location='?page=categories';
        </script>";
    } else {
        echo "<script>
            alert('Data kategori gagal dihapus!');
            window.location='?page=categories';
        </script>";
    }
}