<?php 
include '../includes/koneksi.php'; 

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Tambah berita
if (isset($_POST['tambah_berita'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $stmt = $pdo->prepare("INSERT INTO berita (judul, isi) VALUES (?, ?)");
    $stmt->execute([$judul, $isi]);
}

// Hapus berita
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $pdo->prepare("DELETE FROM berita WHERE id_berita = ?");
    $stmt->execute([$id]);
}

include '../includes/header.php'; 
$title = 'Kelola Berita';
?>
<link rel="stylesheet" href="../style/style.css">
<div class="sidebar">
    <div style="padding: 2rem; border-bottom: 1px solid #eee;">
        <h3 style="color: #667eea;">👨‍💼 Admin Panel</h3>
        <p>Halo, <?php echo $_SESSION['admin_username']; ?>!</p>
    </div>
    <nav style="padding-top: 1rem;">
        <a href="dashboard.php">📊 Dashboard</a>
        <a href="berita.php" class="active">📰 Berita</a>
        <a href="katalog.php">📦 Katalog</a>
        <a href="logout.php" style="color: #ff6b6b;">🚪 Logout</a>
    </nav>
</div>

<div class="main-content">
    <div class="container">
        <h1>📰 Kelola Berita</h1>
        
        <!-- Form Tambah Berita -->
        <div class="card">
            <h2>Tambah Berita Baru</h2>
            <form method="POST">
                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul" required>
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi" rows="5" required></textarea>
                </div>
                <button type="submit" name="tambah_berita" class="btn">Tambah Berita</button>
            </form>
        </div>
        
        <!-- Daftar Berita -->
        <div class="card">
            <h2>Daftar Berita</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM berita ORDER BY tanggal DESC");
                    while ($berita = $stmt->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($berita['judul']); ?></td>
                            <td><?php echo date('d M Y H:i', strtotime($berita['tanggal'])); ?></td>
                            <td>
                                <a href="?hapus=<?php echo $berita['id_berita']; ?>" 
                                   class="btn btn-danger" 
                                   style="padding: 5px 10px; font-size: 0.9rem;"
                                   onclick="return confirm('Yakin hapus berita ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
<link rel="stylesheet" href="..style/style.css">