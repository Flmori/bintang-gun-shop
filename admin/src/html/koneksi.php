<?php

$koneksi = mysqli_connect("localhost", "root", "", "marketplace");

if (mysqli_connect_errno()) {
    echo "koneksi database eror" . mysqli_connect_errno();
}
?>