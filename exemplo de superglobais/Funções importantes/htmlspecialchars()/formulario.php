<?php
// Processar formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $comentario = $_POST['comentario'] ?? '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário Simples</title>
</head>
<body>
    <h1>Deixe seu comentário</h1>
    
    <form method="POST">
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($nome ?? ''); ?>">
        </p>
        
        <p>
            <label>Comentário:</label><br>
            <textarea name="comentario"><?php echo htmlspecialchars($comentario ?? ''); ?></textarea>
        </p>
        
        <button type="submit">Enviar</button>
    </form>
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Seu comentário:</h2>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
        <p><strong>Comentário:</strong> <?php echo htmlspecialchars($comentario); ?></p>
    <?php endif; ?>
    
    <h3>Tente inserir:</h3>
    <code>&lt;script&gt;alert('hack');&lt;/script&gt;</code>
</body>
</html>