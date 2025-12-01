<?php 
include '../includes/koneksi.php'; 

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Tambah katalog
if (isset($_POST['tambah_katalog'])) {
    $nama = $_POST['nama_jasa'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'] ?: null;
    $stmt = $pdo->prepare("INSERT INTO katalog (nama_jasa, deskripsi, harga) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $deskripsi, $harga]);
}

// Hapus katalog
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $pdo->prepare("DELETE FROM katalog WHERE id_katalog = ?");
    $stmt->execute([$id]);
}

include '../includes/header.php'; 
$title = 'Kelola Katalog';
?>
<link rel="stylesheet" href="../style/style.css">

<div class="sidebar">
    <div style="padding: 2rem; border-bottom: 1px solid #eee;">
        <h3 style="color: #667eea;">👨‍💼 Admin Panel</h3>
        <p>Halo, <?php echo $_SESSION['admin_username']; ?>!</p>
    </div>
    <nav style="padding-top: 1rem;">
        <a href="dashboard.php">📊 Dashboard</a>
        <a href="berita.php">📰 Berita</a>
        <a href="katalog.php" class="active">📦 Katalog</a>
        <a href="logout.php" style="color: #ff6b6b;">🚪 Logout</a>
    </nav>
</div>

<div class="main-content">
    <div class="container">
        <h1>📦 Kelola Katalog</h1>
        
        <!-- Form Tambah Katalog -->
        <div class="card">
            <h2>Tambah Jasa/Barang Baru</h2>
            <form method="POST">
                <div class="form-group">
                    <label>Nama Jasa/Barang</label>
                    <input type="text" name="nama_jasa" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Harga (opsional)</label>
                    <input type="number" name="harga" step="0.01" min="0">
                </div>
                <button type="submit" name="tambah_katalog" class="btn">Tambah Katalog</button>
            </form>
        </div>
        
        <!-- Daftar Katalog -->
        <div class="card">
            <h2>Daftar Katalog</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM katalog ORDER BY created_at DESC");
                    while ($katalog = $stmt->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($katalog['nama_jasa']); ?></td>
                            <td><?php echo substr(strip_tags($katalog['deskripsi']), 0, 50); ?>...</td>
                            <td><?php echo $katalog['harga'] ? 'Rp ' . number_format($katalog['harga'], 0, ',', '.') : '-'; ?></td>
                            <td><?php echo date('d M Y', strtotime($katalog['created_at'])); ?></td>
                            <td>
                                <a href="?hapus=<?php echo $katalog['id_katalog']; ?>" 
                                   class="btn btn-danger" 
                                   style="padding: 5px 10px; font-size: 0.9rem;"
                                   onclick="return confirm('Yakin hapus item ini?')">Hapus</a>
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