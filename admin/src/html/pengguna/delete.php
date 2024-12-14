<?php

include "../koneksi.php";

$id = $_GET['id'];

// Delete the database entry
$query = "DELETE FROM tb_user WHERE id = '$id'";
$hapus = mysqli_query($koneksi, $query);

if ($hapus) {
    echo "<script>alert('Data Berhasil dihapus'); </script>";
    header("refresh:0, pengguna.php");
} else {
    echo "<script>alert('Data Gagal dihapus'); </script>";
    header("refresh:0, pengguna.php");
}
?>