<?php
require_once __DIR__ . '/vendor/autoload.php';
include "../koneksi.php";
function query($query)
{
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
$data = query("SELECT * FROM tb_transaksi");

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
$html = '<html>
<head>
  <title>Laporan Data Pesanan</title>
  <link rel="shortcut icon" href="../../assets/images/logos/logo-makmur.ico" type="image/x-icon">
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


<h1 align="center">TOKO MAKMUR</h1>
<hr>
<h1 align="center">LAPORAN DATA TRANSAKSI</h1>

<table align="center" cellspacing="0">
<thead>
<tr>
  <th>Kode Belanja</th>
  <th>Produk</th>
  <th>Jumlah Produk</th>
  <th>Total Harga</th>
  <th>Waktu Pesan</th>
</tr>
</thead>';


foreach ($data as $row) {
  $html .= '<tbody>
    <tr align="center">
      <td>' . $row["kode_belanja"] . '</td>
      <td>' . $row["produk"] . '</td>
      <td>' . $row["qty"] . '</td>
      <td>' . $row["total"] . '</td>
      <td>' . $row["tanggal"] . '</td>
    </tr>
    </tbody>';
}

$html .= '</table>
  </body>
  </html>';


// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();