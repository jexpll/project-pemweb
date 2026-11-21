<?php require 'config.php';
require_login();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $s = $pdo->prepare('INSERT INTO applications(user_id,job_id,cover_letter) VALUES(?,?,?)');
    try {
        $s->execute([user()['id'], (int) $_POST['job_id'], trim($_POST['cover_letter'])]);
    } catch (PDOException $e) {
    }
    go('dashboard.php');
}
go('index.php'); ?>