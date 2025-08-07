<?php

$frutas = ["Maçã", "Banana", "Laranja", "Morango", "Uva"];

$usuario = [
    "nome" => "Enzo",
    "email" => "enzo@exemplo.com",
    "idade" => 16,
    "ativo" => true
];

$produtos = [
    ["id" => 1, "nome" => "Notebook", "preco" => 2500.00],
    ["id" => 2, "nome" => "Smartphone", "preco" => 1800.00],
    ["id" => 3, "nome" => "Tablet", "preco" => 1200.00]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exemplo foreach</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #2c3e50; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px; margin-bottom: 5px; background: #f5f5f5; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #3498db; color: white; }
    </style>
</head>
<body>
    <h1>Exemplos com foreach</h1>

    <h2>1. Lista de Frutas (array simples)</h2>
    <ul>
        <?php foreach ($frutas as $fruta): ?>
            <li><?= $fruta ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>2. Dados do Usuário (array associativo)</h2>
    <ul>
        <?php foreach ($usuario as $chave => $valor): ?>
            <li>
                <strong><?= ucfirst($chave) ?>:</strong> 
                <?= is_bool($valor) ? ($valor ? 'Sim' : 'Não') : $valor ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>3. Lista de Produtos (array multidimensional)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= $produto['nome'] ?></td>
                    <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>