<?php

/**
 * Diagnostic Helper for cPanel Server
 * Access via: https://tpa.sitrobbani.sch.id/cpanel_check.php
 */

header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>cPanel PHP & Laravel Diagnostics - TPA Robbani</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #f8fafc; padding: 2rem; color: #1e293b; }
        .card { background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto 1.5rem; }
        h1 { margin-top: 0; color: #0f172a; font-size: 1.5rem; }
        .status { font-weight: bold; padding: 4px 8px; border-radius: 6px; display: inline-block; font-size: 0.85rem; }
        .pass { background: #dcfce7; color: #166534; }
        .fail { background: #ffe4e6; color: #9f1239; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { padding: 8px 12px; border-bottom: 1px solid #e2e8f0; text-align: left; font-size: 0.9rem; }
        pre { background: #1e293b; color: #f8fafc; padding: 1rem; border-radius: 8px; overflow-x: auto; font-size: 0.85rem; }
    </style>
</head>
<body>
<div class="card">
    <h1>🔍 Diagnostic Server cPanel TPA Robbani</h1>

    <h3>1. Keterangan Versi PHP</h3>
    <?php
    $phpVersion = PHP_VERSION;
    $versionOk = version_compare($phpVersion, '8.2.0', '>=');
    ?>
    <p>Versi PHP Aktif Web Server: <strong><?= $phpVersion ?></strong> 
       <span class="status <?= $versionOk ? 'pass' : 'fail' ?>"><?= $versionOk ? 'PASS (Kompatibel)' : 'FAIL (Dibutuhkan PHP 8.2 / 8.4)' ?></span>
    </p>

    <h3>2. Ekstensi PHP Wajib</h3>
    <table>
        <tr><th>Ekstensi</th><th>Status</th></tr>
        <?php
        $extensions = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json', 'bcmath', 'fileinfo', 'curl'];
        foreach ($extensions as $ext) {
            $loaded = extension_loaded($ext);
            echo "<tr><td>{$ext}</td><td><span class='status " . ($loaded ? 'pass' : 'fail') . "'>" . ($loaded ? 'AKTIF' : 'TIDAK AKTIF') . "</span></td></tr>";
        }
        ?>
    </table>

    <h3>3. Izin Akses Direktori (Permissions)</h3>
    <table>
        <tr><th>Direktori</th><th>Writable?</th><th>Status</th></tr>
        <?php
        $dirs = [
            '../storage' => __DIR__ . '/../storage',
            '../storage/logs' => __DIR__ . '/../storage/logs',
            '../storage/framework' => __DIR__ . '/../storage/framework',
            '../bootstrap/cache' => __DIR__ . '/../bootstrap/cache',
        ];
        foreach ($dirs as $label => $path) {
            $writable = is_dir($path) && is_writable($path);
            echo "<tr><td>{$label}</td><td>" . ($writable ? 'Ya' : 'Tidak') . "</td><td><span class='status " . ($writable ? 'pass' : 'fail') . "'>" . ($writable ? 'OK' : 'IZIN DIPERLUKAN (Chmod 755)') . "</span></td></tr>";
        }
        ?>
    </table>

    <h3>4. Cek File .env & Database Connection</h3>
    <?php
    $envPath = __DIR__ . '/../.env';
    $envExists = file_exists($envPath);
    echo "<p>File .env ditemukan? <strong>" . ($envExists ? 'YA' : 'TIDAK') . "</strong></p>";

    if ($envExists) {
        $envContent = file_get_contents($envPath);
        preg_match('/APP_KEY=(.*)/', $envContent, $keyMatches);
        $key = trim($keyMatches[1] ?? '');
        echo "<p>APP_KEY Terisi? <strong>" . (!empty($key) ? 'YA (' . substr($key, 0, 15) . '...)' : 'KOSONG! (Penyebab Utama Error 500)') . "</strong></p>";
    }
    ?>

    <h3>5. Log Error Terakhir (storage/logs/laravel.log)</h3>
    <?php
    $logPath = __DIR__ . '/../storage/logs/laravel.log';
    if (file_exists($logPath)) {
        $lines = array_slice(file($logPath), -25);
        echo "<pre>" . htmlspecialchars(implode("", $lines)) . "</pre>";
    } else {
        echo "<p>File log belum dibuat di <code>storage/logs/laravel.log</code></p>";
    }
    ?>

</div>
</body>
</html>
