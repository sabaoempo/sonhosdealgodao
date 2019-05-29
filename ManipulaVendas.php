<?php
$id = $_GET[id];
$servidor = 'localhost';
$bancoDados = "sonhosdealgodao_sonhos";
$usuario = "sonhosdealgodao_dev";
$senha = "$0nh0_d3_algod4o";

$conexao = mysqli_connect($servidor, $usuario, $senha) or die(mysqli_error());
mysqli_select_db($conexao, $bancoDados);
$requisicao = "SELECT * FROM vendasteste";
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
$query = mysqli_query($conexao, $requisicao);
$dadosTabela = mysqli_fetch_array($query);
//  session_start();
//         if(!isAdmin($_SESSION['user'])){
//              Print '<script>alert("Você não tem acesso a essa página");</script>';
//              session_destroy();
//              Print '<script>window.location="index.php";</script>';
//          } else {
//             // include('incluirhtml.php');
//             $user = $_SESSION['user'];
//         }
?>

       
        
    
<?php include('headAdmin.php') ?>
<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        
        <meta charset = "utf-8"/>
        <link rel="stylesheet" type="text/css" href="manipulaVendas.css" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <title>Manipular Vendas</title>
            
    </head>
    <body>
         <div  class="table-css">
         <table class="table" style="overflow-x:auto;">
            <thead class="thead-dark">
                <tr>
            		<th class="cabecalho">ID</th>
            		<th class="cabecalho">Nome do Cliente</th>
            		<th class="cabecalho">Produto</th>
            		<th class="cabecalho">Preço</th>
            		<th class="cabecalho">Quantidade Vendida</th>
            		<th class="cabecalho">Preço Total</th>
	            </tr>
            </thead>
            <tbody>
                <center>
                <?php
                    do {     
                        if ($dadosTabela[PrecoProduto] == NULL)
                            $dadosTabela[PrecoProduto] = 0;
                        if ($dadosTabela[PrecoTotalCompra] == NULL)
                            $dadosTabela[PrecoTotalCompra] = 0;
                        echo"<tr> <th>$dadosTabela[ID]</th>";
                        echo"<th>$dadosTabela[NomeCliente]</th>";
                        echo"<th>$dadosTabela[NomeProduto]</th>";
                        echo" <th>R$$dadosTabela[PrecoProduto]</th>";
                        echo" <th>$dadosTabela[Quantidade]</th>";
                        echo" <th>R$$dadosTabela[PrecoTotalCompra]</th>";
                        echo"<td class='actions text-right'>
		                  <a href='editaVendas.php?id=".$dadosTabela['ID']."' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Editar</a>
				         <a href='deletaVendas.php?id=".$dadosTabela['ID']."' class='btn btn-sm btn-danger' name='delelte'id='delete' ><i class='fa fa-trash' ></i> Excluir</a>
		                  </td>";
                        echo" </tr>";
                        
                        }while($dadosTabela = mysqli_fetch_array($query));
                    ?>
                    </center>
                </tbody>
            </thead>
        </table>
    </div>
    <?php include('footer.php'); ?>
    </body>
</html>
