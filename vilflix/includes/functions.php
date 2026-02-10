<?php

function redirect(string $path): void
{
    header("Location: $path");
    exit;
}

function e(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
