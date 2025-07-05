<?= $this->include('template/admin_header'); ?>

<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
<style>
.cyber-glow { text-shadow: 0 0 8px #00fff7, 0 0 16px #6c63ff, 0 0 2px #fff; }
.cyber-admin-container {
    background: linear-gradient(120deg, #232946cc 60%, #181c2fcc 100%);
    border-radius: 24px;
    box-shadow: 0 8px 32px #00fff744, 0 2px 12px #6c63ff55;
    padding: 32px 24px 24px 24px;
    border: 2px solid #232946;
    margin-bottom: 32px;
}
.cyber-admin-title {
    font-size: 32px;
    font-family: 'Fira Code', monospace;
    font-weight: bold;
    color: #00fff7;
    letter-spacing: 2px;
    margin: 0;
    text-shadow: 0 2px 12px #6c63ffcc;
}
.cyber-btn-admin {
    font-family: 'Fira Code', monospace;
    font-weight: bold;
    font-size: 16px;
    letter-spacing: 1px;
    background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
    border: none;
    box-shadow: 0 2px 8px #00fff7cc;
    color: #181c2f;
    border-radius: 8px;
    padding: 10px 22px;
    transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
    cursor: pointer;
}
.cyber-btn-admin:hover {
    background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%);
    color: #fff;
    box-shadow: 0 0 32px #6c63ffcc, 0 0 8px #00fff7cc;
    transform: scale(1.05);
}
.cyber-input-admin, .cyber-select-admin {
    padding: 12px;
    border-radius: 8px;
    border: 1.5px solid #232946;
    background: #232946;
    color: #e0e7ef;
    font-family: 'Fira Code', monospace;
    font-size: 15px;
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
    box-shadow: 0 0 8px #6c63ff33;
}
.cyber-input-admin:focus, .cyber-select-admin:focus {
    border-color: #00fff7;
    box-shadow: 0 0 16px #00fff7cc;
}
table.cyber-table-admin {
    width: 100%;
    background: linear-gradient(120deg, #232946 60%, #181c2f 100%);
    border-radius: 16px;
    box-shadow: 0 8px 32px #00fff744, 0 2px 12px #6c63ff55;
    overflow: hidden;
    border: 2px solid #232946;
    font-family: 'Fira Code', monospace;
    font-size: 15px;
    color: #e0e7ef;
}
table.cyber-table-admin thead tr {
    background: #232946;
    color: #00fff7;
    font-size: 16px;
}
table.cyber-table-admin tbody tr {
    background: #181c2f;
    border-bottom: 1.5px solid #232946;
    transition: background 0.2s;
}
table.cyber-table-admin tbody tr:hover {
    background: #232946;
}
table.cyber-table-admin th, table.cyber-table-admin td {
    padding: 12px 10px;
    text-align: left;
}
.pagination { margin-top: 20px; }
</style>
<div class="cyber-admin-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px;">
        <h2 class="cyber-admin-title cyber-glow">Daftar Artikel</h2>
        <a href="<?= base_url('/admin/artikel/add'); ?>" class="cyber-btn-admin">Tambah Artikel</a>
    </div>
    <form method="get" style="margin-bottom: 24px; display: flex; gap: 12px; align-items: center;">
        <input type="text" name="q" value="<?= esc($q); ?>" placeholder="Cari judul..." class="cyber-input-admin">
        <select name="kategori_id" class="cyber-select-admin">
            <option value="">Semua Kategori</option>
            <?php if (isset($kategori) && is_array($kategori)): ?>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= esc($k['nama_kategori']); ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <button type="submit" class="cyber-btn-admin">Cari</button>
    </form>
    <?php if (isset($error)): ?>
        <div style="color: #00fff7; padding: 10px; border: 1px solid #00fff7; border-radius: 5px;">
            <h4><?= esc($error); ?></h4>
            <p><?= esc($message); ?></p>
        </div>
    <?php else: ?>
        <table class="cyber-table-admin">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($artikel)): ?>
                    <?php foreach ($artikel as $item): ?>
                        <tr>
                            <td><?= esc($item['id']); ?></td>
                            <td><?= esc($item['judul']); ?></td>
                            <td><?= esc($item['nama_kategori'] ?? 'N/A'); ?></td>
                            <td><?= $item['status'] ? '<span style=\'color:#10b981;font-weight:bold;font-family:Fira Code,monospace\'>Published</span>' : '<span style=\'color:#6c63ff;font-weight:bold;font-family:Fira Code,monospace\'>Draft</span>'; ?></td>
                            <td>
                                <a href="/admin/artikel/edit/<?= $item['id']; ?>" class="cyber-btn-admin" style="font-size: 14px;">Edit</a>
                                <a href="/admin/artikel/delete/<?= $item['id']; ?>" class="cyber-btn-admin" style="font-size: 14px; background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%); color: #fff;" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #00fff7; font-family: 'Fira Code', monospace;">Tidak ada artikel.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($pager): ?>
            <div class="pagination">
                <?= $pager->links(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?= $this->include('template/admin_footer'); ?>
