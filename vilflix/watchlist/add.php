<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

require_login();

$userId = (int)$_SESSION['user']['id'];
$trailerId = (int)($_POST['trailer_id'] ?? 0);

if ($trailerId <= 0) {
    header('Location: /vilflix/browse.php');
    exit;
}

$pdo = db();

/* ✅ check using existing columns */
$check = $pdo->prepare(
    "SELECT 1 FROM watchlist WHERE user_id = ? AND trailer_id = ?"
);
$check->execute([$userId, $trailerId]);

if (!$check->fetch()) {
    $insert = $pdo->prepare(
        "INSERT INTO watchlist (user_id, trailer_id) VALUES (?, ?)"
    );
    $insert->execute([$userId, $trailerId]);
}

header('Location: /vilflix/watchlist.php');
exit;
