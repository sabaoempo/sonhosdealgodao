<?php
include('headAdmin.php'); 
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";
$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados) or die(mysqli_error());

if (isset($_POST['Submit'])){
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    $requisicao = encontraPeriodo($dataInicio, $dataFim);
    $total = calculaLucro($requisicao);
} else {
    echo "Erro!";
    die(mysqli_error($conexao));
}
$query = mysqli_query($conexao, $requisicao);
$precos = mysqli_fetch_array($conexao, $query);

function encontraPeriodo($dataInicio, $dataFim) {
    global $conexao;
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    $requisicao = "select * from vendasteste where date(dataVenda) between date('$dataInicio') and date('$dataFim')";
    return $requisicao;
}

function calculaLucro($requisicao) {
    global $conexao;
    $query = mysqli_query($conexao, $requisicao);
    $precos = mysqli_fetch_array($query);
    $total = 0;
    do {
        if ($precos['PrecoTotalCompra'] == NULL)
            $total += $precos['PrecoProduto'] * $precos['Quantidade'];
        else
            $total = $precos['PrecoTotalCompra']; 
    }while ($precos = mysqli_fetch_array($query));
    return $total;
    
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset = "utf-8"/>
         <link rel="stylesheet" type="text/css" href="produtoPreco.css"/>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <title>Calcular Lucro</title>
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
                          <table class="table" style="overflow-x:auto;width:100; height:0;">
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
