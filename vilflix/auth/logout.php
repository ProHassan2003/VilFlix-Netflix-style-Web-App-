<?php
require_once __DIR__ . '/../includes/config.php';

// clear session array
$_SESSION = [];

// remove session cookie (important)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// destroy session
session_destroy();

// go back to homepage
header('Location: /vilflix/index.php');
exit;
