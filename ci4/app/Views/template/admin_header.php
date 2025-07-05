<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Fira Code', monospace;
            background: linear-gradient(120deg, #181c2f 0%, #232946 100%);
            margin: 0;
            color: #e0e7ef;
        }
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .admin-header {
            background: linear-gradient(90deg, #232946cc 60%, #181c2fcc 100%);
            padding: 15px 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 24px #00fff744, 0 2px 8px #6c63ff55;
            border: 1.5px solid #232946;
        }
        .admin-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            color: #00fff7;
            text-shadow: 0 2px 12px #6c63ffcc;
            font-family: 'Fira Code', monospace;
        }
        .admin-nav a {
            color: #00fff7;
            text-decoration: none;
            margin-left: 25px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: 'Fira Code', monospace;
        }
        .admin-nav a:hover {
            background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
            color: #181c2f;
            box-shadow: 0 2px 8px #00fff7cc;
        }
        .admin-nav a.active {
            background: #6c63ff;
            color: #fff;
        }
        .card {
            background: linear-gradient(120deg, #232946cc 60%, #181c2fcc 100%);
            border-radius: 16px;
            box-shadow: 0 2px 8px #00fff744;
            overflow: hidden;
            border: 2px solid #232946;
        }
        .card-header {
            background: #232946;
            padding: 15px 20px;
            border-bottom: 1px solid #181c2f;
            font-weight: 600;
            color: #00fff7;
            font-family: 'Fira Code', monospace;
        }
        .card-body {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: linear-gradient(120deg, #232946 60%, #181c2f 100%);
            border-radius: 12px;
            box-shadow: 0 2px 8px #00fff744;
            color: #e0e7ef;
            font-family: 'Fira Code', monospace;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #232946;
        }
        th {
            background: #232946;
            color: #00fff7;
        }
        tr {
            background: #181c2f;
            transition: background 0.2s;
        }
        tr:hover {
            background: #232946;
        }
        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: #181c2f;
            border: none;
            cursor: pointer;
            font-family: 'Fira Code', monospace;
            font-weight: bold;
            background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%);
            box-shadow: 0 2px 8px #00fff7cc;
            transition: background 0.2s, box-shadow 0.2s, color 0.2s;
        }
        .btn:hover {
            background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%);
            color: #fff;
            box-shadow: 0 0 32px #6c63ffcc, 0 0 8px #00fff7cc;
        }
        .btn-primary { background: linear-gradient(90deg, #00fff7 60%, #6c63ff 100%); color: #181c2f; }
        .btn-danger { background: linear-gradient(90deg, #6c63ff 60%, #00fff7 100%); color: #fff; }
        .btn-success { background: linear-gradient(90deg, #10b981 60%, #00fff7 100%); color: #181c2f; }
        .btn-secondary { background: #232946; color: #e0e7ef; }
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #00fff7;
            font-family: 'Fira Code', monospace;
        }
        .form-control, .form-select {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #e0e7ef;
            background: #232946;
            border: 1px solid #232946;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            font-family: 'Fira Code', monospace;
        }
        .form-control:focus, .form-select:focus {
            border-color: #00fff7;
            outline: 0;
            box-shadow: 0 0 0 0.25rem #00fff788;
        }
        .d-grid {
            display: grid;
        }
        .gap-2 {
            gap: 0.5rem;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #00fff7;
            border-radius: 4px;
            background: #232946;
            color: #00fff7;
            font-family: 'Fira Code', monospace;
        }
        .alert-success {
            color: #10b981;
            background-color: #232946;
            border-color: #10b981;
        }
        .alert-danger {
            color: #ff4f4f;
            background-color: #232946;
            border-color: #ff4f4f;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1><?= esc($title); ?></h1>
            <nav class="admin-nav">
                <a href="<?= base_url('/'); ?>">Home</a>
                <a href="<?= base_url('/user/logout'); ?>">Logout</a>
            </nav>
        </div>
        <div class="card">
            <?= $this->renderSection('content') ?>
        </div>
