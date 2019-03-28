<html>
    <head>
        <title>Sonhos de Algod達o</title>
    </head>
    <?php
        session_start();
        if($_SESSION['user']){
            
        }else{
            header("location:index.php");
        }
        $user = $_SESSION['user'];
    ?>
    <body>
        <h2>Home Page</h2>
        <p>Hello <?php Print "$user"?>!</p>
        <a href="logout.php">Sair</a><br><br>
        <form action="add.php" methot="POST">
            
        </form>
    </body>
</html>