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
        // cotação api banco central
        $inicio = date("m-d-Y", strtotime("-22 days"));
        $fim = date("m-d-Y");
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

        $dados = json_decode(file_get_contents($url), true);

        var_dump($dados);

        $cotacao = $dados["value"][0]["cotacaoCompra"];

        $real = $_REQUEST["din"] ?? 0;

        $dolar = $real / $cotacao;

        echo "<p>Seus R$" . number_format($real, 2, ',', '.') . " equivalem a US$" . number_format($dolar, 2, '.', ',') . "</p>";
    
    ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
</body>
</html>