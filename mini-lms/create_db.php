<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS minilms_db");
    echo "Database minilms_db created successfully or already exists.";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
    exit(1);
}
