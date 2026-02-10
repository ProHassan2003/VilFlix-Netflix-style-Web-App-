
<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';


$error = '';

if (isset($_SESSION['user'])) {
    redirect('/vilflix/index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $error = 'Please enter email and password.';
    } else {
        $pdo = db();
        $st = $pdo->prepare("SELECT id, name, email, password_hash FROM users WHERE email = ?");
        $st->execute([$email]);
        $user = $st->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $error = 'Invalid email or password.';
        } else {
            $_SESSION['user'] = [
    'id' => (int)$user['id'],
    'name' => $user['name'],
    'email' => $user['email'],
];

// 👇 ADD THIS
$return = $_GET['return'] ?? '/vilflix/index.php';
header("Location: " . $return);
exit;

        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Login - Vilflix</title>
</head>
<body>
  <h1>Login</h1>

  <?php if ($error !== ''): ?>
    <p style="color:red;"><?= e($error) ?></p>
  <?php endif; ?>

  <form method="post" action="?return=<?= urlencode($_GET['return'] ?? '/vilflix/index.php') ?>">

    <label>Email</label><br>
    <input name="email" type="email" required><br><br>

    <label>Password</label><br>
    <input name="password" type="password" required><br><br>

    <button type="submit">Login</button>
  </form>

  <p>No account? <a href="/vilflix/auth/register.php">Register</a></p>
</body>
</html>
