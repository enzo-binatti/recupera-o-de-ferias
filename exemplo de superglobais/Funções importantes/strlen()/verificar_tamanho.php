<?php
// Verificando o tamanho de strings
$nome = "Enzo";
$senha = "123456";
$texto_longo = "Esta é uma string com vários caracteres para teste.";

// Armazenando os tamanhos
$tamanho_nome = strlen($nome);
$tamanho_senha = strlen($senha);
$tamanho_texto = strlen($texto_longo);

// Exemplo prático: validação de senha
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha_usuario = $_POST['senha'] ?? '';
    $tamanho_senha_usuario = strlen($senha_usuario);
    
    if ($tamanho_senha_usuario < 6) {
        $mensagem = "Senha muito curta (mínimo 6 caracteres)";
    } elseif ($tamanho_senha_usuario > 20) {
        $mensagem = "Senha muito longa (máximo 20 caracteres)";
    } else {
        $mensagem = "Senha aceita! Tamanho: $tamanho_senha_usuario caracteres";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exemplo strlen()</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .exemplo { 
            background: #f5f5f5;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .valido { color: green; }
        .invalido { color: red; }
        input { padding: 8px; margin: 5px 0; }
        button { padding: 8px 15px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <h1>Exemplos com strlen()</h1>
    
    <div class="exemplo">
        <h3>Tamanhos calculados:</h3>
        <p>"Enzo": <?= $tamanho_nome ?> caracteres</p>
        <p>"123456": <?= $tamanho_senha ?> caracteres</p>
        <p>Texto longo: <?= $tamanho_texto ?> caracteres</p>
    </div>
    
    <div class="exemplo">
        <h3>Validação de Senha:</h3>
        <form method="post">
            <label for="senha">Digite uma senha (6-20 caracteres):</label><br>
            <input type="password" id="senha" name="senha" required><br>
            <button type="submit">Verificar</button>
        </form>
        
        <?php if (!empty($mensagem)): ?>
            <p class="<?= strpos($mensagem, 'aceita') !== false ? 'valido' : 'invalido' ?>">
                <?= $mensagem ?>
            </p>
        <?php endif; ?>
    </div>
    
    <div class="exemplo">
        <h3>Observações:</h3>
        <ul>
            <li><code>strlen()</code> conta o número de bytes (não caracteres multibyte)</li>
            <li>Para UTF-8, use <code>mb_strlen()</code> para contar caracteres corretamente</li>
            <li>Útil para validação de tamanho de campos</li>
        </ul>
    </div>
</body>
</html>