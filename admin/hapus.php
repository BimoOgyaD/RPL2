<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
include '../config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if($id > 0) {
    $q = "DELETE FROM berita WHERE id=$id";
    if(mysqli_query($koneksi, $q)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Gagal hapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
<link rel="stylesheet" href="..style/style.css">