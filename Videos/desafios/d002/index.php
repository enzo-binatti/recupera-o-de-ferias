<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desafio php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Trabalhando com numeros aleatorios</h1>
        <?php 
        $min = 0;
        $max = 100;
        $num = mt_rand($min, $max);
        echo "<p>Gerando um numero aleatorio entre $min $max... <br>O valor gerado foi <strong>$num</strong</p>"
        ?>
        <button onclick="javascript:document.location.reload()">&#x1f504; De novo</button>
    </main>
</body>
</html>