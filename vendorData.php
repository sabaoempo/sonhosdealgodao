<html>
    <head>
        <?php session_start(); include('functions.php');
        include('headAdmin.php');
        $id = $_GET[id];
        $servername = 'localhost';
        $nome_db    = "sonhosdealgodao_sonhos";
        $user_db    = "sonhosdealgodao_dev";
        $pass_db    = "$0nh0_d3_algod4o";
        $db;

        $db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());
        mysqli_select_db($db, $nome_db);
        $query_vendor = "SELECT * FROM users WHERE ID = '$id'";
        $result = mysqli_query($db, $query_vendor);
        $vendorData = mysqli_fetch_array($result);
        $vendorName = $vendorData[USERNAME];
        $vendorEmail = $vendorData[EMAIL];
        $vendorGoal = $vendorData[GOAL];
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <link rel="stylesheet" type="text/css" href="vendorData.css" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
           <title>Dados do Vendedor</title>
    </head>
    <body>
        <div class="container">
                
            <center>    
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-6">
                        <h3 class="main--title__page">Dados do vendedor: <?php echo $vendorName ?></h3><br><br>
                        <h3 class="main--title__contact">Contato: <?php echo $vendorEmail ?></h3><br><br>
                        <h3 class="main--title__goal">Meta Mensal: <?php echo $vendorGoal ?></h3><br><br>
                    </div>
                    
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-6">
                        <form name="alter" method="POST" action="vendorData.php?id=<?php echo $id ?>">
                        
                        <label style="margin-top: 50px;">Nome:</label><input type="text" name="username" class="form-control" placeholder="novo nome..."><br>
                        <label>Contato:</label><input type="text" name="contact" class="form-control" placeholder="novo contato..."><br>
                        <label>Meta mensal:</label><input type="number" name="goal" class="form-control" placeholder="nova meta..."><br>
                        <input type="submit" name="send_data" value="Editar dados" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </center>
        </div>
        <?php include('footer.php'); ?>
    </body>
    <?php
    echo $id;
        if(isset($_POST['send_data'])){
            if(!empty($_POST['username'])){
                $username = $_POST['username'];
                $query_name = "UPDATE users SET USERNAME = '$username' WHERE ID='$id'";
                mysqli_query($db, $query_name);
            }
            if(!empty($_POST['contact'])){
                $contact = $_POST['contact'];
                $query_contact = "UPDATE users SET EMAIL = '$contact' WHERE ID='$id'";
                mysqli_query($db, $query_contact);
            }
            if(!empty($_POST['goal'])){
                $goal = $_POST['goal'];
                $query_goal = "UPDATE users SET GOAL = '$goal' WHERE ID='$id'";
                mysqli_query($db, $query_goal);
            }
        }
    ?>
    
</html>
