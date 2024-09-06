<?
try {
    $db = new PDO('mysql:host=db;dbname=loja_app;charset=utf8mb4', 'user', '62d23f18a9c263f5498d2ac2f41dc1b7');
} catch (PDOException $e) {
    echo $e->getMessage();
}