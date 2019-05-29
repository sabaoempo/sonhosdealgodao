<?php session_start();
include('incluirhtml.php'); 
        
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;
        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
        
        
?>
<head>Finalizar Compra</head>
<div class="container">
    <div class="row">
        <br><br>
        <div class="col-md-12 col-lg-12 col-sm-12">
            <h5>Para finalizar a compra, preencha seus dados:</h5>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <center>
            <br><br>
            <form action="finalizaCompra.php" method="POST">
                <label>Nome:</label><input class="form-control" type="text" name="name" placeholder="Seu nome" required="required">
                <label>E-mail:</label><input class="form-control" type="text" name="email" placeholder="seuemail@email.com" required="required">
                <label>Telefone:</label><input class="form-control" type="text" name="cell" placeholder="(99)99999-9999" required="required">
                <label>Forma de pagamento:</label><input class="form-control" type="text" name="payment" placeholder="dinheiro, boleto..." required="required">
                <br><br>
                <input type="submit" name="confirm" value="Enviar" class="btn btn-success">
            </form></center>
        </div>
    </div>
</div>

<?php

if(isset($_POST['confirm'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $payment = $_POST['payment'];
    $size = sizeof($_SESSION['cart'])/3;
    $array = $_SESSION['cart'];
    $l = 0;
    $m = 1;
    $n = 2;
    for($i = 0;$i < $size;$i++){
        mysqli_query($db, "INSERT INTO vendasteste(NomeCliente, EmailCliente, TelefoneCliente, Pagamento, NomeProduto, Quantidade, PrecoProduto) VALUES('$name', '$email', '$cell', '$payment', '$array[$l]', '$array[$m]', '$array[$n]')");
        $l += 3;
        $m += 3;
        $n += 3;
    }
    unset($_SESSION['cart']);
    Print "<script>alert('Pedido realizado com sucesso!');</script>";
    
    
}

?>
<?php include('footer.php'); mysqli_close($db);?>
