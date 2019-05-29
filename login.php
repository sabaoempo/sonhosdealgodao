<?php session_start(); include('functions.php'); ?>
<?php include('incluirhtml.php')?>
<html>
    <head>
          <link rel="stylesheet" type="text/css" href="login.css"/>
        <title>Entrar</title>
    </head>
    <body>
       <!-- <form action="login.php" method="POST">-->
       <!--Nome de usuário: <input type="text" value="<?php //echo $username;?>" name="username"  required="required" placeholder="ex.: ana_carolina"/> -->
      
       <!--<br/>-->
       <!--    Senha: <input type="password" value="<?php //echo $password;?>" name="password" required="required" /> <br/>-->
       <!--    <input type="submit" name="login" value="Login"/>-->
       <!-- </form>-->
        
        <div class="container" >
            <a class="links" id="paracadastro"></a>
            <a class="links" id="paralogin"></a>
            <div class="content">      
                <!--FORMULÁRIO DE LOGIN-->
                <div id="login">
                    <form action="login.php" method="POST">
                        <h1>Login</h1> 
                        <p> 
                            <label for="nome_login">Seu nome</label>
                            <input type="text" id="nome_login" value="<?php echo $username;?>" name="username"  required="required" placeholder="ex.: Meu Nome"    />
                        </p>
                          
                        <p> 
                            <label for="email_login">Sua senha</label>
                            <input id="email_login" type="password" value="<?php echo $password;?>" name="password" required="required" placeholder="******"/> 
                        </p>
                           
                        <p> 
                            <input type="submit" name="login" value="Logar" /> 
                        </p>
                    </form>
                </div>
            </div>
        </div>      
    </body>
</html>
              <?php include('footer.php'); ?>
