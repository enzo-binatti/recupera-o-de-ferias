<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    if (strpos($email, "@gmail.com") !== false) {
        $resultado = "✅ E-mail do Gmail válido";
    } else {
        $resultado = "⛔ Este não é um e-mail do Gmail";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validador de Gmail</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input { padding: 8px; width: 250px; }
        button { padding: 8px 15px; background: #4285F4; color: white; border: none; }
        .resultado { margin-top: 10px; padding: 10px; }
        .valido { background: #E6F4EA; color: #0D652D; }
        .invalido { background: #FCE8E6; color: #A50E0E; }
    </style>
</head>
<body>
    <h2>Verificador de Gmail</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Digite seu e-mail" required>
        <button type="submit">Verificar</button>
    </form>
    
    <?php if (!empty($resultado)): ?>
        <div class="resultado <?= strpos($resultado, '✅') !== false ? 'valido' : 'invalido' ?>">
            <?= $resultado ?>
        </div>
    <?php endif; ?>
</body>
</html>