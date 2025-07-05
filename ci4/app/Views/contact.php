<?= $this->extend('layout/simple'); ?>

<?= $this->section('content'); ?>
<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
<style>
.cyber-glow { text-shadow: 0 0 8px #00fff7, 0 0 16px #6c63ff, 0 0 2px #fff; }
.cyber-contact-container {
    max-width: 700px;
    margin: 40px auto 0 auto;
    background: linear-gradient(120deg, #232946cc 60%, #181c2fcc 100%);
    border-radius: 24px;
    box-shadow: 0 8px 32px #00fff744, 0 2px 12px #6c63ff55;
    padding: 48px 36px 36px 36px;
    border: 2px solid #232946;
    text-align: center;
}
.cyber-contact-title {
    font-size: 36px;
    font-family: 'Fira Code', monospace;
    font-weight: bold;
    color: #00fff7;
    letter-spacing: 2px;
    margin-bottom: 18px;
}
.cyber-contact-divider {
    height: 3px;
    width: 60px;
    background: #6c63ff;
    border-radius: 2px;
    margin: 0 auto 24px auto;
}
.cyber-contact-content {
    font-size: 18px;
    color: #e0e7ef;
    font-family: 'Fira Code', monospace;
    text-align: justify;
    line-height: 1.7;
    margin-bottom: 0;
}
</style>
    <div class="cyber-contact-container">
        <h1 class="cyber-contact-title cyber-glow"><?= esc($title); ?></h1>
        <div class="cyber-contact-divider"></div>
        <p class="cyber-contact-content"><?= esc($content); ?></p>
    </div>
<?= $this->endSection(); ?>
