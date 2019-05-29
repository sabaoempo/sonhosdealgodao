<?php
session_start();
include('incluirhtml.php');
$servername = 'localhost';
$nome_db    = "sonhosdealgodao_sonhos";
$user_db    = "sonhosdealgodao_dev";
$pass_db    = '$0nh0_d3_algod4o';
$db;
$cont = 0;
$db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
mysqli_select_db($db, $nome_db);
mysqli_query($db, "SET NAMES 'utf8'");
mysqli_query($db, 'SET character_set_connection=utf8');
mysqli_query($db, 'SET character_set_client=utf8');
mysqli_query($db, 'SET character_set_results=utf8');
$username = $_SESSION['user'];
$query_pedidos = "SELECT * FROM users WHERE USERNAME='$username'";
$result = mysqli_query($db, $query_pedidos);
$userData = mysqli_fetch_array($result);
?>


    <link rel="stylesheet" type="text/css" href="ManipulaADM.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>function apagar(ID)
        {
            if(window.confirm("Deseja realmente excluir?")){
                window.location='deleteManipula.php?ID='+ID;
            }
        }
    </script>
    <title>Página do vendedor</title>
<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center><img src="<?php echo $userData[IMAGE]?>" alt="Imagem de perfil" style="heigth: 120px; width: 120px;"><br>
                    <h3>Seja bem vindo, <?php echo $_SESSION['user']?></h3>
                    <a href="logout.php">Sair</a><br><br>
                    
                        <center><a href="alteraImagem.php" style="background-color: lightgreen; hover{text-decoration: none; color: white}; color: white; border-radius: 5px;">Alterar imagem de perfil</a></center>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center><h4 style="color: darkpink">Suas vendas</h4></center>
                    <br><br>
                    
                </div>
            </div>
        </div>

    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <br></br>
                    <h1> Clientes </h1>
                </center>
            </div>			
        </div>
    </div>
</header>    
<!--<div class="content">-->
    <table class="table table-hover">
        <thead>
            <tr class="table-text">
                <th >Nome</th>
                <th >Nome do Produto</th>
                <th >Tipo de Produto</th>
                
                <th ><a class="nav-link dropdown-toggle" style="color:black; " data-toggle="dropdown" href="#">Quantidade</a>
                    <div style="box-shadow: 5px 5px 5px;" class="dropdown-menu">
                        <a class="dropdown-item"  data-toggle="modal" data-target="#myModal">Alterar</a>
                    </div>
                </th>
                
                <th ><a class="nav-link dropdown-toggle" style="color:black; " data-toggle="dropdown" href="#">Pagamento</a>
                    <div style="box-shadow: 5px 5px 5px;" class="dropdown-menu">
                        <a class="dropdown-item"  data-toggle="modal" data-target="#myModal2">Alterar</a>
                    </div>  
                </th>
                
                <th ><a class="nav-link dropdown-toggle" style="color:black; " data-toggle="dropdown" href="#">Preço do Produto Unitário</a>
                    <div style="box-shadow: 5px 5px 5px;" class="dropdown-menu">
                        <a class="dropdown-item"  data-toggle="modal" data-target="#myModal3">Alterar</a>
                    </div>
                </th>
                
                <th ><a class="nav-link dropdown-toggle" style="color:black;" data-toggle="dropdown" href="#">Valor Total da Compra</a>
                    <div style="box-shadow: 5px 5px 5px;" class="dropdown-menu">
                        <a class="dropdown-item"  data-toggle="modal" data-target="#myModal4">Alterar</a>
                    </div>
                </th>
                
                <th ><a class="nav-link dropdown-toggle" style="color:black; " data-toggle="dropdown" href="#">Status da Compra</a>
                    <div  style="box-shadow: 5px 5px 5px;" class="dropdown-menu">
                        <a class="dropdown-item"; data-toggle="modal" data-target="#myModal5">Alterar</a>
                    </div>
                </th>
                 
            </tr>
        </thead>
        
        <tbody>
            <center>
                <?php
                    do{
                      echo" <tr>";
                                echo" <td name = Nome > $pedidoData[NomeCliente]      </td>";
                                echo" <td> $pedidoData[NomeProduto]                   </td>";
                                echo" <td> $pedidoData[tipo]                          </td>";
                                echo" <td> $pedidoData[Quantidade]                    </td>";
                                echo" <td> $pedidoData[Pagamento]                     </td>";
                                echo" <td> $pedidoData[PrecoProduto]                  </td>";
                                echo" <td> $pedidoData[PrecoTotalCompra]              </td>";
                                echo" <td> $pedidoData[foiVendido]                    </td>";
                ?> 
                                <td class='actions text-right'>
                                            <button class='btn btn-sm btn-danger' onclick="apagar('<?php echo $pedidoData['ID']?>');">Excluir </button> 
                                
                                </td>
                            </tr>
                <?php         
                    }while($pedidoData = mysqli_fetch_assoc($result));
                ?>
                
                
            </center>
            <!--<tr><td colspan="6">Nenhum registro encontrado.</td></tr>-->
        </tbody>
    </table>
