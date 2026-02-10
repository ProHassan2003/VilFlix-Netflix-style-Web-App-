<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string)($_POST['name'] ?? ''));
    $email = trim((string)($_POST['email'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($name === '' || $email === '' || $password === '') {
        $error = 'Please fill all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        $pdo = db();

        // check email exists
        $st = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $st->execute([$email]);
        if ($st->fetch()) {
            $error = 'Email already registered.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $st = $pdo->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
            $st->execute([$name, $email, $hash]);

            redirect('/vilflix/index.php?modal=login');

        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Register - Vilflix</title>
</head>
<body>
  <h1>Create account</h1>

  <?php if ($error !== ''): ?>
    <p style="color:red;"><?= e($error) ?></p>
  <?php endif; ?>

  <form method="post">
    <label>Name</label><br>
    <input name="name" required><br><br>

    <label>Email</label><br>
    <input name="email" type="email" required><br><br>

    <label>Password</label><br>
    <input name="password" type="password" required><br><br>

    <button type="submit">Register</button>
  </form>

  <p>Already have an account? <a href="/vilflix/auth/login.php">Login</a></p>
</body>
</html>
