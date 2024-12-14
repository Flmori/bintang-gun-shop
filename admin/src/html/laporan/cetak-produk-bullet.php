<?php

require_once __DIR__ . '/vendor/autoload.php';
include "../koneksi.php";


$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINTANG GUN SHOP</title>
    <link rel="icon" href="../../assets/images/logos/shield_person.png" />
<style>
   h1{
      color: #262626;
     }
     table {
      max-width: 960px;
      margin: 10px auto;
     }

      thead th {
        font-weight: 400;
        background: #8a97a0;
        color: #FFF;
      }

      tr {
        background: #f4f7f8;
        border-bottom: 1px solid #FFF;
        margin-bottom: 5px;
      }

      tr:nth-child(even) {
        background: #e8eeef;
      }

      th, td {
        text-align: center;
        padding: 15px 13px;
        font-weight: 300;
      }
 img{
    width: 100px;
    height: 50px;
    }
   </style>
</head>

<body>

<h1 align="center">BINTANG GUN SHOP</h1>
<hr>
<h1 align="center">LAPORAN DATA PRODUK BULLET</h1>

<table align="center" cellspacing="0">
                <thead>
                    <tr >
                        <th>Kode Produk</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>';
$q = mysqli_query($koneksi, "SELECT * from tb_produk WHERE kategori = 'Bullet'");
while ($row = mysqli_fetch_array($q)) {
    $html .= '<tr>
    <td>' . $row['kode_produk'] . '</td>
                                                <td> <img src="../produk/img/' . $row['postimage'] . '" width="50px"
                                                        height="50px"></td>
                                                <td>' . ucwords($row['nama_produk']) . '</td>
                                                <td>' . $row['kategori'] . '</td>
                                                <td>' . $row['deskripsi'] . '</td>
                                                <td>' . $row['harga'] . '</td>
                                                <td>' . $row['stok'] . '</td></tr>';
}


$html .= '</tbody>
            </table>
    
</body>

</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BINTANG GUN SHOP</title>
    <link rel="icon" href="../../assets/images/logos/shield_person.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="color-blue">

        <h1> BINTANG GUN SHOP</h1>
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;"></div>
        <h1>LAPORAN DATA PRODUK</h1>
    </header>
    <div class="card mt-3">
        <div class="card-body p-4">
            <table class="table table-striped">
                <thead>
                    <tr class="modal-title fs-5 bg-light-subtle text-light-emphasis">
                        <th>Kode Produk</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>