<!--</div>   -->
    
    <!--MODAL 1-->
    <div class="container">
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Alterar Quantidade</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="ManipulaPedidoADM.php" method="POST">
                            <p>
                                <label >Cliente: </label>
                                <input type="text" id="NomeCliente" name="Cliente" required="required"/>
                            </p>
    
                            <p>
                                <label >Quantidade: </label>
                                <input type="text" id="Quantidade" name="Quantidade"  required="required" />
                            </p>
    
                            <p>
                                <input type="submit" name="alterarQuantidade" value="Alterar Quantidade" /> 
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--MODAL 2-->
    <div class="container">
        <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Alterar Pagamento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="ManipulaPedidoADM.php" method="POST">
                            <p>
                                <label >Cliente: </label>
                                <input type="text" id="NomeCliente" name="Cliente" required="required"/>
                            </p>
    
                            <p>
                                <label >Pagamento: </label>
                                <input type="text" id="Pagamento" name="Pagamento"  required="required" />
                            </p>

                            <p>
                                <input type="submit" name="alterarPagamento" value="Alterar Pagamento" /> 
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--MODAL 3-->
    <div class="container">
        <div class="modal" id="myModal3" >
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Preço do Produto Unitário</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="ManipulaPedidoADM.php" method="POST">
                            <p>
                                <label >Cliente: </label>
                                <input type="text" id="NomeCliente" name="Cliente" required="required"/>
                            </p>
    
                            <p>
                                <label >Preço do Produto Unitário: </label>
                                <input type="text" id="PrecoProduto" name="PrecoProduto"  required="required" />
                            </p>

                            <p>
                                <input type="submit" name="alterarPreçoProdutoUnitário" value="Alterar Preço do Produto" /> 
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--MODAL 4-->
    <div class="container">
        <div class="modal" id="myModal4" >
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Valor Total da Compra</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="ManipulaPedidoADM.php" method="POST">
                            <p>
                                <label >Cliente: </label>
                                <input type="text" id="NomeCliente" name="Cliente" required="required"/>
                            </p>
    
                            <p>
                                <label >Preço do Produto Unitário: </label>
                                <input type="text" id="PrecoTotalCompra" name="PrecoTotalCompra"  required="required" />
                            </p>

                            <p>
                                <input type="submit" name="alterarPrecoTotalCompra" value="Alterar Valor Total da Compra" /> 
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--MODAL 5-->
    <div class="container">
        <div class="modal" id="myModal5" >
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Preço do Produto Unitário</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="ManipulaPedidoADM.php" method="POST">
                            <p>
                                <label >Cliente: </label>
                                <input type="text" id="NomeCliente" name="Cliente" required="required"/>
                            </p>
    
                            <p>
                                <label >Status da Compra: </label>
                                <input type="text" id="foiVendido" name="foiVendido"  required="required" />
                            </p>

                            <p>
                                <input type="submit" name="alterarFoiVendido" value="Alterar Status da Compra" /> 
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><?php include('footer.php'); ?><?php
mysqli_close($db);

if(isset($_POST['alterarQuantidade'])){
    alterarQuantidade();
}

if(isset($_POST['alterarPagamento'])){
    alterarPagamento();
}

if(isset($_POST['alterarPreçoProdutoUnitário'])){
    alterarPreçoProdutoUnitário();
}

if(isset($_POST['alterarPrecoTotalCompra'])){
    alterarPrecoTotalCompra();
}

if(isset($_POST['alterarFoiVendido'])){
    alterarFoiVendido();
}

