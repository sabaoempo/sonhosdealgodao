<?php
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";
$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados) or die(mysqli_error());

if (isset($_POST['Submit'])){
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    encontraPeriodo($dataInicio, $dataFim);
} else {
    echo "DEU RUIM, MANO";
    die(mysqli_error($conexao));
}

function encontraPeriodo($dataInicio, $dataFim) {
    global $conexao;
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    $requisicao = "select * from calcula_lucro where date(data_venda) between date('$dataInicio') and date('$dataFim')";
    calculaLucro($requisicao);
}

function calculaLucro($requisicao) {
    global $conexao;
    $query = mysqli_query($conexao, $requisicao);
    $precos = mysqli_fetch_array($query);
    $total = 0;
    do {
        echo "<p>$total + $precos[preco]";
        $total += $precos['preco'];
        echo " = $total</p>";
    }while ($precos = mysqli_fetch_array($query));
}
?>
