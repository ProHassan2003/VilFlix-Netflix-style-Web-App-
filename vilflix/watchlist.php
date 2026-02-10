<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';

require_login();

$userId = (int)($_SESSION['user']['id'] ?? 0);
if ($userId <= 0) {
    header('Location: /vilflix/auth/login.php');
    exit;
}

$pdo = db();

$st = $pdo->prepare("
  SELECT t.id, t.title, t.youtube_id, t.poster_url, w.created_at
  FROM watchlist w
  JOIN trailers t ON t.id = w.trailer_id
  WHERE w.user_id = ?
  ORDER BY w.created_at DESC
");
$st->execute([$userId]);
$items = $st->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>My List - Vilflix</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="vx-page">

  <div class="vx-nav">
    <a class="vx-brand" href="/vilflix/index.php">VILFLIX</a>

    <div class="vx-nav-links">
      <a class="vx-link" href="/vilflix/browse.php">Browse</a>
      <a class="vx-link" href="/vilflix/watchlist.php">My List</a>
      <a class="vx-link" href="/vilflix/auth/logout.php">Logout</a>
    </div>
  </div>

  <div class="vx-container">
    <div class="vx-title">My List</div>

    <?php if (count($items) === 0): ?>
      <div class="vx-empty">Your list is empty. Add trailers from Browse.</div>
    <?php else: ?>
      <div class="vx-row-title">Saved Trailers</div>

      <div class="vx-row">
        <?php foreach ($items as $t): ?>
          <div class="vx-card">
            <img class="vx-poster" src="<?= htmlspecialchars($t['poster_url'] ?? '') ?>" alt="">
            <div class="vx-card-body">
              <div class="vx-card-title"><?= htmlspecialchars($t['title'] ?? '') ?></div>

              <div class="vx-actions">
                <a class="vx-btn vx-btn-red" href="/vilflix/trailer.php?id=<?= (int)$t['id'] ?>">Watch</a>

                <form method="post" action="/vilflix/watchlist/remove.php" style="display:inline;">
                  <input type="hidden" name="trailer_id" value="<?= (int)$t['id'] ?>">
                  <button type="submit" class="vx-btn vx-btn-dark">Remove</button>
                </form>
              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
