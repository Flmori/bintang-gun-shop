<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BINTANG GUN SHOP</title>
    <link rel="Icon" href="img/swords.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a
                            href="mailto:putranbintang5@gmail.com"
                            class="text-white">putranbintang5@gmail.com</a></small>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-primary display-6">BINTANG GUN SHOP</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link ">Beranda</a>
                        <a href="shop.php" class="nav-item nav-link active">Belanja</a>
                        <a href="contact.php" class="nav-item nav-link">Hubungi Kami</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <?php
                        include "admin/src/html/koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT * FROM tb_pesanan");
                        $num_rows = mysqli_num_rows($query);
                        ?>
                        <button
                            class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fas fa-search text-primary"></i>
                        </button>
                        <a href="cart.php" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px"><?php echo $num_rows; ?></span>
                        </a>
                        <a href="#" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5" style="position: relative;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(img/download.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    width: 1350px;height: 177px;">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "admin/src/html/koneksi.php";

                        $kode_pesan = isset($_GET['kode_pesan']) ? $_GET['kode_pesan'] : '';
                        $query = "SELECT p.kode_pesan, pr.nama_produk, pr.postimage, p.harga, p.qty, p.total FROM tb_pesanan p JOIN tb_produk pr ON p.nama_produk = pr.kode_produk WHERE p.kode_pesan!= '$kode_pesan'";

                        $result = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>

                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="admin/src/html/produk/img/<?php echo $row['postimage']; ?>"
                                        class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4"><?php echo $row['nama_produk'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?php echo number_format($row['harga'], 0, ',', '.'); ?> USD</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0"
                                        value="<?php echo $row['qty']; ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4"><?php echo number_format($row['total'], 0, ',', '.'); ?> USD</p>
                            </td>
                            <td>
                                <button onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data?')"
                                    class=" btn btn-md rounded-circle bg-light border mt-4"><a
                                        href="delete.php?kode_pesan=<?= $row['kode_pesan']; ?>"><i
                                            class="fa fa-times text-danger"></i></a>
                                </button>
                            </td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
            include "admin/src/html/koneksi.php";

            // Initialize to 0 to avoid potential null values
            $total_all = 0;
            $shipping_cost = 0;

            // Calculate total price from database
            $query = "SELECT SUM(total) as total FROM tb_pesanan";
            $result = mysqli_query($koneksi, $query);

            // Fetch the result and assign it to $total_all
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $total_all = $row['total'] ?? 0; // Default to 0 if the database result is null
            }

            // Set a fixed shipping cost
            $shipping_cost = 3.00;

            // Calculate the grand total
            $grand_total = $total_all + $shipping_cost;

            // Generate a new shopping code
            $auto = mysqli_query($koneksi, "SELECT MAX(kode_belanja) AS max_code FROM tb_belanja");
            $hasil = mysqli_fetch_array($auto);
            $code = $hasil['max_code'];
            $urutan = (int) substr($code, 1, 3);
            $urutan++;
            $huruf = "C";
            $kode_belanja = $huruf . sprintf("%03s", $urutan);

            // Memproses penambahan pesanan saat tombol "pembayaran" ditekan
            if (isset($_POST['pembayaran'])) {
                // Dapatkan nama_produk dari tb_pesanan
                $query = mysqli_query($koneksi, "SELECT GROUP_CONCAT(nama_produk SEPARATOR ',')  AS daftar_produk FROM tb_pesanan");
                $row_produk = mysqli_fetch_assoc($query);
                $produk = $row_produk['daftar_produk'];

                // Simpan data pesanan ke tabel tb_belanja
                $query = mysqli_query($koneksi, "INSERT INTO tb_belanja (kode_belanja, produk, total) VALUES ('$kode_belanja','$produk','$grand_total')");

                if ($query === true) {
                    // Get the kode_belanja from tb_belanja
                    $query = "SELECT kode_belanja FROM tb_belanja ORDER BY kode_belanja DESC LIMIT 1";
                    $result = mysqli_query($koneksi, $query);
                    $row = mysqli_fetch_assoc($result);
                    $kode_belanja = $row['kode_belanja'];

                    // Get the rows from tb_pesanan
                    $query = "SELECT * FROM tb_pesanan";
                    $result = mysqli_query($koneksi, $query);

                    // Loop through each row and insert into tb_transaksi
                    while ($row = mysqli_fetch_assoc($result)) {
                        $kode_pesan = $row['kode_pesan'];
                        $nama_produk = $row['nama_produk'];
                        $harga = $row['harga'];
                        $qty = $row['qty'];
                        $total = $row['total'];

                        $query_insert = "INSERT INTO tb_transaksi (kode_belanja,kode_pesan, produk, harga, qty, total) VALUES ('$kode_belanja','$kode_pesan', '$nama_produk', '$harga', '$qty', '$total')";
                        mysqli_query($koneksi, $query_insert);

                        // Update the stock in tb_produk
                        $query_update_produk = "UPDATE tb_produk SET stok = stok - $qty WHERE kode_produk = '$nama_produk'";
                        mysqli_query($koneksi, $query_update_produk);
                    }

                    // Delete the rows from tb_pesanan
                    $query_delete_pesanan = "DELETE FROM tb_pesanan";
                    mysqli_query($koneksi, $query_delete_pesanan);

                    echo "<script>alert('pesanan sedang di proses');</script>";
                    echo "<meta http-equiv='refresh' content='0;url=cart.php'>";
                    exit;
                } else {
                    // Pesanan gagal ditambahkan, lakukan tindakan yang sesuai, seperti menampilakan pesan error atau log ke file
                    echo "<script>alert('pesanan gagal di proses');</script>";
                    echo "<meta http-equiv='refresh' content='0;url=cart.php'>";
                    exit;
                }
            }
            ?>

            <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
                    Coupon</button>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4"><span class="fw-normal">Total</span> Keranjang</h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0" name="total"><?php echo number_format($total_all, 0, ',', '.'); ?> USD
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Pengiriman</h5>
                                <div class="">
                                    <p class="mb-0"><?php echo number_format($shipping_cost, 0, ',', '.'); ?> USD</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Pengiriman dari masa depan.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4"><?php echo number_format($grand_total, 0, ',', '.'); ?> USD</p>
                        </div>
                        <form method="POST">
                            <button type="submit" name="pembayaran"
                                class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">
                                Proceed Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Cart Page End -->


    <!-- Tastimonial End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-6">
                    <div class="col-lg-6">
                        <a href="#">
                            <h1 class="text-primary mb-0">BINTANG GUN SHOP</h1>
                            <p class="text-secondary mb-0">Legal products</p>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                                href="https://github.com/Flmori" target="_blank"><i class="fab fa-github"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                                href="https://wa.me/6281232890181" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                                href="https://www.instagram.com/bin_mori/" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle"
                                href="https://www.linkedin.com/in/bintang-putra-nagari-b18577272/" target="_blank"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-8 col-md-6">
                    <div class="footer-item col-lg-6">
                        <h4 class="text-light mb-3">Mengapa Orang Menyukai kami!</h4>
                        <p class="mb-4">BINTANG GUN SHOP dengan bangga mendukung dan percaya pada kepemilikan senjata
                            yang bertanggung jawab, Dengan harga yang tidak ada duanya dan dedikasi kami terhadap
                            layanan pelanggan yang ramah.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Hubungi Kami</h4>
                        <p>Email: putranbintang5@gmail.com</p>
                        <p>Phone: +62 812-3289-0181</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light">All right reserved <a href="#"><i class="fas fa-copyright text-light me-2">
                                Copyright
                                2024</i>BINTANG GUN SHOP</a></span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Designed By
                    <a class="border-bottom" href="#">Mori</a>
                    Powered By
                    <a class="border-bottom" href="#">Meko no Mori</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>