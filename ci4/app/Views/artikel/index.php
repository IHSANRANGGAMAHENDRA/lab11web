<?= $this->extend('layout/simple'); ?>

<?= $this->section('content'); ?>
<!-- Google Fonts: Fira Code -->
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
<style>
    .cyber-glow {
        text-shadow: 0 0 8px #00fff7, 0 0 16px #6c63ff, 0 0 2px #fff;
    }
    .cyber-card-daftar {
        background: linear-gradient(135deg, #232946 60%, #232946 80%, #181c2f 100%);
        border-radius: 20px;
        box-shadow: 0 0 32px #00fff744, 0 2px 12px #232946cc;
        border: 2px solid #232946;
        transition: box-shadow 0.25s, border 0.25s, transform 0.25s;
        display: flex;
        flex-direction: column;
        min-height: 340px;
        max-width: 400px;
        margin: 0 auto;
        padding: 0;
        position: relative;
        will-change: transform, box-shadow, border;
    }
    .cyber-card-daftar:hover {
        transform: translateY(-8px) scale(1.025);
        box-shadow: 0 0 48px #00fff7cc, 0 4px 24px #6c63ffcc;
        border-color: #00fff7;
    }
    .cyber-btn-daftar {
        color: #181c2f;
        background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
        padding: 10px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-family: 'Fira Code', monospace;
        font-size: 15px;
        font-weight: bold;
        box-shadow: 0 1px 8px #00fff7cc;
        letter-spacing: 0.5px;
        border: none;
        transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        outline: none;
        cursor: pointer;
        display: inline-block;
    }
    .cyber-btn-daftar:hover {
        background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%);
        color: #fff;
        box-shadow: 0 0 32px #6c63ffcc, 0 0 8px #00fff7cc;
        transform: scale(1.05);
    }
    @media (max-width: 900px) {
        .cyber-card-daftar {
            min-width: 90vw;
            max-width: 98vw;
        }
    }
</style>
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 class="cyber-glow" style="font-size: 40px; font-family: 'Fira Code', monospace; font-weight: bold; color: #00fff7; letter-spacing: 2px; margin-bottom: 10px;"><?= esc($title); ?></h1>
        <p style="color: #e0e7efcc; font-size: 20px; font-family: 'Fira Code', monospace;">Temukan artikel menarik dan informatif dari kami.</p>
    </div>

    <?php if (!empty($artikel)): ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 36px; justify-content: center; align-items: stretch; margin: 0 auto; max-width: 1200px;">
            <?php foreach ($artikel as $row): ?>
                <div class="cyber-card-daftar">
                    <?php if (!empty($row['gambar'])): ?>
                        <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>" style="width: 100%; height: 170px; object-fit: cover; border-top-left-radius: 20px; border-top-right-radius: 20px; filter: brightness(0.97) saturate(1.1) drop-shadow(0 0 12px #00fff7cc);">
                    <?php endif; ?>
                    <div style="padding: 24px 20px 20px 20px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <p style="color: #6c63ff; font-weight: bold; margin-bottom: 10px; font-family: 'Fira Code', monospace; font-size: 15px; letter-spacing: 1px;">Kategori: <?= esc($row['nama_kategori'] ?? 'N/A'); ?></p>
                        <h2 class="cyber-glow" style="font-size: 22px; font-family: 'Fira Code', monospace; font-weight: bold; margin-bottom: 10px; color: #00fff7; letter-spacing: 0.5px;">
                            <a href="<?= base_url('/artikel/' . ($row['slug'] ?: 'artikel-' . $row['id'])); ?>" style="text-decoration: none; color: #00fff7;"> <?= esc($row['judul']); ?> </a>
                        </h2>
                        <p style="color: #e0e7efcc; font-size: 14px; margin-bottom: 16px; font-family: 'Fira Code', monospace;">
                            <?= date('d M Y', strtotime($row['created_at'] ?? date('Y-m-d'))); ?>
                        </p>
                        <p style="color: #e0e7ef; font-size: 15px; margin-bottom: 18px; font-family: 'Fira Code', monospace; line-height: 1.5;"> <?= esc(substr(strip_tags($row['isi'] ?? ''), 0, 100)); ?>...</p>
                        <a href="<?= base_url('/artikel/' . ($row['slug'] ?: 'artikel-' . $row['id'])); ?>" class="cyber-btn-daftar">Baca Selengkapnya</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align: center; color: #00fff7; font-family: 'Fira Code', monospace;">Belum ada artikel.</p>
    <?php endif; ?>

<?= $this->endSection(); ?>
