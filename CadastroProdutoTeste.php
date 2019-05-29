<?php include('headAdmin.php'); 
	
    $servername = 'localhost';
    $nome_db    = "sonhosdealgodao_sonhos";
    $user_db    = "sonhosdealgodao_dev";
    $pass_db    = "$0nh0_d3_algod4o";
    $db;
    $cont = 0;

    $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');

    mysqli_select_db($db, $nome_db);
    $query_products = "SELECT * FROM sabor";
    $result = mysqli_query($db, $query_products);
    $flavorData = mysqli_fetch_assoc($result);
    //$_SESSION['carrinho'][];
?>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
		<!--    <link rel="stylesheet" type="text/css" href="index.css" />-->
		<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
		<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
		<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
		<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
		<title>Bombom</title>
	</head>
	<!-- <script>$('.dropdown-toggle').dropdown()</script> -->
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2"><br>
                <center><h5>Cadastro de Bombom</h5></center><br><br>
                <center>
                    <form method="POST" action="CadastroProdutoTeste.php" enctype="multipart/form-data">
                	    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Imagem:</label>
                	    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                	    <input type="text" name="name" placeholder="Nome do produto" class="form-control"><br>
                	    <input type="text" name="description" placeholder="Descrição" class="form-control"><br>
                	    <input type="number" name="price" placeholder="Preço" class="form-control"><br>
                        <input type="submit" id="btn btn-primary" class="EnviarPedido btn btn-success" value="Cadastrar produto" name="btn-products"></input>
                	  </form>
            	  </center>
            </div>
        </div>
    </div>
	
	    
	    
	    
		<!--<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sabores</label>-->
		<!--<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="select_flavor">-->
		<!--	<option selected>Selecione o Sabor</option>-->
// 			<?php
// 			do
// 			{
// 				$cont++;
// 				echo "<option value='$cont' id='$cont'>$flavorData[nome]</option>";
// 			} while($flavorData = mysqli_fetch_array($result));
// 			?>
                  
		<!--</select>-->
		<!--<div class="form-row col-md-6 offset-2">-->
		<!--	<div class="col">-->
		<!--		<input type="text" name="amount" class="form-control" placeholder="Quantidade">-->
		<!--	</div>-->
                    <!--  <div class="col">-->
                    <!--        <input type="text" name="name" class="form-control" placeholder="Nome">-->
                    <!--  </div>-->
                    <!--  <div class="col">-->
                    <!--        <input type="text" name="contact" class="form-control" placeholder="Contato">-->
                    <!--  </div>-->

                    <!--</div>-->
                
                    <!--<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Forma de Pagamento</label>-->
                    <!--<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="select_payment">-->
                    <!--  <option selected>Selecione</option>-->
                    <!--  <option value="1">Cheque</option>-->
                    <!--  <option value="2">Dinheiro</option>-->
                    <!--  <option value="3">Cartão</option>-->
                    <!--</select>-->
                    
                    <?php include('footer.php'); ?>
                    
</body>
 </html>
    
<?php
// $servername = 'localhost';
// $nome_db    = "sonhosdealgodao_sonhos";
// $user_db    = "sonhosdealgodao_dev";
// $pass_db    = "$0nh0_d3_algod4o";
// $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());

if (isset($_POST['btn-products']))
{
	registerProduct();

}    


function registerProduct()
{
    global $db;
    
	//image
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
	if($check == false){
	    Print '<script>alert("O arquivo selecionado não é uma imagem.");</script>';
	    $uploadOk = 0;
	}
	else if(file_exists($target_file)){
	    Print '<script>alert("O arquivo selecionado já existe.");</script>';
	    $uploadOk = 0;
	}
	else if($_FILES['fileToUpload']['size'] > 1000000){
	    Print '<script>alert("O arquivo selecionado é maior que 1MB. Por favor, escolha uma imagem menor.");</script>';
	}
	else if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"){
	    Print '<script>alert("Somente arquivos jpg, jpeg e png são aceitos.");</script>';
	    $uploadOk = 0;
	}
	
	if($uploadOk !== 0){
	    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
	}

	$name= $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	
	$query = "INSERT INTO products (type, name, size, description, price, image) VALUES('1', '$name', '0', '$description', '$price', '$target_file')";
	$query = mysqli_query($db, $query);
	echo $query;
	
	if($query){
	    	Print '<script>alert("Cadastro feito com sucesso!");</script>';
	} else {
	    Print '<script>alert("Não foi possível cadastrar o produto. Tente novamente ou verifique a conexão.");</script>';
	}

}

function e($val)
{
	
	return mysqli_real_escape_string($db, trim($val));
}
mysqli_close($db);

?>
