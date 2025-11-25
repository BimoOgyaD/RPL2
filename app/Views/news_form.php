<h2><?php echo isset($news_item) ? 'Edit Berita' : 'Tambah Berita'; ?></h2>
<form method="post" action="<?php echo isset($news_item) ? '/moohub/public/?route=news&action=update&id='.$news_item['id'] : '/moohub/public/?route=news&action=store'; ?>">
    <label>Judul</label><br>
    <input type="text" name="title" value="<?php echo isset($news_item) ? htmlspecialchars($news_item['title']) : ''; ?>" required><br><br>

    <label>Isi Berita</label><br>
    <textarea name="content" rows="8" required><?php echo isset($news_item) ? htmlspecialchars($news_item['content']) : ''; ?></textarea><br><br>

    <button type="submit" class="btn">Simpan</button>
    <a href="/moohub/public/?route=news" class="btn secondary">Batal</a>
</form>
