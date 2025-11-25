<h2>Daftar Berita</h2>
<!-- <p><a class="btn" href="/moohub/public/?route=news&action=create">Tambah Berita</a></p> -->
<?php if (empty($news)): ?>
    <p>Belum ada berita.</p>
<?php else: ?>
    <ul class="news-list">
    <?php foreach ($news as $n): ?>
        <li>
            <a href="/moohub/public/?route=news&action=detail&id=<?php echo $n['id']; ?>"><?php echo htmlspecialchars($n['title']); ?></a>
            <div class="meta"><?= $n['created_at'] ?></div>
            <div class="actions">
                <!-- <a href="/moohub/public/?route=news&action=edit&id=<?php echo $n['id']; ?>">Edit</a> |
                <a href="/moohub/public/?route=news&action=delete&id=<?php echo $n['id']; ?>" onclick="return confirm('Hapus berita ini?')">Hapus</a> -->
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
