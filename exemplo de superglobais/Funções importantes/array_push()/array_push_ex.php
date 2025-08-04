<?php

$lista_compras = [];

array_push($lista_compras, "Maçã");
array_push($lista_compras, "Banana", "Leite", "Pão");

echo "<h2>Lista de Compras</h2>";
echo "<pre>";
print_r($lista_compras);
echo "</pre>";

$lista_compras[] = "Ovos";
$lista_compras[] = "Queijo";

array_push($lista_compras, "Arroz", "Feijão", "Carne");

echo "<h2>Lista de Compras Atualizada</h2>";
echo "<pre>";
print_r($lista_compras);
echo "</pre>";

$pessoa = ["nome" => "Enzo", "idade" => 16];
array_push($pessoa, "Alto Piquiri"); 

echo "<h2>Array Associativo com push</h2>";
echo "<pre>";
print_r($pessoa);
echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exemplo array_push()</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #2c3e50; }
        pre {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #3498db;
        }
    </style>
</head>
<body>
    <h1>Exemplos com array_push()</h1>
    
    <h3>Diferença entre array_push() e sintaxe []</h3>
    <p><strong>array_push()</strong> permite adicionar vários elementos de uma vez.</p>
    <p><strong>$array[] =</strong> é mais rápido para adicionar um único elemento.</p>
    
    <h3>Quando usar array_push()</h3>
    <ul>
        <li>Quando precisa adicionar múltiplos elementos ao mesmo tempo</li>
        <li>Quando está trabalhando com arrays numéricos</li>
    </ul>
    
    <h3>Quando NÃO usar</h3>
    <ul>
        <li>Com arrays associativos (usa índices numéricos)</li>
        <li>Para adicionar um único elemento (use $array[] = mais simples)</li>
    </ul>
</body>
</html>