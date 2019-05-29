<?php session_start();
include('incluirhtml.php'); 
    $_SESSION['cart']=isset($_SESSION['cart'])? $_SESSION['cart'] : array();
        ob_start();
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;
        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
        $size = sizeof($_SESSION['cart'])/3;
        $keys = array_keys($_SESSION['cart']);
        $size = count($_SESSION['cart']);
        
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ffffff;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #fadbd8;
}

</style>
<head><title>Carrinho</title></head>
<?php
    if(!empty($_SESSION['cart'])){
        echo "";
    }
?>
;<table id = "yo">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Preço Unitário</th>
        <th>Preço Total</th>
        <th></th>
        <th></th>
    </tr><?php
    $l = 0;
    $m = 1;
    $n = 2;
        for($i = 0; $i < $size/3; $i++){
            echo "<tr><td>".$_SESSION['cart'][$l]."</td><td>".$_SESSION['cart'][$m]."</td><td>".$_SESSION['cart'][$n]."</td><td>".$_SESSION['cart'][$n]*$_SESSION['cart'][$m]."</td></tr>";
            $l += 3;
            $n += 3;
            $m += 3;
        }
    ?>
    
    
    
    
    
</table>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <br><br>
            <!--<center><h6>Total de itens no carrinho: </h6> <?php echo $size/3;?><br><br>-->
            <center><form method="POST" action="cart.php">
                <input type="submit" value="Remover tudo" name="remove" class="btn btn-danger">
            </form></center>
        </div>
        <div class="col-md-6"><br><br><center>
            <center><form method="POST" action="cart.php">
                <a class="btn btn-success" href="finalizaCompra.php">Finalizar Compra!</a>
                <!--<input value="Finalizar compra!" name="buy" class="btn btn-success">-->
            </form></center>
        </div>
    </div>
</div><?php

if(isset($_POST['remove'])){
    unset($_SESSION['cart']);
}
if ($_SESSION['cart'] == NULL)
    echo "Seu carrinho está vazio!";
ob_end_flush();
?>
<?php include('footer.php'); mysqli_close($db);?>
