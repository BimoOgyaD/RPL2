<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
include '../config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$result = mysqli_query($koneksi, "SELECT * FROM berita WHERE id=$id");
if(mysqli_num_rows($result) == 0) {
    die("Berita tidak ditemukan");
}
$data = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="../style/style.css">
<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<div class="container" style="max-width:600px;">
    <h2>Edit Berita</h2>
    <form method="post" action="proses_edit.php">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>
        <label>Isi</label>
        <textarea name="isi" rows="10" required><?= htmlspecialchars($data['isi']) ?></textarea>
        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" required>
        <input type="submit" value="Update">
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</div>
</body>
</html>
<link rel="stylesheet" href="..style/style.css">