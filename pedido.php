<?php session_start();
include("incluirhtml.php");

ob_start();
$db = mysqli_connect('localhost', 'sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos') or die(mysqli_error());
mysqli_query($db, "SET NAMES 'utf8'");
mysqli_query($db, 'SET character_set_connection=utf8');
mysqli_query($db, 'SET character_set_client=utf8');
mysqli_query($db, 'SET character_set_results=utf8');
$id = $_GET[id];
$query_product = "SELECT * FROM PRODUCTS WHERE ID = '$id'";
$result = mysqli_query($db, $query_product);
$product_info = mysqli_fetch_assoc($result);
$name = $product_info['name'];
$price = $product_info['price'];
?>
<head><title>Pedido</title></head>
<body>
    <div class="container">
        <div class="row"><?php 
    
                echo "<div class='col-md-4'><center><br><br><h5>$product_info[name]<h5></center><br><br><center><img src='$product_info[image]' style='heigth: 200px; width: 200px; border-radius: 20px; box-shadow: 10px 10px 10px lightgrey'></center><br><br></div>";
    
            ?>
            <div class="col-md-4 offset-md-2"><center>
                <form method="POST" action="pedido.php?id=<?php echo $id;?>">
                    <label>Quantidade:</label><input type="number" name="amount" class="form-control"><?php //$db = mysqli_connect('localhost', 'sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos') or die(mysqli_error());
                    $amount = $_POST['amount'];?>
                     <input type="submit" name="btn-register" value="Fazer pedido!" class="btn btn-success"></center><?php
                        if(isset($_POST['btn-register'])){
                            mysqli_query($db, "SET NAMES 'utf8'");
                            mysqli_query($db, 'SET character_set_connection=utf8');
                            mysqli_query($db, 'SET character_set_client=utf8');
                            mysqli_query($db, 'SET character_set_results=utf8');
                            $query_product = "SELECT * FROM products WHERE ID = '$id'";
                            $result = mysqli_query($db, $query_product);
                            $product_info = mysqli_fetch_array($result);
                            $name = $product_info['name'];
                            $price = $product_info['price'];
                            $_SESSION['cart'][] = $name;
                            $_SESSION['cart'][] = $amount;
                            $_SESSION['cart'][] = $price;
                            Print "<script>window.location='cart.php';</script>";
                    }?>
                </form>
                <br><br>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body><?php

mysqli_close($db);
ob_end_flush();
?>
