<?php

$frutas = array("Maçã", "Banana", "Laranja"); 
$cores = ["Vermelho", "Verde", "Azul"]; 
$aluno = [
    "nome" => "Enzo",
    "idade" => 16,
    "curso" => "Técnico"
]; 

echo "<h2>Arrays Básicos</h2>";
echo "Segunda fruta: " . $frutas[1] . "<br>"; 
echo "Cor favorita: " . $cores[0] . "<br><br>";

echo "<h2>Array Associativo</h2>";
echo "Aluno: " . $aluno["nome"] . "<br>";
echo "Idade: " . $aluno["idade"] . " anos<br>";
echo "Curso: " . $aluno["curso"] . "<br><br>";

$frutas[] = "Morango"; 
$cores[3] = "Amarelo"; 
$aluno["semestre"] = 3; 

echo "<h2>Lista de Frutas</h2>";
foreach ($frutas as $fruta) {
    echo "- " . $fruta . "<br>";
}

echo "<h2>Dados do Aluno</h2>";
foreach ($aluno as $chave => $valor) {
    echo ucfirst($chave) . ": " . $valor . "<br>";
}

$turma = [
    ["nome" => "João", "nota" => 8.5],
    ["nome" => "Mateus", "nota" => 7.2],
    ["nome" => "Enzo", "nota" => 9.1]
];

echo "<h2>Notas da Turma</h2>";
foreach ($turma as $aluno) {
    echo $aluno["nome"] . ": " . $aluno["nota"] . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de Arrays</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #2c3e50; border-bottom: 1px solid #ddd; padding-bottom: 5px; }
    </style>
</head>
<body>
    <h1>Trabalhando com Arrays em PHP</h1>
    <?php

echo "<h2>Estrutura dos Arrays</h2>";
    echo "<pre>Frutas: ";
    print_r($frutas);
    echo "Cores: ";
    print_r($cores);
    echo "Aluno: ";
    print_r($aluno);
    echo "Turma: ";
    print_r($turma);
    echo "</pre>";
    ?>
</body>
</html>