if(isset($_POST['deleName'])){
    delete();
}
function alterarQuantidade(){
  
    $db = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
        
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');
             
    $NomeCliente = $_POST['Cliente'];
    $Quantidade = $_POST['Quantidade'];
    
    $query  = "UPDATE vendasteste SET QUANTIDADE='$Quantidade' WHERE NomeCliente='$NomeCliente'";
     if (mysqli_query($db, $query)) {
        echo"<script>alert('Quantidade alterada com sucesso!');window.location='home.php';</script>";
    } else{
        echo"<script>alert('Erro ao tentar alterar Quantidade');window.location='home.php';</script>". mysqli_error($db);
    }
    mysqli_close($db);
}







function alterarPagamento(){
  
    $db = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
     
    $NomeCliente = $_POST['Cliente'];
    $Pagamento = $_POST['Pagamento'];
    
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');
    
    $query  = "UPDATE vendasteste SET PAGAMENTO='$Pagamento' WHERE NomeCliente='$NomeCliente'";
    if (mysqli_query($db, $query)) {
        echo"<script>alert('Pagamento alterado com sucesso!');window.location='home.php';</script>";
    } else{
        echo"<script>alert('Erro ao tentar alterar Pagamento');window.location='home.php';</script>". mysqli_error($db);
    }
    mysqli_close($db);
}






    function alterarPreçoProdutoUnitário(){
        
    $db = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
     
    $NomeCliente = $_POST['Cliente'];
    $PrecoProduto = $_POST['PrecoProduto'];
    
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');

    $query  = "UPDATE vendasteste SET PRECOPRODUTO='$PrecoProduto' WHERE NomeCliente='$NomeCliente'";
    if (mysqli_query($db, $query)) {
        echo"<script>alert('Preço do Produto alterado com sucesso!');window.location='home.php';</script>";
    } else{
        echo"<script>alert('Erro ao tentar alterar Preço do Produto');window.location='home.php';</script>". mysqli_error($db);
    }
    mysqli_close($db);
}
    
    
    
    
    
    
    
    function alterarPrecoTotalCompra(){
        
    $db = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
     
    $NomeCliente = $_POST['Cliente'];
    $PrecoTotalCompra = $_POST['PrecoTotalCompra'];
    
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');

    $query  = "UPDATE vendasteste SET PRECOTOTALCOMPRA='$PrecoTotalCompra' WHERE NomeCliente='$NomeCliente'";
    if (mysqli_query($db, $query)) {
        echo"<script>alert('Preço do Produto Total alterado com sucesso!');window.location='home.php';</script>";
    } else{
        echo"<script>alert('Erro ao tentar alterar Preço Total do Produto');window.location='home.php';</script>". mysqli_error($db);
    }
    mysqli_close($db);
}

    
    
    
    function alterarFoiVendido(){
        
    $db = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
     
    $NomeCliente = $_POST['Cliente'];
    $foiVendido = $_POST['foiVendido'];
    
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');

    $query  = "UPDATE vendasteste SET FOIVENDIDO='$foiVendido' WHERE NomeCliente='$NomeCliente'";
    if (mysqli_query($db, $query)) {
        echo"<script>alert('Status da Compra alterado com sucesso!');window.location='home.php';</script>";
    } else{
        echo"<script>alert('Erro ao tentar alterar Status da Compra');window.location='home.php';</script>". mysqli_error($db);
    }
    mysqli_close($db);
}
    function deleteManipula(){
    $db = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
    mysqli_query($db, "SET NAMES utf8");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');
   
    $NomeCliente = $_POST['NomeCliente'] ;
    $sql_pedido="SELECT * FROM vendasteste WHERE NomeCliente= '$NomeCliente'";
    $result=  mysqli_query($db, $sql_pedido);
   
    $sql = "DELETE FROM vendasteste WHERE NomeCliente='$NomeCliente'";
   
     
    if (mysqli_query($db, $sql)) {
        echo"<script>alert('Sabor deletado com sucesso!');window.location='home.php';</script>";
    } else {
        echo"<script>alert('Erro ao tentar excluir registro');window.location='home.php';</script>". mysqli_error($db);
    }
 
    mysqli_close($db);
}  


// <a href='deleteManipula.php?NomeCliente=".$pedidoData[NomeCliente]."' class='btn btn-sm btn-danger' name='deleteManipula'id='deleteManipula' > <i class='fa fa-trash' ></i> Excluir </a>
  


?>
