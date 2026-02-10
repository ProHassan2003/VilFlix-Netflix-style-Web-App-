<?php
require_once __DIR__ . '/includes/db.php';

try {
    db();
    echo "✅ DB connected successfully!";
} catch (Throwable $e) {
    echo "❌ DB connection failed: " . $e->getMessage();
}
