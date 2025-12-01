<?php 
include '../includes/koneksi.php'; 
include '../includes/header.php'; 
$title = 'Admin Login';
$error = '';

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id_admin'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<link rel="stylesheet" href="../style/style.css">
<div class="container">
    <div class="login-form">
        <div class="card">
            <h2 style="text-align: center;">🔐 Admin Login</h2>
            <?php if ($error): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Login</button>
            </form>
            
            <div style="text-align: center; margin-top: 1.5rem;">
                <small>Belum punya akun? <a href="register.php" style="color: #667eea;">Daftar di sini</a></small>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
