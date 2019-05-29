<?php
$db = mysqli_connect('localhost', 'sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos') or die(mysqli_error());


if (isset($_POST['register_btn'])) {
    register();
}

if (isset($_POST['login'])) {
    login();
}

function register()
{
    global $db;
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if ($password_1 != $password_2) {
        Print '<script>alert("As senhas não coincidem.");</script>';
    }
    
    else {
            $password = md5($password_1);
            $query = "INSERT INTO users (USERNAME, EMAIL, USERTYPE, PASSWORD, IMAGE) VALUES ('$username','$email','user','$password', 'perfil/anon.svg')";
            mysqli_query($db, $query);
            $queryUser = 'SELECT * FROM users WHERE password_1 = '.$password;
            $result = mysqli_query($db, $queryUser);
            $userData = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $userData['username'];
            // echo $_SESSION['user'];
            Print '<script>alert("Registro feito com sucesso");</script>';
            
        
    }
}

function getUserById($id)
{
    global $db;
    $query  = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);
    $user   = mysqli_fetch_array($result);
    return $user;
}

function isUser($username){
    $db = mysqli_connect('localhost', 'sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos') or die(mysqli_error());
    $query = "SELECT * FROM users WHERE USERNAME='$username' AND USERTYPE='user'";
    $result = mysqli_query($db, $query);
    $exists = mysqli_num_rows($result);
    return $exists >= 1? true : false;
}

function isAdmin($username){
    $db = mysqli_connect('localhost', 'sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos') or die(mysqli_error());
    $query = "SELECT * FROM users WHERE USERNAME='$username' AND USERTYPE='admin'";
    $result = mysqli_query($db, $query);
    $exists = mysqli_num_rows($result);
    return $exists >= 1? true : false;
}

function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    echo '<div class="error">';
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
    echo '</div>';
}



function login()
{
    global $nome_db;
    $db = mysqli_connect('localhost', 'sonhosdealgodao_dev', '$0nh0_d3_algod4o', 'sonhosdealgodao_sonhos') or die(mysqli_error());
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query    = "SELECT USERNAME FROM users WHERE USERNAME = '$username' AND PASSWORD =md5('$password')";
    mysqli_select_db($nome_db, $db);
    $result   = mysqli_query($db, $query);
    $row      = mysqli_num_rows($result);
    if(isUser($username) == true){
        $_SESSION['user'] = $username;
        Print '<script>window.location="home.php";</script>;';
        exit();
    } else if (isAdmin($username) == true){
        $_SESSION['user'] = $username;
        Print '<script>window.location="admin.php";</script>';
        exit();
    } else {
        Print '<script>alert("Você não tem acesso a essa página");</script>';
    }
    
    
    
}

function isLoggedIn(){
    // if(isset($_SESSION['user'])){
    //     return true;
    // } else {
    //     return false;
    // }
    return isset($_SESSION['user'])? true : false;
}

mysqli_close($db);
?>
