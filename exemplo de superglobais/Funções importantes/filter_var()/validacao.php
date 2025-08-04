<?php
// Função para exibir erros de forma amigável
function mostrarErro($campo, $erros) {
    if (!empty($erros[$campo])) {
        return '<span style="color: red;">' . $erros[$campo] . '</span>';
    }
    return '';
}

// Array para armazenar erros
$erros = [];

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletando dados do formulário
    $dados = [
        'nome' => $_POST['nome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'site' => $_POST['site'] ?? '',
        'idade' => $_POST['idade'] ?? '',
        'ip' => $_POST['ip'] ?? '',
        'salario' => $_POST['salario'] ?? ''
    ];

    // VALIDAÇÕES COM filter_var()
    
    // 1. Nome (mínimo 3 caracteres, máximo 50)
    if (!filter_var($dados['nome'], FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[a-zA-ZÀ-ú\s]{3,50}$/']])) {
        $erros['nome'] = 'Nome deve conter entre 3 e 50 letras';
    }

    // 2. E-mail (formato válido)
    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido';
    }

    // 3. Site (URL válida)
    if (!empty($dados['site']) && !filter_var($dados['site'], FILTER_VALIDATE_URL)) {
        $erros['site'] = 'URL do site inválida';
    }

    // 4. Idade (número entre 18 e 120)
    if (!filter_var($dados['idade'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 18, 'max_range' => 120]])) {
        $erros['idade'] = 'Idade deve ser entre 18 e 120 anos';
    }

    // 5. IP (válido)
    if (!filter_var($dados['ip'], FILTER_VALIDATE_IP)) {
        $erros['ip'] = 'Endereço IP inválido';
    }

    // 6. Salário (float positivo)
    if (!filter_var($dados['salario'], FILTER_VALIDATE_FLOAT) || $dados['salario'] <= 0) {
        $erros['salario'] = 'Salário deve ser um número positivo';
    }

    // Se não houver erros, exibe sucesso
    if (empty($erros)) {
        echo '<div style="background: #dff0d8; padding: 15px; margin-bottom: 20px;">
                <h3 style="color: #3c763d; margin-top: 0;">Dados válidos!</h3>
                <pre>' . print_r($dados, true) . '</pre>
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validação com filter_var()</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
    </style>
</head>
<body>
    <h1>Validação de Dados com filter_var()</h1>
    
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" required>
            <?= mostrarErro('nome', $erros) ?>
        </div>
        
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <?= mostrarErro('email', $erros) ?>
        </div>
        
        <div class="form-group">
            <label for="site">Site pessoal (opcional):</label>
            <input type="text" id="site" name="site" value="<?= htmlspecialchars($_POST['site'] ?? '') ?>">
            <?= mostrarErro('site', $erros) ?>
        </div>
        
        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="<?= htmlspecialchars($_POST['idade'] ?? '') ?>" required>
            <?= mostrarErro('idade', $erros) ?>
        </div>
        
        <div class="form-group">
            <label for="ip">Endereço IP:</label>
            <input type="text" id="ip" name="ip" value="<?= htmlspecialchars($_POST['ip'] ?? '') ?>" required>
            <?= mostrarErro('ip', $erros) ?>
        </div>
        
        <div class="form-group">
            <label for="salario">Salário desejado:</label>
            <input type="text" id="salario" name="salario" value="<?= htmlspecialchars($_POST['salario'] ?? '') ?>" required>
            <?= mostrarErro('salario', $erros) ?>
        </div>
        
        <button type="submit">Validar Dados</button>
    </form>
    
    <h2>Tipos de validação utilizados:</h2>
    <ul>
        <li><strong>FILTER_VALIDATE_REGEXP:</strong> Nome (apenas letras e espaços, 3-50 caracteres)</li>
        <li><strong>FILTER_VALIDATE_EMAIL:</strong> E-mail válido</li>
        <li><strong>FILTER_VALIDATE_URL:</strong> Site (URL válida)</li>
        <li><strong>FILTER_VALIDATE_INT:</strong> Idade (entre 18 e 120)</li>
        <li><strong>FILTER_VALIDATE_IP:</strong> Endereço IP válido</li>
        <li><strong>FILTER_VALIDATE_FLOAT:</strong> Salário (número decimal positivo)</li>
    </ul>
</body>
</html>