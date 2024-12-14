<?php

include "../koneksi.php";

$kode_produk = $_GET['kode_produk'];
// Delete the database entry

$query = "DELETE FROM tb_produk WHERE kode_produk = '$kode_produk'";
$hapus = mysqli_query($koneksi, $query);

if ($hapus) {
    $success = true;
} else {
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modernize Free</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php if (isset($success) && $success) { ?>
        <script>
            Swal.fire({
                title: "Sukses!",
                text: "Data berhasil dihapus!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "produk.php";
                }
            });
        </script>
    <?php } ?>

    <?php if (isset($error) && $error) { ?>
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "Terjadi kesalahan saat menghapus data. Silakan coba lagi!",
                icon: "error",
                confirmButtonText: "OK"
            });
        </script>
    <?php } ?>
</body>

</html>