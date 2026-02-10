<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



require_once __DIR__ . '/includes/config.php';


require_once __DIR__ . '/includes/db.php';

require_once __DIR__ . '/includes/auth.php';


require_login();


$pdo = db();


$st = $pdo->query("SELECT id, title, youtube_id, poster_url FROM trailers ORDER BY id DESC");


$trailers = $st->fetchAll();

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Browse - Vilflix</title>
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
    <div class="vx-title">Browse</div>

    <div class="vx-row-title">Trending Trailers</div>
    <div class="vx-row">
      <?php foreach ($trailers as $t): ?>
        <div class="vx-card" onclick="window.location='/vilflix/trailer.php?id=<?= (int)$t['id'] ?>'">
          <img class="vx-poster" src="<?= htmlspecialchars($t['poster_url'] ?? '') ?>" alt="">
          <div class="vx-card-body">
            <div class="vx-card-title"><?= htmlspecialchars($t['title'] ?? '') ?></div>
            <div class="vx-actions">
              <a class="vx-btn vx-btn-red" href="/vilflix/trailer.php?id=<?= (int)$t['id'] ?>">Watch</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

</body>
</html>
