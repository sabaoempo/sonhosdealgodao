<html>
    <head>
        <?php include('functions.php'); 
        $id = $_GET[id];
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
        $query_vendor = "SELECT USERNAME FROM users WHERE ID = '$id'";
        $result = mysqli_query($db, $query_vendor);
        $vendorData = mysqli_fetch_array($result);
        $vendorName = $vendorData[USERNAME];
        ?>
        
    </head>
    <body>
        <center><h3>Dados do vendedor: <?php echo $vendorName ?></h3></center>
    </body>
    
</html>
