<?php include('incluirhtml.php');

    $servername = 'localhost';
    $nome_db    = "sonhosdealgodao_sonhos";
    $user_db    = "sonhosdealgodao_dev";
    $pass_db    = '$0nh0_d3_algod4o';
    $db;
    $cont = 0;

    $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');
    mysqli_select_db($db, $nome_db);
    
?>
<head><title>Alterar imagem de perfil</title></head>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <center><h5>Alterar Imagem de Perfil</h5></center>
            <center>
                <form method="POST" action="alteraImagem.php" enctype="multipart/form-data">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Imagem:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" id="btn btn-primary" class="EnviarPedido btn btn-success" value="Enviar" name="btn-image">
                </form>
            </center>
        </div>
    </div>
</div>

<?php

if (isset($_POST['btn-image']))
{
	alterImage();

}    


function alterImage()
{
    global $db;
	$target_dir = "perfil/";
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
    $username = $_SESSION['user'];
    $query = "UPDATE USERS SET IMAGE = '$target_file' WHERE USERNAME = '$username'";

	
	if($query){
	    	Print '<script>alert("Cadastro feito com sucesso!");</script>';
	} else {
	    Print '<script>alert("Não foi possível cadastrar o produto. Tente novamente ou verifique a conexão.");</script>';
	}

}

mysqli_close($db);
?>
