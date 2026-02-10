<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

require_login();

$userId = (int)($_SESSION['user']['id'] ?? 0);
$trailerId = (int)($_POST['trailer_id'] ?? 0);

if ($userId <= 0 || $trailerId <= 0) {
    header('Location: /vilflix/watchlist.php');
    exit;
}

$pdo = db();
$del = $pdo->prepare("DELETE FROM watchlist WHERE user_id = ? AND trailer_id = ?");
$del->execute([$userId, $trailerId]);

header('Location: /vilflix/watchlist.php');
exit;
