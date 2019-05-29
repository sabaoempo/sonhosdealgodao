<?php include('preco.php'); 

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
        
        $result = mysqli_query($db, $query_products);
        $dados = mysqli_fetch_array($result);
       
        
     
        $sql = "DELETE FROM products WHERE id='$id'";
   
     
    if (mysqli_query($db, $sql)) {
        echo"<script>alert('Deletado com sucesso!');window.location='alteraProduto.php';</script>";
    } else {
        echo"<script>alert('Erro ao tentar excluir registro');window.location='alteraProduto.php';</script>". mysqli_error($conn);
    }
  
    mysqli_close($db);
        ?>
