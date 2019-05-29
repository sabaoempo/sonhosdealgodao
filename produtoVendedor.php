<?php
    session_start();
    include('functions.php');
    include('incluirhtml.php');
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
    $query_vendor = "SELECT * FROM productvendor WHERE 1";
    $result = mysqli_query($db, $query_vendor);
    $vendorData = mysqli_fetch_assoc($result);
?>
<head><title>Produtos do Vendedor</title></head>
<div class="container">
    <div class="row">
        
        <div class="col-md-6 offset-md-3"><br><br>
            <h3>Produtos repassados para os vendedores</h3>
        </div>
        <br><br>
        
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <br><br>
            <table class="table table-bordered" style="overflow-y:auto;">
                <thead>
                    <tr class="table-text">
                        
                        <th>ID</th>
                        <th>Vendedor             </th>
                        <th>Sabor      </th>
                        <th>Quantidade          </th>
                        <th>Tipo</th>
                        
                    </tr>
                </thead>
                
                    <?php
                        do {     
                            echo"<tr> <th>$vendorData[ID]</th> <th>$vendorData[VENDEDOR]</th> <th>$vendorData[SABOR] </th> <th>$vendorData[QUANTIDADE]</th>";
                            if($vendorData[TIPO] == 1)
                            echo "<th>Bombom</th>";
                            else
                            echo "<th>Ovo de Páscoa</th>";
                        }while($vendorData = mysqli_fetch_assoc($result));
                    ?>
                    
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <h5>Cadastrar produtos repassados para os vendedores</h5>
            
        </div>
    </div>
</div>


