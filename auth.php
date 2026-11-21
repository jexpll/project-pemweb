<?php require 'config.php';
$action = $_GET['action'] ?? '';
if ($action === 'logout') {
    session_destroy();
    go('index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'register') {
        $name = trim($_POST['name']);
        $email = strtolower(trim($_POST['email']));
        $pass = $_POST['password'];
        if (!$name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($pass) < 8) {
            $_SESSION['error'] = 'Data tidak valid. Password minimal 8 karakter.';
            go('register.php');
        }
        try {
            $s = $pdo->prepare('INSERT INTO users(name,email,password) VALUES(?,?,?)');
            $s->execute([$name, $email, password_hash($pass, PASSWORD_DEFAULT)]);
            $_SESSION['user'] = ['id' => $pdo->lastInsertId(), 'name' => $name, 'email' => $email, 'role' => 'user'];
            go('dashboard.php');
        } catch (PDOException $e) {
            $_SESSION['error'] = 'Email sudah digunakan.';
            go('register.php');
        }
    }
    if ($action === 'login') {
        $s = $pdo->prepare('SELECT * FROM users WHERE email=?');
        $s->execute([strtolower(trim($_POST['email']))]);
        $u = $s->fetch();
        if ($u && password_verify($_POST['password'], $u['password'])) {
            unset($u['password']);
            $_SESSION['user'] = $u;
            go($u['role'] === 'admin' ? '../web_admin/index.php' : 'dashboard.php');
        }
        $_SESSION['error'] = 'Email atau password salah.';
        go('login.php');
    }
}
?>