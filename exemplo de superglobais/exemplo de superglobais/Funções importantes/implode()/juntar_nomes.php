<?php

$nomes = ["João", "Maria", "Carlos", "Enzo"];

$lista_nomes = implode(", ", $nomes);

echo "<h2>Lista de Nomes:</h2>";
echo "<p>$lista_nomes</p>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo_nome = $_POST['novo_nome'] ?? '';
    if (!empty($novo_nome)) {
        $nomes[] = $novo_nome;
        $lista_nomes = implode(" - ", $nomes); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Juntar Nomes com implode()</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .lista { 
            background: #f0f8ff;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        form { margin-top: 20px; }
        input { padding: 8px; width: 200px; }
        button { 
            padding: 8px 15px;
            background: #4682b4;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Exemplo com implode()</h1>
    
    <div class="lista">
        <h3>Nomes Separados por Vírgula:</h3>
        <p><?= implode(", ", $nomes) ?></p>
        
        <h3>Nomes Separados por Traço:</h3>
        <p><?= implode(" - ", $nomes) ?></p>
        
        <h3>Nomes em Lista HTML:</h3>
        <ul><li><?= implode("</li><li>", $nomes) ?></li></ul>
    </div>
    
    <h3>Adicionar Novo Nome</h3>
    <form method="post">
        <input type="text" name="novo_nome" placeholder="Digite um nome" required>
        <button type="submit">Adicionar e Juntar</button>
    </form>
</body>
</html>