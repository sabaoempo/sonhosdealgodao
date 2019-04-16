<?php
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
    echo "#########$dataBusca##############";
    if ($dataBusca == "Uma Semana")
        $intervalo = "INTERVAL 7 DAY";
    else if ($dataBusca == "Um Mês")
        $intervalo = "INTERVAL 1 MONTH";
    $requisicao = "SELECT * FROM calcula_lucro WHERE data_venda BETWEEN (CURRENT_DATE() - $intervalo) AND (CURRENT_DATE())";
    return $requisicao;
}

function calculaTotal($requisicao) {
    global $conexao;
    $query = mysqli_query($conexao, $requisicao);
    $precos = mysqli_fetch_array($query);
    $total = 0;
    do {
        echo "<p>$total + $precos[preco]";
        $total += $precos[preco];
        echo " = $total</p>";
    }while ($precos = mysqli_fetch_array($query));
    return $total;
}
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset = "utf-8"/>
    </head>
    <body>
         <center>
            <table border = "1" width = "700" height = "100">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sabor</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Preço</th>
                </tr>
                    <?php
                        do {     
                            echo "<tr><td>$precos[id]</td>";
                                echo "<td>$precos[nome]</td>";
                                echo "<td>$precos[sabor]</td>";
                                echo "<td>$precos[tipo]</td>";
                                echo "<td>$precos[data_venda]</td>";
                                echo "<td>$precos[preco]</td>";
                                echo "</tr>";
                        }while($precos = mysqli_fetch_array($query));
                    ?>
            </table>
            <table border = "1" width = "200" height = "50">
                <tr>
                    <th>Lucro Total</th>
                    <?php
                        echo "<td>$total</td>";
                    ?>
                </tr>
            </table>
        </center>
    </body>
</html>
