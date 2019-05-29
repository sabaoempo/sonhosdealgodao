<?php   include('ManipulaPedidoADM.php');
      
        $ID = $_GET[ID];
        $servername  = 'localhost';
        $nome_db     = 'sonhosdealgodao_sonhos';
        $user_db     = 'sonhosdealgodao_dev';
        $pass_db     = '$0nh0_d3_algod4o';
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        
        mysqli_query($db, "SET NAMES utf8");
        mysqli_query($db, 'SET character_set_connection=utf8');
        mysqli_query($db, 'SET character_set_client=utf8');
        mysqli_query($db, 'SET character_set_results=utf8');
        mysqli_select_db($db, $nome_db);
        $query_cliente = "SELECT * FROM vendasteste WHERE ID = '$ID'";
        $result = mysqli_query($db, $query_cliente);
        $dados = mysqli_fetch_array($result);
        
        
        //echo"<script> if(confirm('Você realmente deseja excluir?')){</script>";
            
        $sql_pedido="SELECT * FROM vendasteste WHERE ID= '$ID'";
        $result=  mysqli_query($db, $sql_pedido);
   
         $sql = "DELETE FROM vendasteste WHERE ID='$ID'";
   
     
        if (mysqli_query($db, $sql)) {
            echo"<script>alert('Pedido Deletado com sucesso!');window.location='ManipulaPedidoADM.php';</script>";
        } else {
            echo"<script>alert('Erro ao tentar excluir registro');window.location='ManipulaPedidoADM.php';</script>". mysqli_error();
        }
        //echo"<script>else{alert('Cancelado');";
        mysqli_close($db);
    ?>
