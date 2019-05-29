<?php session_start(); 
include('incluirhtml.php');

    
    $_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $servername = 'localhost';
    $nome_db    = 'sonhosdealgodao_sonhos';
    $user_db    = 'sonhosdealgodao_dev';
    $pass_db    = '$0nh0_d3_algod4o';
    $db;
    $cont = 0;

    $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
    mysqli_query($db, "SET NAMES 'utf8'");
    mysqli_query($db, 'SET character_set_connection=utf8');
    mysqli_query($db, 'SET character_set_client=utf8');
    mysqli_query($db, 'SET character_set_results=utf8');
    
    //queries
    $query_products = "SELECT * FROM PRODUCTS";
    //endqueries
    
    //sending queries to db
    $result = mysqli_query($db, $query_products);
    //end sending queries to db
    
    //getting data into array
    $product_info = mysqli_fetch_assoc($result);
    //end getting data into array
    
    
?>
<head><title>Fazer pedido</title></head>
<br><br><br>
<div class="container">
    <div class="row">
        
        <?php
        do
        {
            if($product_info['size'] != 0){
                echo "<div class='col-md-6' style='margin-bottom: 25px'><center><img src='$product_info[image]' style='heigth: 150px; width: 150px; border-radius: 10px; box-shadow: 10px 10px 5px lightgrey; margin-top: 10px; margin-bottom: 20px'><h5>$product_info[name]</h5><p>$product_info[description]</p><p style='font-size: small'>$product_info[size] gramas</p><b style='display: block; margin-bottom: 10px'>R$$product_info[price]</b><a style='color: white; background-color: lightpink; border-radius: 5px; padding: 5px' href='pedido.php?id=$product_info[id]'>Comprar</a><center></div><br><br>";
            } else {
            echo "<div class='col-md-6' style='margin-bottom: 25px'><center><img src='$product_info[image]' style='heigth: 150px; width: 150px; border-radius: 10px; box-shadow: 10px 10px 5px lightgrey; margin-top: 10px; margin-bottom: 20px'><h5>$product_info[name]</h5><p>$product_info[description]</p><b style='display: block; margin-bottom: 10px'>R$$product_info[price]</b><a style='color: white; background-color: lightpink; border-radius: 5px; padding: 5px' href='pedido.php?id=$product_info[id]'>Comprar</a><center></div><br><br>";
            }
                
        } while($product_info = mysqli_fetch_array($result));
        ?>
    </div>
</div>
<?php include('footer.php'); mysqli_close($db);?>
