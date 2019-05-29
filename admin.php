<html>
    <?php
        session_start();
        include('functions.php');
        $servername = 'localhost';
        $nome_db    = 'sonhosdealgodao_sonhos';
        $user_db    = 'sonhosdealgodao_dev';
        $pass_db    = '$0nh0_d3_algod4o';
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_query($db, "SET NAMES utf8");
        mysqli_query($db, 'SET character_set_connection=utf8');
        mysqli_query($db, 'SET character_set_client=utf8');
        mysqli_query($db, 'SET character_set_results=utf8');
        mysqli_select_db($db, $nome_db);
        $query_vendor = "SELECT * FROM users WHERE ID != 1";
        $result = mysqli_query($db, $query_vendor);
        $vendorData = mysqli_fetch_array($result);
        
        
        
        $query_pedidos="SELECT * FROM vendasteste";
        $query=mysqli_query($db,$query_pedidos);
        $dados=mysqli_fetch_array($query);
        
        
        
        $query_sabor="SELECT * FROM sabor";
        $result_sabor= mysqli_query($db, $query_sabor);
        $dadosSabor=mysqli_fetch_array($result_sabor); 
        
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="admin.css" />
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <style>
        
    *{
        box-sizing: border-box;
    }
    
    thead{
        width: 100%;
        background-color: #fadbd8;
    }
    
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    overflow-x:auto;
    box-shadow: 10px 10px 10px 20px #fadbd8;
    }

    td, th {
    border: 1px solid #ffffff;
    text-align: justify;
    vertical-align: text-bottom;
    word-break: normal;
    text-shadow: 2px;
    }

    tr:nth-child(even) {
    background-color: #fadbd8;
    }
    
     h1{
    font-size: 10px;
    color: rgb(197, 106, 106);
    /* color: rgb(197, 106, 106); */
    padding: 2px 10px 10px 10px;
    font-family: Arial,sans-serif;
    font-weight: bold;
    text-align: center;
    padding-bottom: 30px;
  }
    h1:after{
    content: ' ';
    display: block;
    width: 100%;
    height: 2px;
    margin-top: 10px;
    background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgb(197, 106, 106) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
    /*background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgb(197, 106, 106)) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%);*/
    
    }
    </style>
    <?php
        
        // if(!isAdmin($_SESSION['user'])){
        //      Print '<script>alert("Você não tem acesso a essa página");</script>';
        //      session_destroy();
        //      Print '<script>window.location="index.php";</script>';
        //  } else {
        //     // include('incluirhtml.php');
        //     $user = $_SESSION['user'];
        // }
        
    ?>
    
    <header>
        <script> function view(id){ window.location='detalheVenda.php?id='+id; } </script>
        <img src="imagens/header3.png" alt="Pascoa" width="100%" height="150" >
        <!--<img src="imagens/backCadastro.png" alt="Pascoa" width="100%" height="180" >-->
        
        <!--<center>-->
        <!--    <img src="imagens/logo.png"  alt="Pascoa" width="20%" height="15%" style="position:absolute; top:4%; left:45%">-->
        <!--</center>-->
        
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
    </header>
    
    <body>
        <div class="row">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <ul class="links">
                        <?php
                            do{
                                echo "<li><a  href='vendorData.php?id=".$vendorData[ID]."' target='_blank'>$vendorData[USERNAME]</a> </li>"; 
                               }while($vendorData = mysqli_fetch_array($result));
                        ?>
                    </ul>
            </div> 
            <span onclick="openNav()" style="padding-left:15px; background-color:rgb(197, 106, 106);"><img src="imagens/menu1.png" width="50px" height="50px"> </span>
            
            <a style="position:absolute; top:2%; left:95%;background: transparent;" href="logout.php">Sair</a><br><br>
            <h3 style="font-family: Arial,sans-serif; font-size: 20px;position:absolute; top:2%; left:80%;background: transparent;">Seja bem vindo, <?php echo $_SESSION['user'];?></h3><br>
            <script src="//code.jquery.com/jquery.min.js"></script>
            
            
            
            <div class="col-md-10  col-xs-10 " >   
                <div class="container">
                        
                        <ul class="nav nav-tabs">
                            <li class="active" style=" font-family: Tahoma, Geneva, sans-serif;  font-weight: bold;"><a data-toggle="tab" href="#home">Pedidos</a></li>
                            <li style=" font-family: Tahoma, Geneva, sans-serif;  font-weight: bold;"><a data-toggle="tab" href="#menu1">Período</a></li>
                            <li style=" font-family: Tahoma, Geneva, sans-serif;  font-weight: bold;"><a data-toggle="tab" href="#menu2">Data</a></li>
                        </ul>
                        
                        <div class="tab-content" style=" overflow-x:auto;">
                            <div id="home" class="tab-pane fade in active">
                                <table class="table table-bordered" style="overflow-y:auto;">
                                    <thead>
                                        <tr class="table-text">
                                            <th>ID                </th>
                                            <th>Nome Cliente      </th>
                                            <!--<th>Email         </th>-->
                                            <th>Telefone          </th>
                                            <th>Forma de Pagamento</th>
                                            <th>Produto           </th>
                                            <th>Quantidade        </th>
                                            <th>Preço Total       </th>
                                            <th>Status de Venda   </th>
                                            <th>-----------       </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            do {     
                                                echo"<tr> <th>$dados[ID]</th>";
                                                echo"<th>$dados[NomeCliente]</th>";
                                                // echo"<th>$dados[EmailCliente]</th>";
                                                echo" <th>$dados[TelefoneCliente]</th>";
                                                echo" <th>$dados[Pagamento]</th>";
                                                echo" <th>$dados[NomeProduto]</th>";
                                                echo" <th>$dados[Quantidade]</th>";
                                                echo" <th>$dados[PrecoTotalCompra]</th>";
                                                if($dados[foiVendido]==0){
                                                    echo"<th class='text-danger'>Não Vendido</th>";
                                                }else{
                                                    echo"<center><th class='text-success'>Vendido</th></center>";
                                                }
                                        ?>
                                        
                                                <td class='actions text-right'>
                                                    <button class='btn btn-sm btn-success' onclick="view('<?php echo $dados['ID']?>');">Visualizar </button> 
                                                </td>
                                              
                                                <?php
                                                   }while($dados = mysqli_fetch_array($query));
                                                ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <div id="menu1" class="tab-pane fade" style="padding-bottom:50px;">
                                <div class="top">
                                    <center>
                                        <form method = "POST" name="formulario" action = "imprimeLucro.php">
                                            <fieldset id = "data"> 
                                                <p class="titulo" style="color:rgb(197, 106, 106);">Seleção de período de busca:</p>
                                                <input type = "radio" name = "periodo" id = "umaSemana" value = "Uma Semana"/><label for = "umaSemana">Uma Semana</label><br/>
                                                <input type = "radio" name = "periodo" id = "umMes" value = "Um Mês"/><label for = "umMes">Um Mês</label>
                                            </fieldset>
                                            <input class = "button" type = "submit" name = "Submit" value = "enviar"> 
                                        </form>
                                    </center>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade" style="padding-bottom:50px;">
                                 <div class="top">
                                    <center>
                                        <form method = "POST" name = "formulario" action = "calculaQualquerPeriodo.php">
                                            <fieldset id = "data">
                                                <center><p class="titulo" style="color:rgb(197, 106, 106);">Seleção de data de busca:</p></center>
                                                <label for="email_login">Data Inicial: </label>
                                                <input style= "border-radius:20px;"type = "date" name = "dataInicio" id = "ini" size = "10" maxlength = "10" placeholder = "Ano-Mês-Dia"/>
                                                <br>
                                                <label for="email_login">Data Final: </label>
                                                <input style= "border-radius:20px;" type = "date" name = "dataFim" id = "fim" size = "10" maxlength = "10" placeholder = "Ano-Mês-Dia"/>
                                                <br>
                                                <center><input class = "button" type = "submit" name = "Submit" value = "enviar"></center> 
                                            </fieldset>
                                        </form>
                                    </center>
                                </div>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
        
                    <!--<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">-->
                    <!--        <div class="modal-dialog">-->
                    <!--            <div class="modal-content">-->
                    <!--                    <div class="bs-example bs-example-tabs">-->
                    <!--                            <ul id="myTab" class="nav nav-tabs">-->
                    <!--                                <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Cadastrar</a></li>-->
                    <!--                                <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Deletar</a></li>-->
                    <!--                                <li id="tab3" class=" tab-style "><a href="#alterar" data-toggle="tab">Alterar Descrição</a></li>-->
                    <!--                            </ul>-->
                    <!--                    </div>-->
                    <!--                                    <div class="modal-body">-->
                    <!--                                            <div id="myTabContent" class="tab-content">-->
                    <!--                                                <div class="tab-pane fade active in" id="signin">-->
                    <!--                                                    <form method="POST" action="CadastroSabor.php">-->
                    <!--                                                        <fieldset>-->
                    <!--                                                                <div class="group">-->
                    <!--                                                                    <label class="label" for="date"   >Nome do sabor: </label>-->
                    <!--                                                                    <input required="required" class="input"id="nome"  name="nome" type="text"><span class="highlight"></span><span class="bar"></span>-->
                    <!--                                                                </div>-->
                    <!--                                                                <div class="group">-->
                    <!--                                                                    <label class="label" for="date">Descrição: </label>-->
                    <!--                                                                     <input class="input"  type="text" name="descricao" id="descricao"><span class="highlight"></span><span class="bar"></span>-->
                    <!--                                                                </div>-->
                                             
                    <!--                                                                <div class="control-group">-->
                    <!--                                                                    <label class="control-label" for="signin"></label>-->
                    <!--                                                                    <center>-->
                    <!--                                                                        <div class="controls">-->
                    <!--                                                                            <button type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary btn-block">Cadastrar</button>-->
                    <!--                                                                        </div>-->
                    <!--                                                                    </center>    -->
                    <!--                                                                 </div>-->
                    <!--                                                        </fieldset>-->
                    <!--                                                    </form>-->
                    <!--                                                </div>-->
                                            
                                            <!--Deletar-->
                                                                    <!--<div class="tab-pane fade" id="signup">-->
                                                                    <!--        <form method="POST" action="CadastroSabor.php">-->
                                                                    <!--            <fieldset>-->
                                                                    <!--                <div class="group">-->
                                                                    <!--                    <label class="label" for="date">Sabor: </label>-->
                                                                    <!--                    <select required="required" class="custom-select" id="nome"  name="nome" >-->
                                                                    <!--                            <option selected required="required" class="custom-select" id="nome"  name="nome">Selecionar sabor...</option>-->
                                                                    <!--                            
                                                                     <!--                                do {     
                                                                     <!--                                    echo"<option required='required' id='nome'  name='nome'>$dadosSabor[nome]</option>";-->
                                                           
                                                                     <!--                                    }while($dadosSabor = mysqli_fetch_array($result_sabor));
                                                                    <!--                            
                                                                    <!--                    </select>-->
                                                                    <!--                </div>-->
                                                                    <!--                <div class="control-group">-->
                                                                    <!--                    <label class="control-label" for="confirmsignup"></label>-->
                                                                    <!--                    <center>-->
                                                                    <!--                        <div class="controls">-->
                                                                    <!--                            <button type="submit" id="delete" name="delete" class="btn btn-primary btn-block">Deletar</button>-->
                                                                    <!--                        </div>-->
                                                                    <!--                    </center>    -->
                                                                    <!--                </div>-->
                                                                    <!--            </fieldset>-->
                                                                    <!--         </form>-->
                                                                    <!--</div>-->

                                        <!--Alterar-->
                                                                    <!--<div class="tab-pane fade" id="alterar">-->
                                                                    <!--        <form method="POST" action="CadastroSabor.php">-->
                                                                    <!--            <fieldset>-->
                                                                    <!--                <div class="group">-->
                                                                    <!--                    <label class="label" for="date">Sabor: </label>-->
                                                                    <!--                    <select required="required" class="custom-select" id="nome"  name="nome" >-->
                                                                    <!--                        <option selected required="required" class="custom-select" id="nome"  name="nome">Selecionar sabor...</option>-->
                                                                    <!--                             
                                                                     <!--                                $query_sabor="SELECT * FROM sabor";
                                                                    <!--                                $result_sabor= mysqli_query($db, $query_sabor);
                                                                    <!--                                $dadosSabor=mysqli_fetch_array($result_sabor); 
                                                                    <!--                                do {     
                                                                     <!--                                    echo"<option required='required' id='nome'  name='nome'>$dadosSabor[nome]</option>";-->
                                                                    <!--                                }while($dadosSabor = mysqli_fetch_array($result_sabor));
                                                                    <!--                             
                                                                    <!--                    </select>-->
                                                                    <!--                </div>-->
                                                                    <!--                <div class="group">-->
                                                                    <!--                    <label class="label" for="date">Descrição: </label>-->
                                                                    <!--                    <input class="input"  type="text" name="descricao" id="descricao"><span class="highlight"></span><span class="bar"></span>-->
                                                                    <!--                </div>    -->
                                                                                
                                                                    <!--                <div class="control-group">-->
                                                                    <!--                    <label class="control-label" for="confirmsignup"></label>-->
                                                                    <!--                    <center>-->
                                                                    <!--                        <div class="controls">-->
                                                                    <!--                            <button type="submit" id="addDescricao" name="addDescricao" class="btn btn-primary btn-block">Alterar</button>-->
                                                                    <!--                        </div>-->
                                                                    <!--                    </center>-->
                                                                    <!--                </div>-->
                                                                    <!--            </fieldset>-->
                                                                    <!--        </form>-->
                                                                    <!--</div>-->
                    <!--                                            </div>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="modal-footer">-->
                    <!--                                        <center>-->
                    <!--                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    <!--                                        </center>-->
                    <!--                                    </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--</div>-->
                
                <!--<div class="modal fade bs-modal-sm log-sign" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">-->
                <!--        <div class="modal-dialog">-->
                <!--            <div class="modal-content">-->
                  
                <!--                    <div class="modal-body">-->
                                         
                <!--                            <form method="POST" action="preco.php">-->
                <!--                                    <fieldset>-->
                <!--                                        <div class="group">-->
                <!--                                            <label class="label" for="date">Sabor: </label>-->
                <!--                                            <select required="required" class="custom-select" id="nome"  name="nome" >-->
                <!--                                                <option selected required="required" class="custom-select" id="sabor"  name="sabor">Selecionar sabor...</option>-->
                <!--                                               
                <!--                                            </select>-->
                <!--                                        </div>-->
                                                        
                <!--                                        <div class="group">-->
                <!--                                            <label class="label" for="date">Preço: </label>-->
                <!--                                            <input class="input"  type="text" name="preco" id="preco"><span class="highlight"></span><span class="bar"></span>-->
                <!--                                        </div>-->
                         
                <!--                                        <div class="control-group">-->
                <!--                                            <label class="control-label" for="signin"></label>-->
                <!--                                            <center>-->
                <!--                                                <div class="controls">-->
                <!--                                                    <button type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary btn-block">Cadastrar</button>-->
                <!--                                                </div>-->
                <!--                                            </center>    -->
                <!--                                        </div>-->
                <!--                                    </fieldset>-->
                <!--                            </form>-->
                <!--                    </div>-->
                <!--            </div>-->
                                            
                <!--        </div>-->
                    
                <!--        <div class="modal-footer">-->
                <!--            <center>-->
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <!--            </center>-->
                <!--        </div>-->
                <!--</div>-->
            <script>
                function openNav() {
                  document.getElementById("mySidenav").style.display = "block";
                //   document.getElementById("close").style.display = "block"
                }
                
                function closeNav() {
                  document.getElementById("mySidenav").style.display = "none";
                //   document.getElementById("close").style.display = "none"
                }
            </script>
            
            <script>
                $('button').click(function(){
                    $('a[href="#home"]').tab('show');
                })
                    
                    
                $(function(){
                    $('a[href="#home"]').tab('show');
                });

                $('a[href="#home"]').tab('show');
            </script>

    </body> 
</html> 
            
<?php mysqli_close($db);include('footer.php'); ?>
