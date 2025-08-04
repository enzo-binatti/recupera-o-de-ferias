<?php
function criarResumo($texto, $tamanho = 100, $final = '...') {
    if (strlen($texto) > $tamanho) {
        $resumo = substr($texto, 0, $tamanho) . $final;
    } else {
        $resumo = $texto;
    }
    return $resumo;
}

$artigo = "O PHP é uma linguagem de script amplamente usada para desenvolvimento web. Pode ser embutida dentro do HTML e é especialmente adequada para criação de conteúdo dinâmico.";

$resumo_curto = criarResumo($artigo, 30);
$resumo_medio = criarResumo($artigo, 60);
$resumo_longo = criarResumo($artigo, 100);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto_usuario = $_POST['texto_usuario'] ?? '';
    $tamanho_usuario = (int)$_POST['tamanho'] ?? 50;
    $resumo_usuario = criarResumo($texto_usuario, $tamanho_usuario);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerador de Resumos</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .exemplo { background: #f5f5f5; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .original { color: #555; }
        .resumo { color: #0066cc; font-weight: bold; }
        textarea { width: 100%; padding: 10px; margin-bottom: 10px; min-height: 100px; }
        input[type="number"] { padding: 8px; width: 80px; }
        button { padding: 10px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Exemplos com substr()</h1>
    
    <div class="exemplo">
        <h3>Texto Original Completo:</h3>
        <p class="original"><?= $artigo ?></p>
        <p>Tamanho total: <?= strlen($artigo) ?> caracteres</p>
        
        <h3>Resumos Gerados:</h3>
        <table>
            <tr>
                <th>Tamanho</th>
                <th>Resumo</th>
                <th>Caracteres</th>
            </tr>
            <tr>
                <td>30</td>
                <td class="resumo"><?= $resumo_curto ?></td>
                <td><?= strlen($resumo_curto) ?></td>
            </tr>
            <tr>
                <td>60</td>
                <td class="resumo"><?= $resumo_medio ?></td>
                <td><?= strlen($resumo_medio) ?></td>
            </tr>
            <tr>
                <td>100</td>
                <td class="resumo"><?= $resumo_longo ?></td>
                <td><?= strlen($resumo_longo) ?></td>
            </tr>
        </table>
    </div>
    
    <div class="exemplo">
        <h2>Crie seu próprio resumo</h2>
        <form method="POST">
            <label for="texto_usuario">Digite seu texto:</label><br>
            <textarea id="texto_usuario" name="texto_usuario" required></textarea><br>
            
            <label for="tamanho">Tamanho do resumo:</label>
            <input type="number" id="tamanho" name="tamanho" value="50" min="10" max="500"><br>
            
            <button type="submit">Gerar Resumo</button>
        </form>
        
        <?php if (!empty($resumo_usuario)): ?>
            <h3>Resultado:</h3>
            <p class="original">Original (<?= strlen($texto_usuario) ?> caracteres):</p>
            <p><?= nl2br(htmlspecialchars($texto_usuario)) ?></p>
            
            <p class="resumo">Resumo (<?= strlen($resumo_usuario) ?> caracteres):</p>
            <p><?= htmlspecialchars($resumo_usuario) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>