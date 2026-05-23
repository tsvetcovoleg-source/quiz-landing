<?php
require_once __DIR__ . '/config.php';

$connectionStatus = 'not checked';
$errorMessage = '';

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    $connectionStatus = 'connected';
} catch (Throwable $e) {
    $connectionStatus = 'failed';
    $errorMessage = $e->getMessage();
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Landing Deploy Test</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; line-height: 1.5; }
        .ok { color: #15803d; font-weight: 700; }
        .fail { color: #b91c1c; font-weight: 700; }
        code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Quiz Landing deploy works</h1>
    <p>Project: <strong>quiz-landing</strong></p>
    <p>Path target: <code>gonta.mindgames.md</code></p>
    <p>Database status:
        <?php if ($connectionStatus === 'connected'): ?>
            <span class="ok">connected</span>
        <?php else: ?>
            <span class="fail">failed</span>
        <?php endif; ?>
    </p>
    <?php if ($errorMessage): ?>
        <p><strong>DB error:</strong> <?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
</body>
</html>
