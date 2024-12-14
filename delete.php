<?php
include "admin/src/html/koneksi.php";

if (isset($_GET['kode_pesan'])) {
    $kode_pesan = $_GET['kode_pesan'];

    $query = "DELETE FROM tb_pesanan WHERE kode_pesan = '$kode_pesan'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('Location: cart.php'); // redirect back to cart page
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
}
?>