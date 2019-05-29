<?php
include('headAdmin.php'); 
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";
$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados) or die(mysqli_error());

if (isset($_POST['Submit'])){
    $requisicao = selecionaPeriodo();
    $total = calculaTotal($requisicao);
}else {
    echo "ERRO! Valores não foram enviados ao banco de dados";
}
$query = mysqli_query($conexao, $requisicao);
$precos = mysqli_fetch_array($query);

function selecionaPeriodo() {
    global $conexao;
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    $dataBusca = $_POST['periodo'];
    echo "<h1 style='font-family: Arial,sans-serif;
    font-weight: bold;  font-size: 35px;padding: 20px;'>$dataBusca</h1>";
    if ($dataBusca == "Uma Semana")
        $intervalo = "INTERVAL 7 DAY";
    else if ($dataBusca == "Um Mês")
        $intervalo = "INTERVAL 1 MONTH";
    $requisicao = "SELECT * FROM vendasteste WHERE dataVenda BETWEEN (CURRENT_DATE() - $intervalo) AND (CURRENT_DATE())";
    return $requisicao;
}

function calculaTotal($requisicao) {
    global $conexao;
    $query = mysqli_query($conexao, $requisicao);
    $precos = mysqli_fetch_array($query);
    $total = 0;
    do {
        if ($precos['PrecoTotalCompra'] == NULL) {
            $total += $precos['PrecoProduto'] * $precos['Quantidade'];
            echo "Estou aqui!";
        }
        else
            $total += $precos['PrecoTotalCompra'];
    }while ($precos = mysqli_fetch_array($query));
    return $total;
}
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset = "utf-8"/>
         <link rel="stylesheet" type="text/css" href="produtoPreco.css" />
         <title>Imprimir Lucro</title>
    </head>
    <body>
         <center>
           <div class="content">      
            
              <div  class="table-css">
                          <table class="table" style="overflow-x:auto;">
                            <thead class="thead-dark">
                              <tr class="table-text">
             
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Produto</th></th>
                    <th>Tipo</th>
                    <th>Data de Venda</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
                 </thead>
                            <tbody>
                    <?php
                        do {     
                            echo "<tr><td>$precos[ID]</td>";
                                echo "<td>$precos[NomeCliente]</td>";
                                echo "<td>$precos[NomeProduto]</td>";
                                echo "<td>$precos[tipo]</td>";
                                echo "<td>$precos[dataVenda]</td>";
                                echo "<td>R$$precos[PrecoProduto]</td>";
                                echo "<td>$precos[Quantidade]</td>";
                                echo "</tr>";
                        }while($precos = mysqli_fetch_array($query));
                    ?>
            </tbody>
                          </table>
                        </div>
            <!--<table border = "1" width = "200" height = "50">-->
                 <div class="content">      
            
              <div  class="table-css">
                          <table class="table" style="overflow-x:auto;width:200; height:0;">
                            <thead class="thead-dark">
                              <tr class="table-text">
                
                    <th>Arrecadamento Total</th>
                     </tr>
                 </thead>
                            <tbody>
                    <?php
                        echo "<td>R$$total</td>";
                    ?>
                 </tbody>
                          </table>
                        </div>
        </center>
        
        <?php include('footer.php'); mysqli_close($conexao);?>
    </body>
</html>
