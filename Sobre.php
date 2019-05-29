<?php 
    session_start();
        include('incluirhtml.php'); 
        
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $connect;
        $cont = 0;

       $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_query($db, "SET NAMES utf8");
        mysqli_query($db, 'SET character_set_connection=utf8');
        mysqli_query($db, 'SET character_set_client=utf8');
        mysqli_query($db, 'SET character_set_results=utf8');
        
        
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030"><title>Sobre n車s</title></head>
<center>
    <h1> Sobre N車s</h1>
</center>

<div class="container">

        <div class="row">
            <div class="col-sm-12">
                <center>
                    <img src="uploads/ADM.jpg" alt="Nossa Cliente" style='heigth: 300px; width: 300px; border-radius: 50%; box-shadow: 10px 10px 5px lightgrey; margin-top: 10px; margin-bottom: 20px'>
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in feugiat erat. Curabitur iaculis quam sed elit aliquet, pulvinar ornare magna tincidunt. Aliquam eget aliquam urna. Quisque sed metus nulla. Quisque imperdiet cursus purus in blandit. Morbi placerat pharetra lacinia. Suspendisse lorem nunc, faucibus in condimentum id, ornare id sapien. Integer hendrerit auctor justo, vel commodo dui porttitor et. Suspendisse vulputate nisi mauris, at dapibus lorem convallis at. Nullam vestibulum rutrum sapien sagittis placerat. Nullam porttitor metus neque, nec pellentesque metus pellentesque eu.</h5>
                </center>
            </div>
            
            <div class="container">
        <center> <h5>Junte-se a n車s e seja um vendedor</h5> </center>
    <div class="row">
        
        <?php
                $query_products = "SELECT * FROM USERS WHERE USERTYPE = 'user' order by ID";
                $result = mysqli_query($db, $query_products);
                $product_info = mysqli_fetch_assoc($result);
            while($User_type = mysqli_fetch_assoc($result))
            {
                echo "<div class='col-md-4' style='margin-bottom: 25px'>
                        <center>
                            <img src='$User_type[IMAGE]' style='heigth: 150px; width: 150px; border-radius: 50%; box-shadow: 10px 10px 5px lightgrey; margin-top: 10px; margin-bottom: 20px'>
                                <h5>$User_type[USERNAME]</h5>
                        </center>
                     </div>";
            }
            // }while($User_type = mysqli_fetch_assoc($result));
            mysqli_close($db);
        ?>
    </div>
</div>

        </div>
    </div>
         <?php include('footer.php'); ?>
   
