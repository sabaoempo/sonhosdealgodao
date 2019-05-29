<?php
// session_start();
// isset($_SESSION['user']) ? $_SESSION['user'] : $_SESSION['user']; 
?>

<html>
    <head>
            <!-- <link rel="stylesheet" type="text/css" href="register.css" />
            <link rel="stylesheet" type="text/css" href="login.css" /> -->
            <!--<link rel="stylesheet" type="text/css" href="admin.css" />-->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <header>
            <!-- style="background-image: url(imagens/nav.png);" -->
            <img src="imagens/backCadastro.png" alt="Pascoa" width="100%" height="250" >
            <center>
            <img src="imagens/logo.png"  alt="Pascoa" width="30%" height="25%" style="position:absolute; top:2%; left:36%"></center>
                 
    </header>
    <body>
   <ul class="nav nav-pills" style="background-color: rgb(197, 106, 106)">
            <li class="nav-item">
                <a class="nav-link " href="admin.php" style="color:aliceblue; font-size: 22px">Home</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color:aliceblue; font-size: 22px">Vendas</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="ManipulaVendas.php">Alterar</a>
                    </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" style="color:aliceblue; font-size: 22px" href="register.php">Cadastro</a>
            </li>
                        
            <li>
                <a class="nav-link" style="color:aliceblue; font-size: 22px" href="CadastroProdutoTeste.php">Bombom</a>
            </li>
                        
            <li>
                <a class="nav-link" style="color:aliceblue; font-size: 22px" href="CadastroOvoPascoa.php">Ovo de Páscoa</a>
            </li>
                        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:aliceblue; font-size: 22px" data-toggle="dropdown" href="#">Produto</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="alteraProduto.php">Alterar</a>
                    <a class="dropdown-item"  href="produtoPreco.php">Cadastrar</a></div>
                </div>        
            </li>
            
            <li>
                <a class="nav-link" style="color:aliceblue; font-size: 22px" href="produtoVendedor.php">Produtos dos vendedores</a>
            </li>
        </ul>
          <a style="position:absolute; top:2%; left:95%;background: transparent;" href="logout.php">Sair</a><br><br>
                        <h3 style="font-family: Arial,sans-serif;
                        font-size: 20px;position:absolute; top:2%; left:80%;background: transparent;">Seja bem vindo, <?php echo $user?></h3><br>
            <!--<div class="modal fade" id="myModal">-->
            <!--                  <div class="modal-dialog">-->
            <!--                    <div class="modal-content">-->
                                
                                  <!-- Modal Header -->
            <!--                      <div class="modal-header">-->
            <!--                        <h4 class="modal-title">Sabor</h4>-->
            <!--                        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--                      </div>-->
            <!--                      <div class="modal-body">-->
            <!--                      <form method="POST" action="CadastroSabor.php">-->

            <!--                          <p> -->
            <!--                              <label for="nome">Nome sabor:</label>-->
            <!--                              <input type="text" id="nome"  name="nome"  required="required"  />-->
            <!--                            </p>-->
                                  
                                    
            <!--                          <label>Descrição:</label><input type="text" name="descricao" id="descricao"><br>-->
            <!--                          <div class="button">-->
            <!--                          <button type="submit" id="cadastrar" name="cadastrar">  <img src="imagens/addverde.png" width="60px" height="60px"  title="Cadastrar sabor"></button>-->
                                   
            <!--                          <button type="submit" id="delete" name="delete">  <img src="imagens/delete.png" width="60px" height="60px"title="Deletar sabor" ></button>-->
                                    
            <!--                          <button  id="addDescricao" name="addDescricao">  <img src="imagens/alterar.png" width="60px" height="60px"title="Alterar descrição" ></button>-->
                                   
            <!--                          </div>-->
                                  
            <!--                      </div>-->
       
            </body>
</html>
