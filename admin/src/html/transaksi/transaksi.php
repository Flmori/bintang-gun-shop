<?php
include "../koneksi.php";

$sql = mysqli_query($koneksi, "SELECT * from tb_produk");
$data = mysqli_fetch_array($sql);

$auto = mysqli_query($koneksi, "SELECT MAX(kode_produk) AS max_code FROM tb_produk");
$hasil = mysqli_fetch_array($auto);
$code = $hasil['max_code'];
$urutan = (int) substr($code, 1, 3);
$urutan++;
$huruf = "P";
$kode_produk = $huruf . sprintf("%03s", $urutan);

$kategori = '';

if (isset($_POST['simpan'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $imgfile = $_FILES['postimage']['name'];
    $tmp_file = $_FILES['postimage']['tmp_name'];
    $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));

    $dir = "img/";
    // allowed extension
    $allowed_extension = array(".jpg", ".jpeg", ".png");

    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extension)) {
        echo "<script>alert('invalid format. only JPG / JPEG / PHG format allowed');</scrypt>";
    } else {

        // rename the img file
        $imgnewfile = md5($imgfile) . $extension;
        // set the destination path

        move_uploaded_file($tmp_file, $dir . $imgnewfile);
        $query = mysqli_query($koneksi, "INSERT INTO tb_produk(kode_produk, postimage, nama_produk, kategori, deskripsi, harga, stok) VALUES ('$kode_produk', '$imgnewfile', '$nama_produk', '$kategori', '$deskripsi', '$harga', '$stok')");
        if ($query) {
            echo "<script>alert('Data Berhasil ditambahkan'); </script>";
            header("refresh:0, produk.php");
        } else {
            echo "<script>alert('Data Gagal ditambahkan');</script>";
            header("refresh:8, produk.php");
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | BINTANG GUN SHOP</title>
    <link rel="icon" href="../../assets/images/logos/shield_person.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.php" class="text-nowrap logo-img"> </a>
                    <h4>BINTANG GUN SHOP</h4>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../index.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Beranda</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../pengguna/pengguna.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../produk/produk.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-package"></i>
                                </span>
                                <span class="hide-menu">Produk</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../pesanan/pesanan.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-message"></i>
                                </span>
                                <span class="hide-menu">Pesanan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="transaksi.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-shopping-cart"></i>
                                </span>
                                <span class="hide-menu">Tansaksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../laporan/laporan.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-printer"></i>
                                </span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="../logout.php"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="card mt-3">
                                <div class="card-body p-4">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Belanja</th>
                                                <th>Produk</th>
                                                <th>total harga</th>
                                                <th>tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q = mysqli_query($koneksi, "SELECT * from tb_belanja ORDER BY tanggal DESC LIMIT 10");
                                            while ($row = mysqli_fetch_array($q)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['kode_belanja']; ?></td>
                                                    <td><?php echo $row['produk']; ?></td>
                                                    <td><?php echo $row['total']; ?></td>
                                                    <td><?php echo $row['tanggal']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
                <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="../../assets/js/sidebarmenu.js"></script>
                <script src="../../assets/js/app.min.js"></script>
                <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>