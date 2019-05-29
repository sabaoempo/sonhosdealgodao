
<?php include('headAdmin.php'); 
include('preco.php'); 

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
        $query_products = "SELECT * FROM products WHERE ID = '$id'";
        $result = mysqli_query($db, $query_products);
        $dados = mysqli_fetch_array($result);
        $tipo = $dados[type];
        $nome = $dados[name];
        $size = $dados[size];
        $description = $dados[description];
        $price = $dados[price];
        $img = $dados[image];
        ?>




<head>
     <link rel="stylesheet" type="text/css" href="produtoA.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Alterar</title>
</head>
<header>

	    <center>

			<h1>Alterar</h1>

		</center>

</header>
<body>
  
           
        <center>        
            <form method="POST" enctype="multipart/form-data" action="preco.php">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <label for="email_login" >ID: </label>
                            <input type="text" id="ID" name="ID" value="<?php echo $id ?>" required="required"     />
                        </div>
                        <div class="col-md-4 ">
                            <label for="email_login">Tipo: </label>
                            <input type="text" id="tipo" name="tipo" value="<?php echo $tipo ?>" required="required"     />
                  
                        </div>
                        <div class="col-md-4 ">
                  
                            <label for="email_login">Nome: </label>
                            <input type="text" id="nome" name="nome" value="<?php echo $nome ?>" required="required"     />
                  
                        </div>
                        <div class="col-md-4">
                            <label for="email_login">Tamanho: </label>
                            <input type="text" id="tamanho" name="tamanho"  value="<?php echo $size ?>" required="required"     />
                
                        </div>
                        <div class="col-md-4">
                            <label for="email_login">Descrição: </label>
                            <input type="text" id="descricao" name="descricao" value="<?php echo $description ?>" required="required"     />
                  
                        </div>
                        <div class="col-md-4">
                 
                            <label for="email_login">Preço: </label>
                            <input type="text" id="preco" name="preco" value="<?php echo $price ?>" required="required"     />
                 
                        </div>
                        <div class="col-md-4 ">
               
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Imagem: <input name="arquivo" type="text"value="<?php echo $img ?>" /></label>
	                        <input type="file" name="fileToUpload" id="fileToUpload" >
                  
                        </div>
                         <div class="col-md-12 ">
                        <p> 
                            <input type="submit" name="Editar" value="Editar" /> 
                        </p>
                        </div>
                    </div>    
          
                </div>
            </form>
        
        </center>
 

</body>
 <?php include('footer.php'); mysqli_close($db);?> 
