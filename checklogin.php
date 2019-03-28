<?php
    session_start();
    //echo "Conectado";
    $host = "localhost";
    $db = "sonhosdealgodao_sonhos";
    $user_banco = "sonhosdealgodao_teste";
    $user_senha = "$0nh0_d3_algodao";
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $con = mysql_pconnect($host, $user_banco, $user_senha) or die(mysql_error());
    /*if(!$con){
        die("Conexão falha");
    }
    echo "infectado";*/
   mysql_select_db($db, $con) or die("Não foi possível conectar ao banco de dados");
   $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    
    $row = mysql_fetch_assoc($query);
    $exists = count($row) > 1 ? true : false;
    //echo json_encode($row);
    
    if($exists){
        
         
            $table_users = $row['USERNAME'];
            $table_password = $row['PASSWORD'];
           // echo $table_users;
        
    
    
        
    if(($table_password == $password)&&($table_users == $username)){
                $_SESSION['user'] = $username;
                header("location: home.php");
            
        } 
        else if($table_password != $password) {
                Print '<script>alert("Senha incorreta!");</script>';
                Print '<script>window.location.assign("login.php");</script>';
             }
       
        } else { Print '<script>alert("Usuário incorreto!");</script>';
        Print '<script>window.location.assign("login.php");</script>';
        
    }
    
    
?>