<?php include('incluirhtml.php'); 
$servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;
        $cont = 0;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
        $query_products = "SELECT * FROM sabor";
        $result = mysqli_query($db, $query_products);
        $flavorData = mysqli_fetch_array($result);
?>
 <html>
        <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
            
            <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
            
            <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
            <!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
            <!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
            <!--    <link rel="stylesheet" type="text/css" href="index.css" />-->
            <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
            <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
            <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
            <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

                <title>Sonhos de Algod達o</title>
            </head>


        
        <!-- <script>$('.dropdown-toggle').dropdown()</script> -->


    <body>
        <form method="POST" action="CadastroProdutoTeste.php" >
            
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sabores</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="select_flavor">
                  <option selected>Selecione o Sabor</option>
                  <?php
                    do{
                        $cont++;
                      echo "<option value='$cont'>$flavorData[nome]</option>";
                    } while($flavorData = mysqli_fetch_array($result));
                  ?>
                  
                </select>
            

                
                    <div class="form-row col-md-6 offset-2">
                      <div class="col">
                            <input type="text" name="amount" class="form-control" placeholder="Quantidade">
                        </div>

                      <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Nome">
                      </div>

                      <div class="col">
                            <input type="text" name="contact" class="form-control" placeholder="Contato">
                      </div>

                    </div>
                
                
                
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Forma de Pagamento</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="select_payment">
                      <option selected>Selecione</option>
                      <option value="1">Cheque</option>
                      <option value="2">Dinheiro</option>
                      <option value="3">Cart達o</option>
                    </select>
                    <div class="col-sm-4">
                    <input type="submit" id="btn btn-primary" class="EnviarPedido" value="Enviar Pedido" name="btn-products"></input>
                    </div>
                
        </form>
</body>

  
 </html>
    
    
    
    
    
<?php
    
    
$servername = 'localhost';
$nome_db    = "sonhosdealgodao_sonhos";
$user_db    = "sonhosdealgodao_dev";
$pass_db    = "$0nh0_d3_algod4o";
$db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
    
    if (isset($_POST['btn-products']))
    {
        registerProduct();
    }    
    
    
    function registerProduct()
    {
        
        global $db;
        if(!$db){
            echo "deuruim";
        } else {
            echo "conectado";
        }
        
        $errors = 0;
        
        $select_flavor  = $_POST['select_flavor'];
        $select_payment = $_POST['select_payment'];
        $amount         = $_POST['amount'];
        $name           = $_POST['name'];
        $contact        = $_POST['contact'];
        
        
        if(empty($amount))
        {
            array_push($errors, "Por favor, insira a Quantidade desejada.");
        }
        if(empty($name))
        {
            array_push($errors, "Por favor, digite o Nome.");
        }
        if(empty($contact))
        {
            array_push($errors, "Por favor, insira o Contato.");
        }
        if(empty($select_flavor))
        {
            array_push($errors, "Por favor, insira o Sabor.");
        }
        if(empty($select_payment))
        {
            array_push($errors, "Por favor, insira a Forma de Pagamento.");
        }
        echo "estoy aqui";
        //if(count($errors) == 0)
        //{
            //$db = mysqli_connect($servername, $nome_db, $user_db, $pass_db) or die(mysqli_error());
            //if(isset($_POST['name']))
            //{
                echo "cara";
                $query               = "INSERT INTO products (select_flavor, amount, name, contact, select_payment) VALUES('$select_flavor', '$amount', '$name', '$contact', '$select_payment')";
                echo $query;
                mysqli_query($db, $query);
                //$_SESSION['success'] = "Produto Cadastrado";
                Print '<script>alert("cadastrowwww");</script>';
                
            //}
            //else 
            //{
                echo "insere dado ai parça";
            //}
        //}
        echo "querendo te fazer funcionar";
    }
    
    function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

    
   ?> 
    
