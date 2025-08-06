<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=opera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desafio php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
    <h1>conversor de moedas</h1>
    <?php 
    $cotacao = 5.17;

    $real = $_REQUEST["din"] ?? 0;

    $dolar = $real / $cotacao;

    echo "<p>Seus R$" . number_format($real, 2, ',', '.') . " equivalem a US$" . number_format($dolar, 2, '.', ',') . "</p>";
    
    ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
</body>
</html>