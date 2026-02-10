<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';

require_login();

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: /vilflix/browse.php');
    exit;
}

$pdo = db();
$st = $pdo->prepare("SELECT id, title, youtube_id, poster_url FROM trailers WHERE id = ?");
$st->execute([$id]);
$t = $st->fetch();

if (!$t) {
    http_response_code(404);
    echo "Trailer not found";
    exit;
}

$userId = (int)$_SESSION['user']['id'];

$check = $pdo->prepare("SELECT 1 FROM watchlist WHERE user_id = ? AND trailer_id = ?");
$check->execute([$userId, (int)$t['id']]);
$inList = (bool)$check->fetch();


?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($t['title']) ?> - Vilflix</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body{background:#000;color:#fff;margin:0}
    .top{display:flex;justify-content:space-between;align-items:center;padding:14px}
    .top a{color:#fff;text-decoration:none}
    .container{padding:14px;max-width:1100px;margin:0 auto}
    .title{font-size:26px;margin:10px 0 14px}
    .frameWrap{border:1px solid #222;border-radius:12px;overflow:hidden;background:#000}
    iframe{width:100%;height:520px;display:block}
    @media (max-width: 700px){
      iframe{height:260px}
    }
  </style>
</head>
<body>

  <div class="top">
    <a href="/vilflix/browse.php">← Back to Browse</a>
    <a href="/vilflix/auth/logout.php">Logout</a>
  </div>

  <div class="container">
    <div class="title"><?= htmlspecialchars($t['title']) ?></div>

    <?php if (!$inList): ?>
  <form method="post" action="/vilflix/watchlist/add.php" style="margin-top:14px;">
    <input type="hidden" name="trailer_id" value="<?= (int)$t['id'] ?>">
    <button type="submit" class="btn btn-red">+ My List</button>
  </form>
<?php else: ?>
  <form method="post" action="/vilflix/watchlist/remove.php" style="margin-top:14px;">
    <input type="hidden" name="trailer_id" value="<?= (int)$t['id'] ?>">
    <button type="submit" class="btn" style="background:#333;">Remove from My List</button>
  </form>
<?php endif; ?>

<p style="opacity:.8;margin-top:10px;">
  <a href="/vilflix/watchlist.php" style="color:#fff;text-decoration:underline;">Go to My List</a>
</p>

      <iframe
        src="https://www.youtube.com/embed/<?= htmlspecialchars($t['youtube_id']) ?>"
        title="YouTube trailer"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    </div>
  </div>

</body>
</html>
