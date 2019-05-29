<?php
        //session_start();
        $_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $servername = 'localhost';
        $nome_db    = 'sonhosdealgodao_sonhos';
        $user_db    = 'sonhosdealgodao_dev';
        $pass_db    = '$0nh0_d3_algod4o';
        $db;
        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_query($db, "SET NAMES 'utf8'");
        mysqli_query($db, 'SET character_set_connection=utf8');
        mysqli_query($db, 'SET character_set_client=utf8');
        mysqli_query($db, 'SET character_set_results=utf8');
        
    ?>
    <html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
          
           
          <meta name="viewport" content="width=device-width, initial-scale=1">
    
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
          <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
          <link rel="stylesheet" type="text/css" href="index.css" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
           
    </head>
    <body>
        

 


        <header id="header">
            
        <img src="imagens/header3.png" alt="Pascoa" width="100%" height="250" >
        <!--style="background-image: url(imagens/nav.png);"-->
  <!--      <nav class="navbar navbar-expand-lg " style="background-color: rgb(197, 106, 106)">-->

  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">-->
  <!--  <span class="navbar-toggler-icon"></span>-->
  <!--</button>-->
  <!--<div class="collapse navbar-collapse" id="navbarNavDropdown">-->
  <!--  <ul class="navbar-nav">-->
  <!--    <li class="nav-item active">-->
  <!--      <a class="nav-link" id="color:hover"href="index.html" type="bottom"  >Home </a>-->
  <!--    </li>-->
  <!--    <li class="nav-item">-->
  <!--      <a class="nav-link" href="#">Sobre N贸s</a>-->
  <!--    </li>-->
     
  <!--    <li class="nav-item">-->
  <!--    <a href="login.php" class="nav-link">Entre</a></li>-->
  <!--    <li class="nav-item">-->
  <!--    <a href="register.php" class="nav-link">Cadastre-se</a></li>-->
  <!--    <li class="nav-item dropdown" >-->
  <!--        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedidos</a>-->
  <!--        <div class="dropdown-menu" style="z-index: 2;">-->
  <!--          <a class="dropdown-item" href="sonhosdealgodao.tk/CadastroProdutoTeste.php">Bombom</a>-->
  <!--          <a class="dropdown-item" href="#">Ovo</a>-->
  <!--        </div>-->
  <!--      </li>-->
     
     
  <!--  </nav>-->
       
       <ul class="nav nav-pills" style="background-color: rgb(197, 106, 106)">
          <li class="nav-item">
            <a class="nav-link " href="index.php" style="color:aliceblue; font-size: 22px">Home</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="Sobre.php" style="color:aliceblue; font-size: 22px">Sobre N&#243s</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:aliceblue; font-size: 22px" href="login.php">Entre</a>
          </li>
          <li>
              <a class="nav-link" style="color:lightpink; font-size: 22px" href="pedir.php">Produtos</a>
          </li>
          <!--<li class="nav-item dropdown">-->
          <!--    <a class="nav-link dropdown-toggle" style="color:aliceblue; font-size: 22px" data-toggle="dropdown" href="#">Pedidos</a>-->
          <!--    <div class="dropdown-menu">-->
                <!--<a class="dropdown-item" href="CadastroProdutoTeste.php">Bombom</a>-->
               
                <!--<a class="dropdown-item" href="CadastroOvoPascoa.php">Ovo</a></div>-->
          <!--  </li>-->
          <!--  <li class="nav-item">-->

            <a class="nav-link" style="color:aliceblue;" href="cart.php"><img src="imagens/cartwhite.png" style="heigth:30px; width: 30px;" alt="Carrinho de compras"></a>
          </li>
          <?php
            if(count($_SESSION['cart']) != 0){
                $cont = count($_SESSION['cart'])/3;
                echo "<li><p style='color: white; background-color: lightpink; border-radius: 5px; margin-top: 10px; padding: 2px'>".$cont."</p></li>";
            }
          ?>
        </ul>
    </header>

    </body>
</html>
<?php mysqli_close($db);?>
