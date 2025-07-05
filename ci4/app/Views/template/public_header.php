<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'My Website'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Fira Code', 'Inter', monospace, sans-serif;
            background-color: #181c2f;
            margin: 0;
            color: #e0e7ef;
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 32px 24px 24px 24px;
            background: linear-gradient(120deg, #232946cc 60%, #181c2fcc 100%);
            border-radius: 22px;
            box-shadow: 0 8px 32px 0 #00fff744, 0 1.5px 8px 0 #6c63ff55;
            border: 1.5px solid #232946;
            backdrop-filter: blur(6px);
            transition: box-shadow 0.3s, border 0.3s, background 0.3s;
        }
        .container:hover {
            box-shadow: 0 16px 48px 0 #00fff7aa, 0 2px 12px 0 #6c63ff99;
            border: 1.5px solid #00fff7;
            background: linear-gradient(120deg, #232946ee 60%, #181c2fee 100%);
        }
        .main-header {
            background: linear-gradient(90deg, #232946cc 60%, #181c2fcc 100%);
            padding: 22px 38px;
            border-radius: 18px;
            margin-bottom: 34px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 32px 0 #00fff744, 0 1.5px 8px 0 #6c63ff55;
            border: 1.5px solid #232946;
            backdrop-filter: blur(8px);
            transition: box-shadow 0.3s, border 0.3s;
        }
        .main-header:hover {
            box-shadow: 0 12px 36px 0 #00fff7aa, 0 2px 12px 0 #6c63ff99;
            border: 1.5px solid #00fff7;
        }
        .main-header h1 {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
            color: #00fff7;
            font-family: 'Fira Code', monospace;
            letter-spacing: 3px;
            text-shadow: 0 2px 10px #6c63ffcc, 0 1px 0 #232946;
            padding-right: 18px;
            transition: color 0.2s, text-shadow 0.2s;
        }
        .main-nav {
            display: flex;
            gap: 8px;
            background: #232946;
            border-radius: 8px;
            padding: 6px 18px;
            box-shadow: 0 2px 8px #00fff711;
        }
        .main-nav a {
            color: #00fff7;
            text-decoration: none;
            font-family: 'Fira Code', monospace;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 1px;
            padding: 8px 18px;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            position: relative;
            background: transparent;
            margin-left: 0;
        }
        .main-nav a:hover, .main-nav a.active {
            background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
            color: #181c2f;
            box-shadow: 0 2px 8px #00fff7cc;
        }
        .main-nav a.active {
            background: #6c63ff;
            color: #fff;
        }
        .content {
            background-color: #232946;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px #00fff722;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
        }
        @media (max-width: 600px) {
            .main-header {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 10px;
            }
            .main-nav {
                width: 100%;
                justify-content: flex-start;
                flex-wrap: wrap;
                padding: 6px 4px;
            }
            .main-nav a {
                font-size: 16px;
                padding: 8px 10px;
                margin-bottom: 4px;
            }
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/css/artikel.css'); ?>">
</head>
<body>
    <div class="container">
        <header class="main-header">
            <h1>arctech</h1>
            <nav class="main-nav">
                <a href="<?= base_url('/'); ?>">Home</a>
                <a href="<?= base_url('/artikel'); ?>">Artikel</a>
                <a href="<?= base_url('/about'); ?>">About</a>
                <a href="<?= base_url('/contact'); ?>">Contact</a>
                <a href="<?= base_url('/user/login'); ?>">Login</a>
            </nav>
        </header>
        <main class="content">
