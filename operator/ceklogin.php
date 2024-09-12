<?php
session_start();
include 'koneksi.php';

$pelanggan = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tbluser WHERE user='$pelanggan' AND pass='$password'";

$hasil = $koneksi->query($sql);

// Fetch row setelah cek jumlah baris
if ($hasil->num_rows) {
    $row = $hasil->fetch_assoc();

    if ($row['sebagai'] == 'admin') {
        $_SESSION['login'] = 'sukses';
        $_SESSION['user'] = $row['user'];
        $_SESSION['foto'] = $row['foto'];
        $_SESSION['user'] = $row['sebagai'];
        header('Location: ../website/landing-page.php');
        exit;
    } else {
        $_SESSION['login'] = 'sukses';
        $_SESSION['user'] = $row['user'];
        $_SESSION['foto'] = $row['foto'];
        $_SESSION['user'] = $row['sebagai'];
        header('Location: ../website/landing-page-user.php');
        exit;
    }
} else {
    $_SESSION['login'] = 'gagal';
    header('Location: ../index.php');
    exit;
}
?>

