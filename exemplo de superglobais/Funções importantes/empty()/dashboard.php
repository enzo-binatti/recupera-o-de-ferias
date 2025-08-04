<?php
session_start();

if (empty($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuarios_info = [
    'admin@email.com' => ['nome' => 'Administrador', 'nivel' => 'admin'],
    'user@email.com' => ['nome' => 'Usuário Comum', 'nivel' => 'user']
];

$usuario = $_SESSION['usuario'];
$info = $usuarios_info[$usuario];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $info['nome']; ?>!</h1>
    <p>Nível de acesso: <?php echo $info['nivel']; ?></p>
    
    <?php if (!empty($info['nivel']) && $info['nivel'] === 'admin'): ?>
        <p><a href="admin.php">Área Administrativa</a></p>
    <?php endif; ?>
    
    <p><a href="logout.php">Sair</a></p>
</body>
</html>