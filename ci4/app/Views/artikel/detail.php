<?= $this->include("template/public_header") ?>

<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
<style>
.cyber-glow { text-shadow: 0 0 8px #00fff7, 0 0 16px #6c63ff, 0 0 2px #fff; }
.cyber-card-detail {
    background: linear-gradient(135deg, #232946 60%, #232946 80%, #181c2f 100%);
    border-radius: 28px;
    box-shadow: 0 0 32px #00fff744, 0 2px 12px #232946cc;
    border: 2px solid #232946;
    position: relative;
    padding: 2.5rem 1.5rem;
    margin: 2.5rem auto;
    max-width: 900px;
}
.article-title { font-family: 'Fira Code', monospace; color: #00fff7; }
.article-meta, .breadcrumb, .image-caption, .meta-item, .section-title, .related-content h4, .related-link {
    font-family: 'Fira Code', monospace !important;
}
.breadcrumb a, .meta-item, .image-caption, .section-title, .related-content h4, .related-link {
    color: #6c63ff !important;
}
.breadcrumb .current { color: #e0e7efcc !important; }
.article-meta { color: #e0e7efcc; }
.article-header { border-bottom: 2px solid #232946; }
.article-image { box-shadow: 0 8px 32px #00fff744; }
.content-body {
    font-family: 'Fira Code', monospace;
    background: #232946cc;
    border-radius: 16px;
    box-shadow: 0 2px 12px #6c63ff33;
    color: #e0e7ef;
}
.article-actions {
    background: #232946cc;
    border-radius: 18px;
    box-shadow: 0 4px 18px #00fff711;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
    margin: 2rem 0;
    padding: 2rem;
}
.action-btn {
    background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
    border: none;
    color: #181c2f;
    font-family: 'Fira Code', monospace;
    font-weight: 600;
    font-size: 1.1rem;
    border-radius: 16px;
    box-shadow: 0 2px 8px #00fff7cc;
    padding: 1rem 2.2rem;
    margin: 0 0.5rem;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
}
.action-btn:hover {
    background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%);
    color: #fff;
    box-shadow: 0 0 32px #6c63ffcc, 0 0 8px #00fff7cc;
    transform: scale(1.05);
}
.social-share .share-label { color: #00fff7 !important; font-family: 'Fira Code', monospace; }
.nav-btn {
    background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
    color: #181c2f;
    border-radius: 8px;
    padding: 12px 24px;
    text-decoration: none;
    font-family: 'Fira Code', monospace;
    font-weight: bold;
    box-shadow: 0 2px 8px #00fff7cc;
    transition: background 0.2s, box-shadow 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
    border: none;
}
.nav-btn:hover {
    background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%);
    color: #fff;
    box-shadow: 0 0 32px #6c63ffcc, 0 0 8px #00fff7cc;
}
.nav-actions {
    display: flex;
    gap: 1rem;
}
@media (max-width: 700px) {
    .cyber-card-detail { padding: 1.2rem 0.5rem; }
    .nav-actions { flex-direction: column; gap: 0.5rem; }
}
.related-item {
    background: #232946;
    border-radius: 14px;
    box-shadow: 0 2px 8px #00fff733;
    padding: 1.2rem;
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}
.related-image { background: #181c2f !important; }
.related-content p { color: #e0e7efcc; }
</style>
<div class="cyber-card-detail">
    <!-- Article Header -->
    <div class="article-header" style="text-align: center; margin-bottom: 2.5rem; padding-bottom: 2rem;">
        <div class="breadcrumb" style="display: flex; align-items: center; gap: 0.5rem; justify-content: center; margin-bottom: 1.5rem; font-size: 1rem;">
            <a href="<?= base_url('/'); ?>"><i class="fas fa-home"></i> Beranda</a>
            <span class="separator">/</span>
            <a href="<?= base_url('/artikel'); ?>"><i class="fas fa-newspaper"></i> Artikel</a>
            <span class="separator">/</span>
            <span class="current"><?= esc($artikel["judul"] ?? $artikel["title"] ?? 'Untitled'); ?></span>
        </div>
        <h1 class="article-title cyber-glow" style="font-size: 44px; font-weight: bold; letter-spacing: 2px; margin-bottom: 12px;"> <?= esc($artikel["judul"] ?? $artikel["title"] ?? 'Untitled'); ?> </h1>
        <div class="article-meta" style="display: flex; justify-content: center; gap: 2.5rem; flex-wrap: wrap; margin-top: 1.5rem;">
            <div class="meta-item" style="display: flex; align-items: center; gap: 0.5rem; font-size: 1rem;">
                <i class="fas fa-calendar-alt"></i>
                <span><?= date('d F Y', strtotime($artikel['created_at'] ?? date('Y-m-d'))); ?></span>
            </div>
            <div class="meta-item" style="display: flex; align-items: center; gap: 0.5rem; font-size: 1rem;">
                <i class="fas fa-clock"></i>
                <span><?= ceil(str_word_count($artikel["isi"] ?? '') / 200); ?> menit baca</span>
            </div>
            <div class="meta-item" style="display: flex; align-items: center; gap: 0.5rem; font-size: 1rem;">
                <i class="fas fa-tag"></i>
                <span><?= esc($artikel['nama_kategori'] ?? 'Uncategorized'); ?></span>
            </div>
        </div>
    </div>
    <!-- Article Image -->
    <?php if (!empty($artikel['gambar'])): ?>
        <div class="article-image-container" style="margin: 2.5rem 0; text-align: center;">
            <img src="<?= base_url("/gambar/" . $artikel["gambar"]) ?>"
                 alt="<?= esc($artikel["judul"] ?? $artikel["title"]); ?>"
                 class="article-image" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 18px;">
            <div class="image-caption"> <?= esc($artikel["judul"] ?? $artikel["title"]); ?> </div>
        </div>
    <?php elseif (!empty($artikel['image'])): ?>
        <div class="article-image-container" style="margin: 2.5rem 0; text-align: center;">
            <img src="<?= base_url("/image/" . $artikel["image"]) ?>"
                 alt="<?= esc($artikel["slug"]); ?>"
                 class="article-image" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 18px;">
        </div>
    <?php endif; ?>
    <!-- Article Content -->
    <article class="article-content" style="margin-top: 2.5rem;">
        <div class="content-body">
            <?= $artikel["isi"] ?? $artikel["content"] ?? 'Konten tidak tersedia.'; ?>
        </div>
        <!-- Article Actions -->
        <div class="article-actions">
            <div class="action-buttons" style="display: flex; justify-content: center; gap: 2.2rem; margin-bottom: 0; flex-wrap: wrap;">
                <button class="action-btn like-btn" title="Like artikel ini">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>
                    <span>Like</span>
                </button>
                <button class="action-btn share-btn" title="Bagikan artikel">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8a3 3 0 00-6 0v1a3 3 0 006 0V8zm-6 4v1a3 3 0 006 0v-1m-6 4v1a3 3 0 006 0v-1"/></svg>
                    <span>Share</span>
                </button>
                <button class="action-btn bookmark-btn" title="Simpan artikel">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v14l7-7 7 7V5a2 2 0 00-2-2H7a2 2 0 00-2 2z"/></svg>
                    <span>Save</span>
                </button>
            </div>
            <div class="social-share" style="display: flex; align-items: center; justify-content: center; gap: 1.2rem; flex-wrap: wrap;">
                <span class="share-label">Bagikan:</span>
                <a href="#" onclick="shareToFacebook()" title="Bagikan ke Facebook" style="display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 50%; background: #1877f2; color: #fff; transition: box-shadow 0.2s;"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.595 0 0 .592 0 1.326v21.348C0 23.408.595 24 1.326 24H12.82v-9.294H9.692v-3.622h3.127V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.797.143v3.24l-1.918.001c-1.504 0-1.797.715-1.797 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.406 24 24 23.408 24 22.674V1.326C24 .592 23.406 0 22.675 0"/></svg></a>
                <a href="#" onclick="shareToTwitter()" title="Bagikan ke Twitter" style="display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 50%; background: #1da1f2; color: #fff; transition: box-shadow 0.2s;"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.724c-.951.564-2.005.974-3.127 1.195a4.916 4.916 0 00-8.38 4.482C7.691 8.095 4.066 6.13 1.64 3.161c-.542.929-.856 2.01-.857 3.17 0 2.188 1.115 4.117 2.823 5.247a4.904 4.904 0 01-2.229-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.936 4.936 0 01-2.224.084c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 010 21.543a13.94 13.94 0 007.548 2.212c9.058 0 14.009-7.513 14.009-14.009 0-.213-.005-.425-.014-.636A10.012 10.012 0 0024 4.557z"/></svg></a>
                <a href="#" onclick="shareToWhatsApp()" title="Bagikan ke WhatsApp" style="display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 50%; background: #25d366; color: #fff; transition: box-shadow 0.2s;"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.197.297-.767.966-.94 1.164-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.372-.01-.571-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.077 4.363.709.306 1.262.489 1.694.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.617h-.001a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.999-3.648-.235-.374A9.86 9.86 0 012.14 12.04C2.14 6.477 6.615 2 12.18 2c2.654 0 5.151 1.037 7.022 2.918A9.857 9.857 0 0122.36 12.04c0 5.564-4.475 10.04-9.939 10.04m8.413-18.453A11.815 11.815 0 0012.18 0C5.467 0 0 5.466 0 12.04c0 2.124.553 4.199 1.601 6.032L.057 23.925a1.001 1.001 0 00.256 1.016c.165.165.383.254.606.254.09 0 .179-.012.266-.038l5.687-1.523a11.897 11.897 0 005.308 1.271h.005c6.713 0 12.188-5.466 12.188-12.04 0-3.224-1.256-6.251-3.537-8.537z"/></svg></a>
                <a href="#" onclick="shareToTelegram()" title="Bagikan ke Telegram" style="display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: 50%; background: #0088cc; color: #fff; transition: box-shadow 0.2s;"><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M23.954 4.569c-.885-.389-1.792-.654-2.797-.775-2.885-.36-5.797-.36-8.682 0-1.005.121-1.912.386-2.797.775C2.163 5.449 0 8.13 0 12c0 3.87 2.163 6.551 6.678 7.431.885.389 1.792.654 2.797.775 2.885.36 5.797.36 8.682 0 1.005-.121 1.912-.386 2.797-.775C21.837 18.551 24 15.87 24 12c0-3.87-2.163-6.551-6.678-7.431zM9.75 17.25v-6.5l6.5 3.25-6.5 3.25z"/></svg></a>
            </div>
        </div>
        <!-- Navigation -->
        <div class="article-navigation" style="display: flex; justify-content: space-between; align-items: center; margin: 3rem 0; background: linear-gradient(120deg, #232946cc 60%, #181c2fcc 100%); border-radius: 16px; box-shadow: 0 2px 8px #00fff744; padding: 24px 18px;">
            <a href="<?= base_url('/artikel'); ?>" class="nav-btn back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Artikel</span>
            </a>
            <div class="nav-actions">
                <button class="nav-btn print-btn" onclick="window.print()">
                    <i class="fas fa-print"></i>
                    <span>Print</span>
                </button>
                <button class="nav-btn top-btn" onclick="scrollToTop()">
                    <i class="fas fa-arrow-up"></i>
                    <span>Ke Atas</span>
                </button>
            </div>
        </div>
    </article>
    <!-- Related Articles Section -->
    <div class="related-articles" style="margin-top: 3rem;">
        <h3 class="section-title cyber-glow" style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-newspaper"></i>
            Artikel Terkait
        </h3>
        <div class="related-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
            <?php if (!empty($terkait) && is_array($terkait)): ?>
                <?php foreach ($terkait as $rel): ?>
                    <div class="related-item">
                        <?php if (!empty($rel['gambar'])): ?>
                            <div class="related-image">
                                <img src="<?= base_url('/gambar/' . $rel['gambar']); ?>" alt="<?= esc($rel['judul'] ?? $rel['title']); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px 8px 0 0; filter: brightness(0.97) saturate(1.1);">
                            </div>
                        <?php else: ?>
                            <div class="related-image" style="display: flex; align-items: center; justify-content: center; color: #6c63ff; font-size: 1.3rem;">
                                <i class="fas fa-image"></i>
                            </div>
                        <?php endif; ?>
                        <div class="related-content">
                            <h4 class="cyber-glow" style="font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;"><a href="<?= base_url('/artikel/' . ($rel['slug'] ?? 'artikel-' . $rel['id'])); ?>" style="color: #00fff7; text-decoration: none;"> <?= esc($rel['judul'] ?? $rel['title']); ?> </a></h4>
                            <p><?= esc(substr(strip_tags($rel['isi'] ?? $rel['content'] ?? ''), 0, 60)); ?>...</p>
                            <a href="<?= base_url('/artikel/' . ($rel['slug'] ?? 'artikel-' . $rel['id'])); ?>" class="related-link">Baca Selengkapnya</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="related-item">
                    <div class="related-image" style="display: flex; align-items: center; justify-content: center; color: #6c63ff; font-size: 1.3rem;">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="related-content">
                        <h4 class="cyber-glow" style="font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">Belum ada artikel terkait</h4>
                        <p>-</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->include("template/public_footer") ?>
