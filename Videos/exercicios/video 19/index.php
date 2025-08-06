<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tipos primitivos em PHP</title>
</head>
<body>  
    <h1>Teste de tipos primitivos</h1>
<?php 
    // 0x = hexadecimal 0b = binario 0 = 0octal
    // $num = 010;
    // echo "O valor da variavel é $num";

    // $v = "300";
    // var_dump($v);

    // $num = (integer) 3e2; // 3 x 10(2)
    // echo "O valor é num";
    // var_dump($num)

    // $num = (float) "950";
    // var_dump($num)

    // $casado = false;
    // var_dump($casado);
    // print "Ovalor pra casado é $casado";

    // $vet = [6, 2, 9, 3, 5];
    // var_dump ($vel);

    class pessoa {
        private string $nome;
    }

    $p = new pessoa;
    var_dump($p)
?>
</body>
</html>