<?php
require_once __DIR__ . '/config.php';     // ensures session_start()
require_once __DIR__ . '/functions.php';  // has redirect()

function require_login(): void
{
    if (!isset($_SESSION['user'])) {
        $return = $_SERVER['REQUEST_URI'] ?? '/vilflix/index.php';
        redirect('/vilflix/auth/login.php?return=' . urlencode($return));
    }
}
