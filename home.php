<html>
    <?php
        include('functions.php');
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
    ?>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
    </head>
    <?php
        session_start();
        $username = $_SESSION['user'];
        if(!isUser($username)){
            Print '<script>alert("Você não tem acesso a esta página");</script>';
            session_destroy();
            Print '<script>window.location="index.php";</script>';
            //die();
        } else{
            include('incluirhtml.php');
            
        }
    ?>    
    <body>
        <h3>Hello, <?php echo $username?></h3><br>
        <a href="logout.php">Sair</a><br><br>
    </body>
</html>
