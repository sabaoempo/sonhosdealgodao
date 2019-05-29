<?php include('headAdmin.php'); 
include('preco.php');
    session_start();
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $connect;
        $cont = 0;

        $connect = mysqli_connect($servername, $user_db, $pass_db, $nome_db);
        mysqli_query($connect, "SET NAMES utf8");
        mysqli_query($connect, 'SET character_set_connection=utf8');
        mysqli_query($connect, 'SET character_set_client=utf8');
        mysqli_query($connect, 'SET character_set_results=utf8');
         
        mysqli_select_db($connect, $nome_db);
        $query_products = "SELECT * FROM products";
        $result = mysqli_query($connect, $query_products);
        $dados=mysqli_fetch_array($result);
       
        
        $query_sabor="SELECT * FROM sabor";
        $result_sabor= mysqli_query($connect, $query_sabor);
        $dadosSabor=mysqli_fetch_array($result_sabor); 
        
        
       
?>
<head>
     
     <link rel="stylesheet" type="text/css" href="produtoPreco.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Preço do produto</title>
</head>
<body>
 <div class="content">      
             <h1>Produtos</h1> 
              <div  class="table-css">
                          <table class="table" style="overflow-x:auto;">
                            <thead">
                              <tr class="table-text">
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Nome</th>
                                <th><a class="nav-link dropdown-toggle" style="color:white; " data-toggle="dropdown" href="#">Tamanho</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"  data-toggle="modal" data-target="#myModal2">Alterar</a>
                
                
                </div> </th>
                                <th>
                <a class="nav-link dropdown-toggle" style="color:white; " data-toggle="dropdown" href="#">Descrição</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"  data-toggle="modal" data-target="#myModal">Alterar</a>
                
                
                </div>        
              </th>
              
               <th>
                <a class="nav-link dropdown-toggle" style="color:white; " data-toggle="dropdown" href="#">Preço</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"  data-toggle="modal" data-target="#myModal">Alterar</a>
                
                
                </div>        
              </th>
              
               <th>
                <a class="nav-link dropdown-toggle" style="color:white; " data-toggle="dropdown" href="#">Imagem</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"  data-toggle="modal" data-target="#myModal">Alterar</a>
                
                
                </div>        
              </th>
                              </tr>
                            </thead>
                            <tbody>
                                
                               <?php
                        do {     
                               echo"<tr> <th>$dados[id]</th>";
                                echo"<th>$dados[type]</th>";
                                echo"<th>$dados[name]</th>";
                                echo" <th>$dados[size]</th>";
                                echo" <th>$dados[description]</th>";
                                echo" <th>$dados[price]</th>";
                                echo" <th>$dados[image]</th>";
                                
                             echo" </tr>";
                       
                        }while($dados = mysqli_fetch_array($result));
                    ?>
                            
                             
                            </tbody>
                          </table>
                        </div>
              <div id="produto">
                 <center>
                <form action="produtoPreco.php" method="POST">
                  <h1>Adicionar Produto</h1> 
                 
                  <div class="row">

<div class="col-md-6">
                  <p> 
                   <label class="label" for="date">Tipo: </label>
                    <select required="required"class="custom-select" id="tipo"  name="tipo" >
                        <option selected required="required" class="custom-select" id="tipo"  name="tipo">Selecionar tipo...</option>
                        <option>Bombom</option>
                        <option>Ovo</option>
                    </select>
                    </p>
                    </div>
                    <div class="col-md-6">
                    <label class="label" for="date">Sabor: </label>
                        <select required="required"  class="custom-select" id="sabor"  name="sabor" >
                                                            <option selected required="required" class="custom-select" id="sabor"  name="sabor">Selecionar sabor...</option>
                                                            <?php
                                                                do {     
                                                                    echo"<option required='required' id='sabor'  name='sabor'>$dadosSabor[nome]</option>";
                       
                                                                    }while($dadosSabor = mysqli_fetch_array($result_sabor));
                                                            ?> 
                                                    </select>
                   
                  </p>
                   </div>
                   <div class="col-md-6">
                  <p> 
                    <label for="email_login">Tamanho: </label>
                     <input type="text"   id="tamanho" name="tamanho"  required="required"     />
                  </p>
                  </div>
                  <div class="col-md-6">
                  <p> 
                    <label for="email_login">Preço: </label>
                     <input type="text"  id="preco" name="preco"  required="required"     />
                  </p>
                   </div>
                   <center>
                       <div class="col-md-6">
                  <p> 
                    <input type="submit" name="adicionar" value="Adicionar" /> 
                  </p>
                   </center>
                  </div>
                </form>
                </center>
              </div>
</div>

 <div class="container">
 
  <!-- Button to Open the Modal -->


  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
       
        <div class="modal-header">
          <h4 class="modal-title">Alterar Preço</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        
        <div class="modal-body">
            <form action="produtoPreco.php" method="POST">
                  <p> 
                    <label for="email_login">ID: </label>
                     <input type="text" id="ID" name="ID"  required="required"     />
                  </p>
                  
                  <p> 
                    <label for="email_login">Preço: </label>
                     <input type="text" id="preco" name="preco"  required="required"     />
                  </p>
                   
                  <p> 
                    <input type="submit" name="alterarPreco" value="alterarPreco" /> 
                  </p>
         
        </div>
        
      
        
      </div>
    </div>
  </div>
<!--   <div class="container">-->
 
  <!-- Button to Open the Modal -->


  <!-- The Modal -->
  <!--<div class="modal" id="myModal2">-->
  <!--  <div class="modal-dialog">-->
  <!--    <div class="modal-content">-->
      
       
  <!--      <div class="modal-header">-->
  <!--        <h4 class="modal-title">AlterarTamanho</h4>-->
  <!--        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
  <!--      </div>-->
        
 
  <!--      <div class="modal-body">-->
  <!--          <form action="produtoPreco.php" method="POST">-->
  <!--              <center>-->
  <!--                <p> -->
  <!--                  <label for="email_login">ID: </label>-->
  <!--                   <input type="text" style="position:center;" id="ID2" name="ID2"  required="required"     />-->
  <!--                </p>-->
                  
  <!--                <p> -->
  <!--                  <label for="email_login">Tamanho: </label>-->
  <!--                   <input type="text" id="tamanho" name="tamanho"  required="required"     />-->
  <!--                </p>-->
                   
  <!--                <p> -->
  <!--                  <input type="submit" name="alterarTamanho" value="alterarTamanho" /> -->
  <!--                </p>-->
  <!--       </center>-->
  <!--      </div>-->
        
      
        
      </div>
    </div>
  </div>
  
</div>
<?php include('footer.php'); ?>
</body>
