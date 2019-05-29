<?php
$id = $_GET[id];
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";
$conexao = mysqli_connect($servidor, $usuario, $senha) or die(mysqli_error());
mysqli_select_db($conexao, $bancoDados);

if (isset($_POST['SubmitExcluir']))
    excluirProdutos();
    
function excluirProdutos() {
    global $conexao, $id;
    // if (mysqli_connect_errno($conexao))
    //     echo "Problemas para conectar ao banco de dados. Tente novamente";
    // else
    //     echo "Conexão realizada com sucesso!";
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, 'SET character_set_connection=utf8');
    mysqli_query($conexao, 'SET character_set_client=utf8');
    mysqli_query($conexao, 'SET character_set_results=utf8');
    if ($id != NULL) {
        $requisicao = "DELETE FROM vendasteste WHERE id = $id";
        mysqli_query($conexao, $requisicao);
        echo "<script>alert('Cliente removido com sucesso!')</script>";
        Print '<script>window.location="ManipulaVendas.php";</script>';
    }else {
        echo "<script>('ERRO! Produto não encontrado. Retornando à página anterior...')</script>";
        Print '<script>window.location = "ManipulaVendas.php";</script>';
    }
}

$requisicao = "SELECT * FROM vendasteste WHERE id = $id";
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
            <title>Deletar Vendas</title>
            
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
                            echo "<tr><td>$dadosTabela[ID]</td>";
                                echo "<td>$dadosTabela[NomeCliente]</td>";
                                echo "<td>$dadosTabela[EmailCliente]</td>";
                                echo "<td>$dadosTabela[TelefoneCliente]</td>";
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
            <form method = "POST" action = "deletaVendas.php?id=<?php echo $id;?>">
                <label for="DeleteOuAltera">Deseja excluir os dados deste cliente?</label>
                    <input type = "submit" name = "SubmitExcluir" value = "Sim"/>
            </form>
            
            <form method = "POST" action = "ManipulaVendas.php">
                 <input type = "submit" value = "Não"/>
            </form>
                
                    <!--<a href='ManipulaVendas.php' class='btn btn-danger' name='delelte'id='delete' ><i></i> Não</a>-->
            </form>
        </center>
    </body>
</html>
