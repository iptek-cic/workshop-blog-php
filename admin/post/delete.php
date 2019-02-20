<?php

$id = $_GET['id'];
if ($action == "delete" && $id != "") {
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        echo "<script>
            alert('Data postingan berhasil dihapus!');
            window.location='?page=blog-posts';
        </script>";
    } else {
        echo "<script>
            alert('Data postingan gagal dihapus!');
            window.location='?page=blog-posts';
        </script>";
    }
}