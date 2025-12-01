<?php 
include '../includes/koneksi.php'; 

// Check login
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

include '../includes/header.php'; 
$title = 'Admin Dashboard';
?>
<link rel="stylesheet" href="../style/style.css">
<div class="sidebar">
    <div style="padding: 2rem; border-bottom: 1px solid #eee;">
        <h3 style="color: #667eea;">👨‍💼 Admin Panel</h3>
        <p>Halo, <?php echo $_SESSION['admin_username']; ?>!</p>
    </div>
    <nav style="padding-top: 1rem;">
        <a href="dashboard.php" class="active">📊 Dashboard</a>
        <a href="berita.php">📰 Berita</a>
        <a href="katalog.php">📦 Katalog</a>
        <a href="logout.php" style="color: #ff6b6b;">🚪 Logout</a>
    </nav>
</div>

<div class="main-content">
    <div class="container">
        <h1>Dashboard Admin</h1>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
            <?php
            $stats = [
                'berita' => $pdo->query("SELECT COUNT(*) as total FROM berita")->fetch()['total'],
                'katalog' => $pdo->query("SELECT COUNT(*) as total FROM katalog")->fetch()['total'],
                'admin' => $pdo->query("SELECT COUNT(*) as total FROM admin")->fetch()['total']
            ];
            ?>
            
            <div class="card">
                <h2>📰 Berita</h2>
                <h3 style="color: #667eea; font-size: 2.5rem;"><?php echo $stats['berita']; ?></h3>
                <a href="berita.php" class="btn">Kelola Berita</a>
            </div>
            
            <div class="card">
                <h2>📦 Katalog</h2>
                <h3 style="color: #667eea; font-size: 2.5rem;"><?php echo $stats['katalog']; ?></h3>
                <a href="katalog.php" class="btn">Kelola Katalog</a>
            </div>
            
            <div class="card">
                <h2>👥 Admin</h2>
                <h3 style="color: #667eea; font-size: 2.5rem;"><?php echo $stats['admin']; ?></h3>
                <a href="register.php" class="btn">Tambah Admin</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
<link rel="stylesheet" href="..style/style.css">