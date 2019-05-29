<?php

$connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); //('nome_do_servidor’,’nome_de_usuario’,’senha’); 
 mysqli_query($connect, "SET NAMES utf8");
        mysqli_query($connect, 'SET character_set_connection=utf8');
        mysqli_query($connect, 'SET character_set_client=utf8');
        mysqli_query($connect, 'SET character_set_results=utf8');


if(isset($_POST['adicionar'])){
    cadastrar();
}

if(isset($_POST['delete'])){
     
    delete();
      
}

if(isset($_POST['Editar'])){
   alterarPreco();
}

if(isset($_POST['alterarTamanho'])){
   alterarTamanho();
}

function cadastrar(){

$tipo = $_POST['tipo'];

$sabor = $_POST['sabor'];

$tamanho = $_POST['tamanho'];

$preco = $_POST['preco'];

$connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); //('nome_do_servidor’,’nome_de_usuario’,’senha’);

$db = mysqli_select_db($connect,'sonhosdealgodao_sonhos');//(‘nome_do_banco_de_dados’);

$query_select = "SELECT nome FROM sabor WHERE nome = '$nome'";

$select = mysqli_query($connect,$query_select);

$log = mysqli_num_rows($select);


        // if ($log >= 1){
        //      Print "<script>alert('esse nome já existe');window.location.href='admin.php';</script>";
    
        // } else if(!empty($nome)){
             $query = "INSERT INTO products (TYPE, SELECT_FLAVOR, SIZE, PRICE) VALUES ('$tipo','$sabor','$tamanho','$preco')";
      
            //$connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos');
            $insert = mysqli_query($connect,$query);
        
        
        if($insert){

            echo"<script>alert('Produto cadastrado com sucesso!');window.location='produtoPreco.php';</script>";

        }else{

          echo"<script>alert('Não foi possível cadastrar');window.location='produtoPreco.php';</script>";

        }
    
}

function delete(){
    $connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
    mysqli_query($connect, "SET NAMES utf8");
    mysqli_query($connect, 'SET character_set_connection=utf8');
    mysqli_query($connect, 'SET character_set_client=utf8');
    mysqli_query($connect, 'SET character_set_results=utf8');
   
    $id = $_POST['ID'] ;
    $sql_pedido="SELECT * FROM products WHERE id= '$id'";
    $result=  mysqli_query($connect, $sql_pedido);
   
    $sql = "DELETE FROM products WHERE id='$id'";
   
     
    if (mysqli_query($connect, $sql)) {
        echo"<script>alert('Sabor deletado com sucesso!');window.location='admin.php';</script>";
    } else {
        echo"<script>alert('Erro ao tentar excluir registro');window.location='admin.php';</script>". mysqli_error($conn);
    }
 
    mysqli_close($connect);
}  


function alterarPreco(){
  
    $connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
    $id = $_POST['ID'] ;
    if ($_FILES['fileToUpload']['size']>0){
        echo"ENTREI AQUI";
    	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
	if($check == false){
	    echo "<script>alert('O arquivo selecionado não é uma imagem.');</script>";
	    $uploadOk = 0;
	}
	else if(file_exists($target_file)){
	    echo '<script>alert("O arquivo selecionado já existe.");</script>';
	    $uploadOk = 0;
	}
	else if($_FILES['fileToUpload']['size'] > 1000000){
	    echo '<script>alert("O arquivo selecionado é maior que 1MB. Por favor, escolha uma imagem menor.");</script>';
	}
	else if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"){
	    echo '<script>alert("Somente arquivos jpg, jpeg e png são aceitos.");</script>';
	    $uploadOk = 0;
	}
	
	if($uploadOk !== 0){
	    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
	}
        $query_img="UPDATE products SET image='$target_file' WHERE id='$id'";
        $query_img = mysqli_query($connect, $query_img);
        
    }


     $tipo = $_POST['tipo'];
        $nome = $_POST['nome'];
        $size = $_POST['tamanho'];
        $description = $_POST['descricao'];
        $price = $_POST['preco'];
        $img = $POST['img'];
        $arquivo= $_FILES['fileToUpload']['name'];
	
	$query = "UPDATE  products SET type='$tipo', name='$nome',size='$size', description='$description', price='$price' WHERE id='$id'";
	$query = mysqli_query($connect, $query);
	echo $query;
	
	if($query){
	    	echo"<script>alert('Alteração realizada com sucesso!');window.location='alteraProduto.php';</script>";
	} else {
	    echo"<script>alert('Erro ao tentar alterar produto!');window.location='alteraProduto.php';</script>";
	}

}



function alterarTamanho(){
  
    $connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
     
    $id = $_POST['ID2'] ;
    $tamanho = $_POST['tamanho'];
    
    $query = "UPDATE products SET SIZE='$tamanho' WHERE ID='$id'";
      
    if (mysqli_query($connect, $query)) {
        echo"<script>alert('Tamanho alterado com sucesso!');window.location='produtoPreco.php';</script>";
    } else {
        echo"<script>alert('Erro ao tentar alterar tamanho');window.location='produtoPreco.php';</script>". mysqli_error($conn);
    }

}


?>
