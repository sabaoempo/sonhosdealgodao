<html>
    <?php
        include('functions.php');
    ?>
    <head>
        
    </head>
    <?php
        session_start();
        if(!isAdmin($_SESSION['user'])){
            Print '<script>alert("Você não tem acesso a essa página");</script>';
            session_destroy();
            Print '<script>window.location="index.php";</script>';
        } else {
            include('incluirhtml.php');
            $user = $_SESSION['user'];
        }
        // if($_SESSION['user']){
            
        // }else{
        //     header("location:index.php");
        // }
        
    ?>
    <body>
        <h3>Seja bem vindo, <?php echo $user?></h3><br>
        <a href="logout.php">Sair</a><br><br>
    </body>
</html>
