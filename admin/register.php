<?php 
include '../includes/koneksi.php'; 
include '../includes/header.php'; 
$title = 'Admin Register';
$message = '';

if ($_POST) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        $message = 'Registrasi berhasil! Silakan login.';
    } catch (PDOException $e) {
        $message = 'Username sudah digunakan!';
    }
}
?>
<link rel="stylesheet" href="../style/style.css">
<div class="container">
    <div class="login-form">
        <div class="card">
            <h2 style="text-align: center;">📝 Daftar Admin</h2>
            <?php if ($message): ?>
                <div class="message <?php echo strpos($message, 'berhasil') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required maxlength="50">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required minlength="6">
                </div>
                <button type="submit" class="btn" style="width: 100%;">Daftar</button>
            </form>
            
            <div style="text-align: center; margin-top: 1.5rem;">
                <a href="login.php" class="btn" style="width: 100%; background: #6c757d;">Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
<link rel="stylesheet" href="..style/style.css">