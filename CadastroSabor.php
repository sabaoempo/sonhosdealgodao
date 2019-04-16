<?php

$connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); //('nome_do_servidor’,’nome_de_usuario’,’senha’); 

// if(!$connect){
//     echo "não conectado";
// }
// else
// echo "conectado";

if(isset($_POST['cadastrar'])){
    cadastrar();
}

if(isset($_POST['delete'])){
    delete();
}

if(isset($_POST['addDescricao'])){
    addDescricao();
}

function cadastrar(){
    
$nome = $_POST['nome'];

$descricao = $_POST['descricao'];

$connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); //('nome_do_servidor’,’nome_de_usuario’,’senha’);

$db = mysqli_select_db($connect,'sonhosdealgodao_sonhos');//(‘nome_do_banco_de_dados’);

$query_select = "SELECT nome FROM sabor WHERE nome = '$nome'";

$select = mysqli_query($connect,$query_select);

$log = mysqli_num_rows($select);


        if ($log >= 1){
             Print "<script>alert('esse nome já existe');window.location.href='Cadsabor.php';</script>";
    
        } else if(!empty($nome)){
             $query = "INSERT INTO sabor (nome,descricao) VALUES ('$nome','$descricao')";
            echo $query;
            $connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos');
            $insert = mysqli_query($connect,$query);
        
        
        if($insert){

            echo"<script>alert('Sabor cadastrado com sucesso!');window.location='Cadsabor.php';</script>";

        }else{

          echo"<script>alert('Não foi possível cadastrar esse sabor');window.location='Cadsabor.php';</script>";

        }
    }
}

function delete(){
    $connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
    $nome = $_POST['nome'];

    $sql = "DELETE FROM sabor WHERE nome='$nome'";

    if (mysqli_query($connect, $sql)) {
        echo"<script>alert('Sabor deletado com sucesso!');window.location='Cadsabor.php';</script>";
    } else {
        echo"<script>alert('Erro ao tentar excluir registro');window.location='Cadsabor.php';</script>". mysqli_error($conn);
    }

    mysqli_close($connect);
}  

function addDescricao(){
  
    $connect = mysqli_connect('localhost','sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos'); 
     
    $descricao = $_POST['descricao'];
    $nome = $_POST['nome'];
    
    $query = "UPDATE sabor SET descricao='$descricao' WHERE nome='$nome'";
      
    if (mysqli_query($connect, $query)) {
        echo"<script>alert('Descrição alterada com sucesso!');window.location='Cadsabor.php';</script>";
    } else {
        echo"<script>alert('Erro ao tentar alterar descrição');window.location='Cadsabor.php';</script>". mysqli_error($conn);
    }

}

?>
