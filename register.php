<?php session_start(); include('functions.php') ?>
<?php include('headAdmin.php') ?>
<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" type="text/css" href="register.css" />
        <!--<link rel="stylesheet" type="text/css" href="login.css" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--<link rel="stylesheet" type="text/css" href="index.css" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <title>Cadastrar Vendedor</title>
    </head>
    <body>
        <div class="container" >
            <a class="links" id="paracadastro"></a>
            <a class="links" id="paralogin"></a>
                 
            <div class="content">      
                <div id="login">
                    <form id="form-contato" action="register.php" method="POST">
                        <h1>Cadastro</h1> 
                        <p> 
                            <label for="nome_login">Nome</label>
                            <input id="nome_login" value="<?php echo $username;?>" name="username"  required="required" placeholder="ex.: ana_carolina"   type="text" />
                        </p>
                       
                        <p> 
                            <label for="email_login">E-mail</label>
                            <input id="email_login" type="email" class="email" name="email" value="<?php echo $email;?>" placeholder="e-mail" /> 
                        </p>
    
                        <p> 
                            <label for="nome_login">Senha</label>
                            <input id="nome_login" type="password" name="password_1" required="required" placeholder="Senha" />
                        </p>
                           
                        <p> 
                            <label for="email_login">Confirme a senha</label>
                            <input id="email_login" type="password" name="password_2" placeholder="confirme sua senha" /> 
                        </p>
                       
                        <p> <input type="submit"  id="btnInsert" value="Cadastrar" name="register_btn"> </p>
                       
                    </form>
                </div>
            </div>    
        </div>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <?php include('footer.php'); ?>
</html>
   
