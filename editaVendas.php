<?php
$id = $_GET[id];
if ($id == NULL) {
  echo "<script>alert('ERRO! Produto não encontrado. Retornando à página anterior...')</script>";
  Print '<script>window.location = "ManipulaVendas.php";</script>';  
}
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = '$0nh0_d3_algod4o';
$conexao = mysqli_connect ($servidor, $usuario, $senha, $bancoDados) or die(mysqli_error());

if (isset($_POST['SubmitAlterar'])){
    alteraProdutos();}
    
function alteraProdutos() {
    global $conexao, $id;
    // if (mysqli_connect_errno($conexao))
    //     echo "<script>alert ('Problemas para conectar ao banco de dados. Tente novamente!')</script>";
    // else
    //     echo "<script>alert('Conexão realizada com sucesso!')</script>";
    $NomeCliente = $_POST['NomeCliente'];
    $EmailCliente = $_POST['EmailCliente'];
    $TelefoneCliente = $_POST['TelefoneCliente'];
    $FormaDePagamento = $_POST['Pagamento'];
    $NomeProduto = $_POST['NomeProduto'];
    $Tamanho = $_POST['tamanho'];
    $Tipo = $_POST['tipo'];
    $DescricaoProduto = $_POST['DescricaoProduto'];
    $Quantidade = $_POST['Quantidade'];
    $PrecoProduto = $_POST['PrecoProduto'];
    $PrecoTotalCompra = $_POST['PrecoTotalCompra'];
    $foiVendido = $_POST['foiVendido'];
    $vendedor = $_POST['vendedor'];
    $dataVenda = $_POST['dataVenda'];
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    
        if ($NomeCliente != NULL) {
            $requisicao = "UPDATE vendasteste SET NomeCliente = '$NomeCliente' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($EmailCliente != NULL) {
            $requisicao = "UPDATE vendasteste SET EmailCliente = '$EmailCliente' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($TelefoneCliente != NULL) {
            $requisicao = "UPDATE vendasteste SET TelefoneCliente = '$TelefoneCliente' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        
        if ($FormaDePagamento != NULL && $FormaDePagamento != "Xerecard") {
            $requisicao = "UPDATE vendasteste SET Pagamento = '$FormaDePagamento' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($NomeProduto != NULL) {
            $requisicao = "UPDATE vendasteste SET NomeProduto = '$NomeProduto' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($Tamanho != NULL && $Tamanho >= 0) {
            $requisicao = "UPDATE vendasteste SET tamanho = '$Tamanho' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($Tipo != NULL) {
            $requisicao = "UPDATE vendasteste SET tipo = '$Tipo' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($DescricaoProduto != NULL) {
            $requisicao = "UPDATE vendasteste SET DescricaoProduto = '$DescricaoProduto' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($Quantidade != NULL && $Quantidade > 0) {
            $requisicao = "UPDATE vendasteste SET Quantidade = '$Quantidade' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($PrecoProduto != NULL && $PrecoProduto > 0) {
            $requisicao = "UPDATE vendasteste SET PrecoProduto = '$PrecoProduto' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($PrecoTotalCompra != NULL && $PrecoTotalCompra > 0) {
            $requisicao = "UPDATE vendasteste SET PrecoTotalCompra = '$PrecoTotalCompra' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($foiVendido != NULL) {
            $requisicao = "UPDATE vendasteste SET foiVendido = '$foiVendido' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        
        if ($vendedor != NULL) {
            $requisicao = "UPDATE vendasteste SET vendedor = '$vendedor' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        if ($dataVenda != NULL) {
            $requisicao = "UPDATE vendasteste SET dataVenda = '$dataVenda' WHERE ID = $id";
            mysqli_query($conexao, $requisicao);
        }
        echo "<script>alert('Dados alterados com sucesso!')</script>";
        // $requisicao = "SELECT * FROM vendasteste WHERE ID = $id";
        // $resposta = mysqli_query($conexao, $requisicao);
        // $dados = mysqli_fetch_array($resposta);
        // do {
        //     $PrecoTotalCompra = $PrecoProduto * $Quantidade; 
        //     $requisicao = "UPDATE vendasteste SET PrecoTotalCompra = $PrecoTotalCompra WHERE ID = $id";
        //     mysqli_query($conexao, $requisicao);
        // }while ($dados = mysqli_fetch_array($resposta));
    //mysqli_close( $conexao);
}

$requisicao = "SELECT * FROM vendasteste WHERE ID = $id";
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$query = mysqli_query($conexao, $requisicao);
$dadosTabela = mysqli_fetch_array($query);
?>

<?php include('headAdmin.php') ?>
<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        
        <meta charset = "utf-8"/>
        <link rel="stylesheet" type="text/css" href="manipulaVendas.css" href = "produtoA.css" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <title>Editar vendas</title>
            
    </head>
    <body>
         <center>
              <div  class="table-css">
                            <table class="table" style="overflow-x:auto;">
                              <thead class="thead-dark">
                                <tr class="table-text">
          
                    <th>ID</th>
                    <th>Nome do Cliente</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Pagamento</th>
                    <th>Nome do Produto</th>
                    <th>Tamanho(g)</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Preço Total</th>
                    <th>Status da Venda</th>
                    <th>Vendedor</th>
                    <th>Data de Venda</th>
                </tr>
                    <?php
                        if ($dadosTabela != NULL) {
                            // if ($dadosTabela[PrecoProduto] == NULL)
                            //     $dadosTabela[PrecoProduto] = 0;
                            // if ($dadosTabela[PrecoTotalCompra] == NULL)
                            //     $dadosTabela[PrecoTotalCompra] = 0;
                            echo "<tr><td>$dadosTabela[ID]</td>";
                                echo "<td>$dadosTabela[NomeCliente]</td>";
                                echo "<td>$dadosTabela[EmailCliente]</td>";
                                echo "<td>$dadosTabela[TelefoneCliente]</td>";
                                echo "<td>$dadosTabela[Pagamento]</td>";
                                echo "<td>$dadosTabela[NomeProduto]</td>";
                                echo "<td>$dadosTabela[tamanho]</td>";
                                echo "<td>$dadosTabela[tipo]</td>";
                                echo "<td>$dadosTabela[DescricaoProduto]</td>";
                                echo "<td>$dadosTabela[Quantidade]</td>";
                                echo "<td>R$$dadosTabela[PrecoProduto]</td>";
                                echo "<td>R$$dadosTabela[PrecoTotalCompra]</td>";
                                if($dadosTabela[foiVendido]==0){
                                            echo"<td class='text-danger'>Não Vendido</td>";
                                        }else{
                                            echo"<center><td class='text-success'>Vendido</td></center>";
                                        }
                                echo "<td>$dadosTabela[vendedor]</td>";
                                echo "<td>$dadosTabela[dataVenda]</td>";
                            echo "</tr>";
                        } else {
                            echo "<script>alert ('ERRO! Não há dados na tabela!')</script>";
                        }
                    ?>
            </table>

            <form method = "POST" action = "editaVendas.php?id=<?php echo $id;?>">
                <div class = "container">
                    <div class = "row">
                        
                        <div class="col-md-4 ">
                            <label for="email_login">Nome do CLiente: </label>
                            <input type="text" id="NC" name="NomeCliente" placeholder="Ex: Josefa dos Recinto"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Email do CLiente: </label>
                            <input type="text" id="EC" name="EmailCliente" placeholder="Ex: josefa@random.com"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Telefone do CLiente: </label>
                            <input type="text" id="TC" name="TelefoneCliente" placeholder="Ex: (31)9xxxx-xxxx"/>
                        </div>
                        
                        <div class="col-md-4 ">
                            <label for="email_login">Pagamento: </label>
                            <input type="text" id="P" name="Pagamento" placeholder="Ex: Cartão de Crédito"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Nome do Produto: </label>
                            <input type="text" id="NP" name="NomeProduto" placeholder="Bombom de Amendoim"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for = "type">Tipo:</label>
                            <select name = "tipo" id = "type">
                                <option value = ""></option></option>
                                <option value = "Bombom">Bombom</option>
                                <option value = "Ovo de Páscoa"> Ovo de Páscoa</option>
                            </select>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">tamanho(g): </label>
                            <input type="number" id="T" name="tamanho" placeholder="Ex: 200"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Descrição do Produto: </label>
                            <input type="text" id="DC" name="DescricaoProduto" placeholder="Ex: Bombom recheado com pedaços de Amendoim"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Preço do Produto: </label>
                            <input id="PP" name="PrecoProduto" placeholder="Ex: 16"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Quantidade: </label>
                            <input type="number" id="Q" min = "0" max = "99" name="Quantidade" placeholder="Ex: 33"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Preço Total: </label>
                            <input id="PTC" name="PrecoTotalCompra" placeholder="Ex: 66.60"/>
                        </div>
                        
                        <div class="col-md-4 ">
                            <label for="email_login">Foi Vendido? </label>
                            <select name = foiVendido id = "V">
                                <option value = ""></option></option>
                                <option value = "0">Sim</option>
                                <option value = "1">Não</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4 ">
                            <label for="email_login">Vendedor: </label>
                            <input type="text" id="VD" name="vendedor" placeholder="Ex: Carol"/>
                        </div>

                        <div class="col-md-4 ">
                            <label for="email_login">Data de Venda: </label>
                            <input type="date" id="DV" name="dataVenda"/>
                        </div>

                        <div class = "col-md-4">
                            <input type = "submit" name = "SubmitAlterar" value = "Editar"/>
                        </div>
                    </div>
                </div>
            </form>
            
            <form method = "POST" action = "ManipulaVendas.php">
                <input type = "submit" value = "Voltar"/>
            </form>
        </center>
    </body>
</html>
