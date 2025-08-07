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
        <h1>resultado final</h1>
        <p>
            <?php 
                $n = $_REQUEST["num"];
                $a = $n - 1;
                $s = $n + 1;
                echo "O numer escolhido foi <strong>$n</strong>";
                echo "<br> o seu antecessorde é $a";
                echo "<br> o seu sucessor é $s" 
            ?>
        </p>
        <button onclick="javascript:window.location.href='index.html'">&#x2B05; Voltar</button>
    </main>
</body>
</html>