<?php
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";

$conexao = mysqli_connect($servidor, $usuario, $senha) or die(mysqli_error());
mysqli_select_db($conexao, $bancoDados);
$requisicao = "SELECT * FROM manupulateste";
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$query = mysqli_query($conexao, $requisicao);
$dadosTabela = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset = "utf-8"/>
    </head>
    <body>
         <center>
            <table border = "1" width = "700" height = "150">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Sabor</th>
                    <th>Tipo</th>
                </tr>
                    <?php
                        do {     
                            echo "<tr><td>$dadosTabela[id]</td>";
                                echo "<td>$dadosTabela[nome]</td>";
                                echo "<td>$dadosTabela[quantidade]</td>";
                                echo "<td>$dadosTabela[sabor]</td>";
                                echo "<td>$dadosTabela[tipo]</td>";
                            echo "</tr>";
                        }while($dadosTabela = mysqli_fetch_array($query));
                    ?>
            </table>
        </center>
        <center>
            <form name = "alterar" method = "POST" id = "update" action = "ManipulaVendas.php">
                <fieldset id = "campo"> <legend>Preenchimento de campos a serem alterados:</legend>
                    <p>ID: <input type = "number" name = "id" min = "0" max = "10" placeholder = "id"></p>
                    <p>Nome: <input type = "text" name = "nome" size = "50" maxlength = "100" placeholder = "Nome do Cliente"></p>
                    <p>Quantidade: <input type = "number" name = "quantidade" min = "0" max = "10" placeholder = " Quantidade"></p>
                    <p>Sabor:<input type = "text" name = "sabor" size = "20" maxlength = "20" placeholder = "Sabor do produto"></p>
                    <p><label for = "type">Tipo:</label></p>
                    <select name = "tipo" id = "type">
                        <option value = "Bombom">Bombom</option>
                        <option value = "Ovo de Páscoa"> Ovo de Páscoa</option>
                    </select>
                    <input class = "button" type = "submit" name = "Submit" value = "enviar">
                </fieldset>
            </form>  
        </center>
    </body>
</html>

<?php
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";
$conexao = mysqli_connect ($servidor, $usuario, $senha, $bancoDados) or die(mysqli_error());

if (isset($_POST['Submit'])){
    manipulaProdutos();
}

function manipulaProdutos() {
    global $conexao;
    if (mysqli_connect_errno($conexao))
        echo "Problemas para conectar ao banco de dados. Tente novamente";
    else
        echo "Conexão realizada com sucesso!";
    $id = $_POST['id'];
    $nomeCliente = $_POST['nome'];
    $sabor = $_POST['sabor'];
    $quantidade = $_POST['quantidade'];
    $tipo = $_POST['tipo'];
    $query = "UPDATE manupulateste SET nome ='$nomeCliente', quantidade = '$quantidade', sabor = '$sabor', tipo = '$tipo' WHERE id ='$id'";
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    mysqli_query($conexao, $query);
    //mysqli_close( $conexao);
}
?>
