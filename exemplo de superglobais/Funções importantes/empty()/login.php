<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['email']) || empty($_POST['senha'])) {
        $erro = "Por favor, preencha todos os campos!";
    } else {

        $usuarios = [
            'admin@email.com' => '123456',
            'user@email.com' => '654321'
        ];

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (!empty($usuarios[$email]) && $usuarios[$email] === $senha) {

            $_SESSION['usuario'] = $email;
            header('Location: dashboard.php');
            exit();
        } else {
            $erro = "E-mail ou senha incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 0 auto; padding: 20px; }
        .erro { color: red; margin-bottom: 15px; }
        input { display: block; margin-bottom: 10px; padding: 8px; width: 100%; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Login</h1>
    
    <?php if (!empty($erro)): ?>
        <div class="erro"><?php echo $erro; ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <input type="email" name="email" placeholder="Seu e-mail">
        <input type="password" name="senha" placeholder="Sua senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>