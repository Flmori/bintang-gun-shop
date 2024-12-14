<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BINTANG GUN SHOP</title>
    <link rel="icon" href="img/swords.png">
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
        <h1 class="text-center text-white display-6 ">Belanja</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-white">Belanja</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">GUN and BULLET shop</h1>
            <div class="row g-4">
                <!-- Search Form -->
                <div class="col-xl-3">
                    <form action="shop.php" method="GET">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" name="search" class="form-control p-3" placeholder="Cari produk"
                                aria-describedby="search-icon-1">
                            <button type="submit" id="search-icon-1" class="input-group-text p-3"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-6"></div>
                <div class="col-xl-3">
                    <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                        <label for="fruits">Default Sorting:</label>
                        <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                            form="fruitform">
                            <option value="volvo">Bullet</option>
                            <option value="saab">Fire Gun</option>
                            <option value="opel">Air Gun</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h4>Kategori</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    <?php
                                    include "admin/src/html/koneksi.php";

                                    $Bullet = mysqli_query($koneksi, "SELECT COUNT(*) AS total_Bullet From tb_produk WHERE kategori = 'Bullet'");
                                    while ($count_Bullet = mysqli_fetch_assoc($Bullet)) {
                                        ?>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="?kategori=Bullet"><i class="fas fa-apple-alt me-2"></i>Bullet</a>
                                                <span>(<?php echo $count_Bullet['total_Bullet']; ?>)</span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php
                                    include "admin/src/html/koneksi.php";

                                    $Fire_Gun = mysqli_query($koneksi, "SELECT COUNT(*) AS total_Fire_gun FROM tb_produk WHERE kategori = 'Fire gun'");
                                    while ($count_Fire_Gun = mysqli_fetch_assoc($Fire_Gun)) {
                                        ?>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="?kategori=Fire gun"><i
                                                        class="fas fa-apple-alt me-2"></i>Fire_Gun</a>
                                                <span>(<?php echo $count_Fire_Gun['total_Fire_gun']; ?>)</span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php
                                    include "admin/src/html/koneksi.php";

                                    $Air_Gun = mysqli_query($koneksi, "SELECT COUNT(*) AS total_Air_gun FROM tb_produk WHERE kategori = 'Air gun'");
                                    while ($count_Air_Gun = mysqli_fetch_assoc($Air_Gun)) {
                                        ?>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="?kategori=Air gun"><i class="fas fa-apple-alt me-2"></i>Air_Gun</a>
                                                <span>(<?php echo $count_Air_Gun['total_Air_gun']; ?>)</span>
                                            </div>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row g-4 justify-content-start">
                        <?php
                        include "admin/src/html/koneksi.php";

                        $search_query = isset($_GET['search']) ? $_GET['search'] : '';
                        $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

                        // Base query
                        $query = "SELECT * FROM tb_produk WHERE 1=1";

                        // Append search condition
                        if ($search_query) {
                            $query .= " AND nama_produk LIKE '%$search_query%'";
                        }

                        // Append category condition
                        if ($kategori) {
                            $query .= " AND kategori = '$kategori'";
                        }

                        // Pagination
                        $dataPerPage = 6;
                        $totalDataQuery = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM ($query) AS temp");
                        $totalData = mysqli_fetch_assoc($totalDataQuery)['total'];
                        $totalPages = ceil($totalData / $dataPerPage);
                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($currentPage - 1) * $dataPerPage;

                        // Append limit for pagination
                        $query .= " LIMIT $offset, $dataPerPage";

                        $result = mysqli_query($koneksi, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item p-4 border border-secondary">
                                    <div class="fruite-img">
                                        <img src="admin/src/html/produk/img/<?php echo $row['postimage']; ?>"
                                            class="img-fluid rounded-top" style="width: 300px;height: 250px;">
                                    </div>
                                    <div class="p-4 border border-secondary rounded">
                                        <h4><?php echo ucwords($row['nama_produk']); ?></h4>
                                        <p><?php echo ucwords($row['deskripsi']); ?></p>
                                        <div class="d-flex justify-content-between flex-lg-wrap mb-3">
                                            <p class="text-dark fs-5 fw-bold mb-3">
                                                <?php echo number_format($row['harga'], 0, ',', '.'); ?> USD
                                            </p>
                                            <a href="shop-detail.php?kode_produk=<?php echo $row['kode_produk']; ?>"
                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-12">
                            <div class="pagination d-flex justify-content-center mt-5">
                                <?php if ($currentPage > 1): ?>
                                    <a href="?page=<?php echo $currentPage - 1; ?>" class="rounded">&laquo;</a>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <a href="?page=<?php echo $i; ?>"
                                        class="<?php echo $i == $currentPage ? 'active' : ''; ?> rounded"><?php echo $i; ?></a>
                                <?php endfor; ?>
                                <?php if ($currentPage < $totalPages): ?>
                                    <a href="?page=<?php echo $currentPage + 1; ?>" class="rounded">&raquo;</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Fruits Shop End-->


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
                        <p class="mb-4">BINTANG GUN SHOP dengan bangga mendukung dan percaya pada kepemilikan
                            senjata
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