<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=opera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
    <h1>Conversor de Moedas</h1>
    <?php 
        // Cotação API Banco Central
        $inicio = date("m-d-Y", strtotime("-7 days")); // Reduzi para 7 dias para garantir resposta
        $fim = date("m-d-Y");
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

        $dados = json_decode(file_get_contents($url), true);
        
        // Verifica se os dados foram obtidos corretamente
        if(isset($dados['value'][0]['cotacaoCompra'])) {
            $cotacao = $dados['value'][0]['cotacaoCompra'];
            $dataCotacao = $dados['value'][0]['dataHoraCotacao'];
            
            $real = $_GET["din"] ?? 0;
            
            if(is_numeric($real) && $real > 0) {
                $dolar = $real / $cotacao;
                
                echo "<p>Cotação do dólar: R$ " . number_format($cotacao, 4, ',', '.') . " (em $dataCotacao)</p>";
                echo "<p>Seus R$ " . number_format($real, 2, ',', '.') . " equivalem a <strong>US$ " . number_format($dolar, 2, ',', '.') . "</strong></p>";
            } else {
                echo "<p>Por favor, insira um valor válido para conversão.</p>";
            }
        } else {
            echo "<p>Não foi possível obter a cotação do dólar no momento. Tente novamente mais tarde.</p>";
            echo "<pre>";
            print_r($dados); // Mostra os dados recebidos para debug
            echo "</pre>";
        }
    ?>
    <form method="get" action="">
        <label for="din">Valor em Reais (R$):</label>
        <input type="number" step="0.01" name="din" id="din" value="<?= isset($_GET['din']) ? htmlspecialchars($_GET['din']) : '' ?>">
        <button type="submit">Converter</button>
    </form>
    </main>
</body>
</html>