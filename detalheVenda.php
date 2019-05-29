
<?php include('headAdmin.php'); 


        $id = $_GET[id];
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
         mysqli_query($db, "SET NAMES utf8");
        mysqli_query($db, 'SET character_set_connection=utf8');
        mysqli_query($db, 'SET character_set_client=utf8');
        mysqli_query($db, 'SET character_set_results=utf8');
        mysqli_select_db($db, $nome_db);
        $query_products = "SELECT * FROM vendasteste WHERE ID = '$id'";
        $result = mysqli_query($db, $query_products);
        $dados = mysqli_fetch_array($result);
        
        $nomeCliente= $dados[NomeCliente];
        $email= $dados[EmailCliente];
        $tel= $dados[TelefoneCliente];
        $pag=$dados[Pagamento];
        $produto=$dados[NomeProduto];
        $tam = $dados[tamanho];
        $tipo = $dados[tipo];
        $desc = $dados[DescricaoProduto];
        $quant = $dados[Quantidade];
        $preco = $dados[PrecoProduto];
        $total = $dados[PrecoTotalCompra];
        $vendido = $dados[foiVendido];
        $data= $dados[dataVenda];
       
        ?>




<head>
     <link rel="stylesheet" type="text/css" href="desc.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Dados do Pedido</title>
</head>
<header>

	    <center>

			<h1>Pedido</h1>

		</center>

</header>
    <body>
        <div class="container" >
            <center>
                <div class="row" style="box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset">
                    <div class="col-md-12 ">
                        <label for="email_login" style="color:rgb(197, 106, 106);">ID: </label>
                        <label for="email_login" style="color:black;"><?php echo $id ?> </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);" >Nome Cliente: </label>
                        <label for="email_login"><?php echo $nomeCliente ?> </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Email:   </label>
                        <label for="email_login"><?php echo $email ?>  </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Telefone:   </label>
                        <label for="email_login"> <?php echo $tel ?>  </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Pagamento: </label>
                        <label for="email_login"><?php echo $pag ?> </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Produto:   </label>
                        <label for="email_login"><?php echo $produto ?>  </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Tamanho:  </label>
                        <label for="email_login"><?php echo $tam ?> </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Tipo:  </label>
                        <label for="email_login"> <?php echo $tipo ?> </label>
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Descrição: </label>
                        <label for="email_login"><?php echo $desc ?> </label>
                    </div>
                            
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Quantidade:  </label>
                        <label for="email_login"><?php echo $quant ?> </label>
                    </div>
                            
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Preço: </label>
                        <label for="email_login"> <?php echo $preco ?> </label>
                    </div>
                            
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Preço Total:  </label>
                        <label for="email_login"> <?php echo $total ?> </label>
                    </div>
                            
                    <div class="col-md-12">
                        <label for="email_login" style="color:rgb(197, 106, 106);">Data: </label>
                        <label for="email_login"><?php echo $data ?> </label>
                    </div> 
                </div>
            </center>    
        </div>
    </body>
 <?php include('footer.php'); mysqli_close($db);?> 
