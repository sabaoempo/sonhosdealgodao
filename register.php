<html>
    <head>
        <title>Entrar</title>
        <?php
            $host = "localhost";
            $banco = "sonhosdealgodao_sonhos";
            $user_banco = "sonhosdealgodao_teste";
            $pass_user = "$0nh0_d3_algodao";
        ?>
        <link rel="stylesheet" type="text/css" href="register.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <header>
            <img src="imagens/header3.png" alt="Pascoa" width="100%" height="250" style="background-image: url(imagens/nav.png);">
       
          
       
                  
                
        </header>
    <body>
                <nav class="navbar navbar-expand-lg " style="background-color: rgb(197, 106, 106)">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item active">
                              <a class="nav-link" id="color:hover"href="index.php" type="bottom"  >Home </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Sobre Nós</a>
                            </li>
                           
                            <li class="nav-item">
                            <a href="login.php" class="nav-link">Entre</a></li>
                            <li class="nav-item">
                            <a href="register.php" class="nav-link">Cadastre-se</a></li>
                            
                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pedidos</a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Bombom</a>
                                  <a class="dropdown-item" href="#">Ovo</a>
                      
                                </div>
                              </li>
                           
                           
                          </nav>
                    <div class="container">
                        <div class="row">
                            <div id="msg" class="col-sm-10 offset-sm-1 ">
                                <!--<div class="alert alert-warning">Contato não encontrado.</div>-->
                            </div>
                        </div>
                        <form id="form-contato" action="register.php" method="POST">
                                <form>
                            <div class="form-group row">
                                <!-- <div class="col-sm-4">
                                    <div class="logo">
                                        <img src="imagens" width="350px" height="250px">
                                    </div> -->
                                </div>
            
                                <div class="container">
                                        <div class="row">
                                            <div id="msg" class="col-sm-10 offset-sm-1 ">
                                                <!--<div class="alert alert-warning">Contato não encontrado.</div>-->
                                            </div>
                                        </div>
                                        <form id="form-contato">
                                            <div class="form-group row">
                                                
                            
                                                <div class="col-sm-8">
                                                    <center>
                                                        <div id="login-box-interno">
                                                            <div class="cadastro">
                                                                <h1>Cadastro</h1>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="nome" id="form--data__username" name="userusername" required="required" required placeholder="Informe o nome de Usuário">
                                                                
                                                                <input type="password" name="userpassword" class="senha" id="inputSenha" required placeholder="Senha">
                                                                <br>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="submit" class="cadastrar" id="btnInsert" value="Registrar">
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                        </form>
                        </form>
                    </div>
            
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
    <?php
    
    //verifica se a requisição feita pelo formulário foi POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       $user = $_REQUEST['userusername'];
       $pass = $_REQUEST['userpassword'];
        
        //função que aceita caracteres especiais do utf-8. Encapsula as strings e manda de um jeito seguro pro db. Porém não serviu de nada
        //$username = mysqli_real_escape_string($user);
        //$password = mysqli_real_escape_string($pass);
        $bool = true;
        
        //método que faz a conexão com o banco de dados
        $con = mysql_pconnect($host, $user_banco, $pass_user) or die(mysql_error());
        
        //seleciona o banco de dados para conectar
        mysql_select_db($banco, $con) or die("Não foi possível conectar ao banco de dados");
        
        //seleciona todos os usuários do banco de dados
        $query = sprintf("SELECT * FROM USERS");
        $dados = mysql_query($query, $con) or die(mysql_error());
        $linha = mysql_fetch_assoc($dados);
        //$total = mysql_num_rows($dados);
        
        //percorre a coluna de usuários do banco de dados (da variável em que ficou armazenada a matriz do db)
        do{
            $table_users = $linha['USERNAME'];
            
            //se o usuário já estiver na tabela, não permite cadastro
            if($user == $table_users){
                $bool = false;
                Print '<script>alert("Este nome de usuário já foi escolhido");</script>';
                Print '<script>window.location.assign("register.php");</script>';
            }
        } while($linha = mysql_fetch_assoc($dados));
        //se o usuário não estiver no banco de dados
        if($bool){
            
            //comando para inserir o usuário e sua senha na tabela "users" do banco de dados. 
                mysql_query("INSERT INTO users (username, password) VALUES ('$user', '$pass')");
            
           
            Print '<script>alert("Usuário registrado com sucesso!");</script>';
            Print '<script>Window.location.assign("index.php");</script>';
        }
        
        //print de teste pra ver se as variáveis estão sendo pegas
        //echo "Teste:";
        //echo "Username: " . $user;
        //echo "Password: " . $pass;
        mysql_free_result($dados);
    }
?>
</html>
