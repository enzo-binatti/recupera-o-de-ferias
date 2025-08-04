<?php
$frutas = ["Maçã", "Banana", "Laranja", "Morango", "Uva"];

$procurar = "Banana";
if (in_array($procurar, $frutas)) {
    echo "<p>A fruta '$procurar' está na lista!</p>";
} else {
    echo "<p>A fruta '$procurar' NÃO está na lista.</p>";
}

$procurar = "banana";
if (in_array($procurar, $frutas)) {
    echo "<p>A fruta '$procurar' está na lista!</p>";
} else {
    echo "<p>A fruta '$procurar' NÃO está na lista (busca case-sensitive).</p>";
}

$numeros = [1, 2, 3, 4, 5];
$procurar = "2";

if (in_array($procurar, $numeros, true)) {
    echo "<p>O número '$procurar' está na lista (com tipo estrito).</p>";
} else {
    echo "<p>O número '$procurar' NÃO está na lista (com tipo estrito).</p>";
}

$opcoes_validas = ["admin", "editor", "assinante"];
$nivel_usuario = "editor";

if (in_array($nivel_usuario, $opcoes_validas)) {
    echo "<p>Nível de acesso '$nivel_usuario' é válido!</p>";
} else {
    echo "<p>Nível de acesso '$nivel_usuario' é INVÁLIDO!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exemplo in_array()</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        p { padding: 10px; border-radius: 5px; }
        .encontrado { background: #d4edda; color: #155724; }
        .nao-encontrado { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h1>Exemplos com in_array()</h1>
    
    <h2>Lista de Frutas:</h2>
    <ul>
        <?php foreach ($frutas as $fruta): ?>
            <li><?= $fruta ?></li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Testes Realizados:</h2>
    <?php
    // Mostrar resultados dos testes
    $testes = [
        ["item" => "Banana", "resultado" => true],
        ["item" => "banana", "resultado" => false],
        ["item" => "\"2\" em [1,2,3,4,5]", "resultado" => false],
        ["item" => "'editor' em níveis de acesso", "resultado" => true]
    ];
    
    foreach ($testes as $teste):
        $classe = $teste["resultado"] ? "encontrado" : "nao-encontrado";
    ?>
        <p class="<?= $classe ?>">
            Busca por <?= $teste["item"] ?>: 
            <?= $teste["resultado"] ? "ENCONTRADO" : "NÃO ENCONTRADO" ?>
        </p>
    <?php endforeach; ?>
    
    <h3>Dicas:</h3>
    <ul>
        <li>Por padrão, <code>in_array()</code> é case-sensitive</li>
        <li>Use o terceiro parâmetro <code>true</code> para verificação estrita de tipo</li>
        <li>Para arrays grandes, considere outras estruturas de dados para melhor performance</li>
    </ul>
</body>
</html>