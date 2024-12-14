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
<h1 align="center">LAPORAN DATA PESANAN</h1>

<table align="center" cellspacing="0">
                <thead>
                    <tr >
                        <th>Kode Belanja</th>
                        <th>Kode pesanan</th>
                        <th>produk</th>
                        <th>jumlah</th>
                        <th>harga</th>
                        <th>total harga</th>
                        <th>waktu pesan</th>
                    </tr>
                </thead>
                <tbody>';
$q = mysqli_query($koneksi, "SELECT * from tb_transaksi ORDER BY tanggal DESC LIMIT 10");
while ($row = mysqli_fetch_array($q)) {
    $html .= '<tr>
                        <td>' . $row['kode_belanja'] . '</td>
                        <td> ' . $row['kode_pesan'] . '</td>
                        <td>' . $row['produk'] . '</td>
                        <td>' . $row['qty'] . '</td>
                        <td>' . $row['harga'] . '</td>
                        <td>' . $row['total'] . '</td>
                        <td>' . $row['tanggal'] . '</td>
                    </tr>';
}


$html .= '</tbody>
            </table>

</body>

</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>