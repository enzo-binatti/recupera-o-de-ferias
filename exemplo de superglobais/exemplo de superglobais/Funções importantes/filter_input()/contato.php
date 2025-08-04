<?php
// Processamento do formulário
$mensagem = '';
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtragem segura dos inputs
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $mensagem_texto = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    
    // Validações
    if (empty($nome)) {
        $erros[] = "Por favor, informe seu nome";
    }
    
    if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Por favor, informe um e-mail válido";
    }
    
    if (empty($mensagem_texto)) {
        $erros[] = "Por favor, escreva sua mensagem";
    }
    
    // Se não houver erros, processa os dados
    if (empty($erros)) {
        // Simulação de envio (num sistema real, enviaria email ou salvaria no banco)
        $mensagem = "Obrigado, $nome! Seu contato foi recebido com sucesso.";
        
        // Limpa os campos do formulário
        $nome = $email = $telefone = $mensagem_texto = '';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contato Seguro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .erro { color: red; margin-bottom: 15px; }
        .sucesso { color: green; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        textarea { height: 100px; }
        button { padding: 10px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Fale Conosco</h1>
    
    <?php if (!empty($erros)): ?>
        <div class="erro">
            <h3>Corrija os seguintes erros:</h3>
            <ul>
                <?php foreach ($erros as $erro): ?>
                    <li><?php echo $erro; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($mensagem)): ?>
        <div class="sucesso"><?php echo $mensagem; ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome ?? ''); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="telefone">Telefone (opcional):</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone ?? ''); ?>">
        </div>
        
        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required><?php echo htmlspecialchars($mensagem_texto ?? ''); ?></textarea>
        </div>
        
        <button type="submit">Enviar Mensagem</button>
    </form>
</body>
</html>