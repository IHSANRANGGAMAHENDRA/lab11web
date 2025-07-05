<?= $this->extend('layout/simple'); ?>

<?= $this->section('content'); ?>
<!-- Google Fonts: Fira Code -->
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
<style>
    body, html {
        font-family: 'Fira Code', monospace !important;
        background: linear-gradient(120deg, #181c2f 0%, #232946 100%) !important;
        color: #e0e7ef;
    }
    .cyber-glow {
        text-shadow: 0 0 8px #00fff7, 0 0 16px #6c63ff, 0 0 2px #fff;
    }
    .cyber-card {
        background: linear-gradient(135deg, #232946 60%, #232946 80%, #181c2f 100%);
        border-radius: 22px;
        box-shadow: 0 0 32px #00fff744, 0 2px 12px #232946cc;
        border: 2.5px solid #232946;
        transition: box-shadow 0.25s, border 0.25s, transform 0.25s;
        position: relative;
        overflow: hidden;
    }
    .cyber-card-main {
        background: linear-gradient(120deg, #232946 60%, #181c2f 100%);
        border-radius: 36px;
        box-shadow: 0 0 48px #6c63ff55, 0 2px 24px #00fff722;
        border: 2.5px solid #232946;
        transition: box-shadow 0.3s, border 0.3s;
        position: relative;
        animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) 0.1s both;
    }
    .cyber-card:hover {
        box-shadow: 0 0 48px #00fff7cc, 0 4px 24px #6c63ffcc;
        border-color: #00fff7;
        transform: translateY(-8px) scale(1.025);
    }
    .cyber-btn {
        background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
        color: #181c2f;
        font-family: 'Fira Code', monospace;
        font-size: 20px;
        font-weight: bold;
        padding: 14px 44px;
        border-radius: 12px;
        text-decoration: none;
        box-shadow: 0 0 16px #00fff7cc;
        border: none;
        letter-spacing: 1px;
        transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
        outline: none;
        cursor: pointer;
    }
    .cyber-btn:hover {
        background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%);
        color: #fff;
        box-shadow: 0 0 32px #6c63ffcc, 0 0 8px #00fff7cc;
        transform: scale(1.05);
    }
    .cyber-input, .cyber-select {
        padding: 13px;
        border-radius: 8px;
        border: 1.5px solid #232946;
        background: linear-gradient(90deg, #232946 60%, #181c2f 100%);
        color: #e0e7ef;
        font-family: 'Fira Code', monospace;
        font-size: 16px;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
        box-shadow: 0 0 8px #6c63ff33;
    }
    .cyber-input:focus, .cyber-select:focus {
        border-color: #00fff7;
        box-shadow: 0 0 16px #00fff7cc;
    }
    .cyber-form {
        background: linear-gradient(120deg, #232946cc 60%, #181c2fcc 100%);
        border-radius: 14px;
        box-shadow: 0 0 16px #6c63ff44, 0 2px 12px #00fff711;
        border: 1.5px solid #232946;
    }
    .cyber-section {
        background: linear-gradient(120deg, #181c2f 0%, #232946 100%);
        border-radius: 32px;
        box-shadow: 0 0 64px #6c63ff22, 0 0 32px #00fff722;
        padding: 32px 0 24px 0;
        margin-bottom: 32px;
        position: relative;
        overflow: hidden;
    }
    @media (max-width: 900px) {
        .cyber-card {
            min-width: 90vw;
            max-width: 98vw;
        }
        .cyber-section {
            border-radius: 0;
            padding: 16px 0 12px 0;
        }
    }
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
<section class="cyber-section" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 60vh; background: none; position: relative; overflow: hidden;">
    <!-- Neon Glow Accent -->
    <div style="position: absolute; top: -80px; left: -80px; width: 260px; height: 260px; background: radial-gradient(circle, #00fff7 60%, #232946 100%); opacity: 0.18; filter: blur(32px); z-index: 0;"></div>
    <div style="position: absolute; bottom: -100px; right: -100px; width: 320px; height: 320px; background: radial-gradient(circle, #6c63ff 60%, #181c2f 100%); opacity: 0.13; filter: blur(48px); z-index: 0;"></div>
    <div style="width: 100%; max-width: 900px; text-align: center; margin-bottom: 36px; position: relative; z-index: 1;">
        <h1 class="cyber-glow" style="font-size: 56px; font-weight: bold; margin-bottom: 12px; letter-spacing: 2.5px;">arctech</h1>
        <div class="cyber-glow" style="font-size: 24px; margin-bottom: 38px; letter-spacing: 1.2px;">Media Artikel & Berita</div>
        <div style="display: flex; flex-direction: column; align-items: center; gap: 0;">
            <div class="cyber-card-main" style="padding: 44px 38px 32px 38px; margin-bottom: 0; max-width: 900px; width: 100%;">
                <div style="display: flex; flex-direction: column; align-items: center; gap: 12px;">
                    <h2 class="cyber-glow" style="font-size: 28px; font-weight: bold; margin: 0 0 8px 0; letter-spacing: 1.2px;">Selamat Datang di Arctech!</h2>
                    <p style="font-size: 18px; margin: 0 0 18px 0; max-width: 700px; text-align: justify; color: #e0e7ef;">Website ini hadir sebagai ruang baca yang menyuguhkan artikel-artikel pilihan dengan pendekatan informatif, reflektif, dan aktual. Kami percaya bahwa pengetahuan yang baik berasal dari bacaan yang berkualitas—itulah yang kami upayakan di setiap tulisan.</p>
                    <a href="<?= base_url('/artikel'); ?>" class="cyber-btn" style="animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) 0.2s both;">Jelajahi Artikel</a>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 100%; max-width: 900px; margin-bottom: 32px; position: relative; z-index: 1;">
        <form method="get" class="cyber-form" style="display: flex; gap: 14px; justify-content: center; align-items: center; margin-bottom: 26px; padding: 14px 12px; animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) 0.3s both;">
            <input type="text" name="q" value="<?= esc($q ?? ''); ?>" placeholder="Cari artikel..." class="cyber-input">
            <select name="kategori_id" class="cyber-select">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= esc($k['nama_kategori']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="cyber-btn" style="font-size: 16px; padding: 13px 26px; animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) 0.4s both;">Cari</button>
        </form>
    </div>
    <h2 class="cyber-glow" style="font-size: 36px; text-align: center; margin-bottom: 34px; font-weight: bold; letter-spacing: 1.2px; position: relative; z-index: 1; animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) 0.5s both;">Artikel Terbaru</h2>
    <div style="width: 100%; max-width: 1200px; position: relative; z-index: 1;">
    <?php if (!empty($artikel)): ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 32px; justify-content: center; align-items: stretch; margin: 0 auto;">
            <?php foreach ($artikel as $row): ?>
                <div class="cyber-card" style="display: flex; flex-direction: column; min-height: 360px; max-width: 400px; margin: 0 auto; padding: 0;">
                    <?php if (!empty($row['gambar'])): ?>
                        <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= esc($row['judul']); ?>" style="width: 100%; height: 190px; object-fit: cover; border-top-left-radius: 22px; border-top-right-radius: 22px; filter: brightness(0.97) saturate(1.1) drop-shadow(0 0 12px #00fff7cc);">
                    <?php endif; ?>
                    <div style="padding: 28px 24px 24px 24px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <h3 class="cyber-glow" style="font-size: 23px; margin-bottom: 16px; font-weight: bold; letter-spacing: 0.5px;">
                            <a href="<?= base_url('/artikel/' . ($row['slug'] ?: 'artikel-' . $row['id'])); ?>" style="text-decoration: none; color: #00fff7;"> <?= esc($row['judul']); ?> </a>
                        </h3>
                        <p style="color: #e0e7efcc; font-size: 15px; margin-bottom: 22px;">
                            <?= date('d M Y', strtotime($row['created_at'] ?? date('Y-m-d'))); ?>
                        </p>
                        <a href="<?= base_url('/artikel/' . ($row['slug'] ?: 'artikel-' . $row['id'])); ?>" class="cyber-btn" style="font-size: 17px; padding: 13px 28px;">Baca Selengkapnya</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align: center; color: #00fff7;">Tidak ada artikel yang cocok dengan pencarian Anda.</p>
    <?php endif; ?>
    </div>
</section>
<?= $this->endSection(); ?>
