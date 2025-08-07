<?php
// String com nomes separados por vírgula
$lista_nomes = "João,Maria,matheus,Enzo,Paulo";

// Usando explode() para separar os nomes
$nomes = explode(",", $lista_nomes);

// Exibindo os nomes separados
echo "<h2>Lista de Nomes:</h2>";
echo "<ul>";
foreach ($nomes as $nome) {
    echo "<li>$nome</li>";
}
echo "</ul>";

// Exemplo prático: Formulário para adicionar nomes
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['novo_nome'])) {
    $lista_nomes .= "," . $_POST['novo_nome'];
    $nomes = explode(",", $lista_nomes); // Atualiza a lista
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Separador de Nomes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px; margin-bottom: 5px; background: #f0f0f0; }
        form { margin-top: 20px; }
        input { padding: 8px; }
        button { padding: 8px 15px; background: #4CAF50; color: white; border: none; }
    </style>
</head>
<body>
    <h1>Separador de Nomes com explode()</h1>
    
    <p>String original: <strong><?= $lista_nomes ?></strong></p>
    
    <?php
    // Mostra a lista de nomes separados
    echo "<h2>Nomes Separados:</h2>";
    echo "<ul>";
    foreach ($nomes as $nome) {
        echo "<li>$nome</li>";
    }
    echo "</ul>";
    ?>
    
    <h3>Adicionar Novo Nome</h3>
    <form method="post">
        <input type="text" name="novo_nome" placeholder="Digite um nome" required>
        <button type="submit">Adicionar</button>
    </form>
</body>
</html>