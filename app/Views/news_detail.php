<?php if ($news_item): ?>
    <h2><?php echo htmlspecialchars($news_item['title']); ?></h2>
    <div class="meta"><?php echo $news_item['created_at']; ?></div>
    <p><?php echo nl2br(htmlspecialchars($news_item['content'])); ?></p>
    <p><a href="/moohub/public/?route=news">Kembali ke daftar</a></p>
<?php else: ?>
    <p>Berita tidak ditemukan.</p>
<?php endif; ?>
