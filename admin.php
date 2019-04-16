<html>
    <?php
        include('functions.php');
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
        $query_vendor = "SELECT * FROM users WHERE ID != 4";
        $result = mysqli_query($db, $query_vendor);
        $vendorData = mysqli_fetch_array($result);
        
    ?>
    <head>
        
    </head>
    <?php
        session_start();
        if(!isAdmin($_SESSION['user'])){
            Print '<script>alert("Você não tem acesso a essa página");</script>';
            session_destroy();
            Print '<script>window.location="index.php";</script>';
        } else {
            include('incluirhtml.php');
            $user = $_SESSION['user'];
        }
        
    ?>
    <body>
        <h3>Seja bem vindo, <?php echo $user?></h3><br>
        <a href="logout.php">Sair</a><br><br>
        <a href="ManipulaVendas.php">Administrar vendas</a>
        <center>
            <table>
                <tr>
                    <th>
                        Vendedores
                    </th>
                </tr>
                <?php
                    do{
                        echo "<tr><td><a href='vendorData.php?id=".$vendorData[ID]."' target='_blank' class='$vendorData[ID]'>$vendorData[USERNAME]</a></td></tr>";
                    }while($vendorData = mysqli_fetch_array($result));
                ?>
            </table>
        </center>
    </body>
</html>
