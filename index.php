<?php 
include 'includes/koneksi.php'; 
include 'includes/header.php'; 
$title = 'Dashboard Pengunjung';
?>

<div class="container">
    <header>
        <nav class="navbar">
            <div class="logo">🏠 Dashboard</div>
            <div class="nav-links">
                <a href="index.php">Beranda</a>
                <a href="admin/login.php">Admin Login</a>
            </div>
        </nav>
    </header>

    <div style="margin-top: 80px;">

        <!-- Tab navigation -->
        <div class="card" style="padding-bottom: 0;">
            <div style="display: flex; gap: 1rem; border-bottom: 2px solid #667eea;">
                <button class="tablink btn active" onclick="openTab('berita', this)">📰 Berita</button>
                <button class="tablink btn" onclick="openTab('katalog', this)">📦 Jasa / Barang</button>
            </div>
        </div>

        <!-- Tab content untuk Berita -->
        <div id="berita" class="tabcontent card" style="margin-top: 1rem; display: block;">
            <h2>Berita Terbaru</h2>
            <?php
            $stmt = $pdo->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 5");
            $berita = $stmt->fetchAll();
            if (empty($berita)): ?>
                <p>Tidak ada berita tersedia.</p>
            <?php else: ?>
                <?php foreach ($berita as $b): ?>
                    <div class="berita-item">
                        <h3><?php echo htmlspecialchars($b['judul']); ?></h3>
                        <p><?php echo substr(strip_tags($b['isi']), 0, 150); ?>...</p>
                        <small><?php echo date('d M Y H:i', strtotime($b['tanggal'])); ?></small>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Tab content untuk Katalog -->
        <div id="katalog" class="tabcontent card" style="margin-top: 1rem; display: none;">
            <h2>Katalog Jasa & Barang</h2>
            <?php
            $stmt = $pdo->query("SELECT * FROM katalog ORDER BY created_at DESC");
            $katalog = $stmt->fetchAll();
            if (empty($katalog)): ?>
                <p>Tidak ada katalog tersedia.</p>
            <?php else: ?>
                <div class="katalog-grid">
                    <?php foreach ($katalog as $k): ?>
                        <div class="katalog-item">
                            <h3><?php echo htmlspecialchars($k['nama_jasa']); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($k['deskripsi'])); ?></p>
                            <?php if ($k['harga']): ?>
                                <div class="harga">
                                    Rp <?php echo number_format($k['harga'], 0, ',', '.'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function openTab(tabName, elmnt) {
  // Sembunyikan semua konten tab
  var tabcontents = document.getElementsByClassName("tabcontent");
  for (var i = 0; i < tabcontents.length; i++) {
    tabcontents[i].style.display = "none";
  }
  // Hapus kelas active dari semua tombol tab
  var tablinks = document.getElementsByClassName("tablink");
  for (var i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }
  // Tampilkan tab yang dipilih dan aktifkan tombolnya
  document.getElementById(tabName).style.display = "block";
  elmnt.classList.add("active");
}
// Set default tab terbuka
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.tablink.active').click();
});
</script>

<?php include 'includes/footer.php'; ?>


<link rel="stylesheet" href="style/style.css">