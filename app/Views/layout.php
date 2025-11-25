<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?? 'MooHub'; ?></title>
    <link rel="stylesheet" href="/moohub/public/css/style.css">
</head>
<body>
<header>
    <div class="container">
        <h1>MooHub</h1>
        <nav>
            <a href="/moohub/public/">Home</a> |
            <a href="/moohub/public/?route=news">Berita</a> |
            <a href="/moohub/public/?route=news&action=create">Tambah Berita</a>
        </nav>
    </div>
</header>
<main class="container">
<?php
if (isset($content)) {
    include $content;
} else {
    // default include based on called controller
    include __DIR__ . '/home.php';
}
?>
</main>
<footer class="container">
    <p>&copy; <?= date('Y') ?> MooHub</p>
</footer>
</body>
</html>
