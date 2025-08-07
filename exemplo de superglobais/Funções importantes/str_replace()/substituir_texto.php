<?php

$palavras_ofensivas = ["idiota", "burro", "estúpido", "incompetente"];
$substitutos = ["[EDITADO]", "[REMOVIDO]", "[INAPROPRIADO]", "[CENSURADO]"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comentario = $_POST['comentario'] ?? '';
    
    $comentario_filtrado = str_replace(
        $palavras_ofensivas,
        $substitutos,
        $comentario
    );
    
    $comentario_salvo = $comentario_filtrado;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Comentários com Filtro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        textarea { width: 100%; padding: 10px; margin-bottom: 10px; min-height: 100px; }
        button { padding: 10px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        .resultado { background: #f5f5f5; padding: 15px; margin-top: 20px; border-radius: 5px; }
        .palavras { margin-top: 20px; padding: 10px; background: #fff3cd; }
    </style>
</head>
<body>
    <h1>Sistema de Comentários</h1>
    
    <div class="palavras">
        <h3>Palavras filtradas:</h3>
        <p><?= implode(", ", $palavras_ofensivas) ?></p>
    </div>
    
    <form method="POST">
        <h3>Deixe seu comentário:</h3>
        <textarea name="comentario" required placeholder="Digite seu comentário..."></textarea>
        <button type="submit">Enviar Comentário</button>
    </form>
    
    <?php if (!empty($comentario_salvo)): ?>
        <div class="resultado">
            <h3>Seu Comentário (após filtro):</h3>
            <p><?= nl2br(htmlspecialchars($comentario_salvo)) ?></p>
            
            <h4>Detalhes:</h4>
            <p>Comentário original tinha <?= strlen($comentario) ?> caracteres</p>
            <p>Versão filtrada tem <?= strlen($comentario_filtrado) ?> caracteres</p>
        </div>
    <?php endif; ?>
</body>
</html>