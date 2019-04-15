<?php
session_start();
$servername = 'localhost';
$nome_db    = "sonhosdealgodao_sonhos";
$user_db    = "sonhosdealgodao_dev";
$pass_db    = "$0nh0_d3_algod4o";
$db;

$db = mysqli_connect($servername, $user_db, $pass_db, $nome_db) or die(mysqli_error());

$username = "";
$email    = "";
$errors   = array();

if (isset($_POST['register_btn'])) {
    register();
}

if (isset($_POST['login'])) {
    login();
}

function register()
{
    global $db, $errors, $username, $email;
    
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    
    
    if (empty($username)) {
        array_push($errors, "Por favor, insira um nome de usuário.");
    }
    if (empty($email)) {
        array_push($errors, "Por favor, digite um endereço de e-mail.");
    }
    if (empty($password_1)) {
        array_push($errors, "Por favor, insira uma senha.");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "As duas senhas não coincidem.");
        Print '<script>alert("As senhas não coincidem.");</script>';
    }
    
    if (count($errors) == 0) {
        $password = md5($password_1);
            $query = "INSERT INTO users (USERNAME, EMAIL, USERTYPE, PASSWORD) VALUES ('$username','$email','user','$password')";
            mysqli_query($db, $query);
            $logged_in_user_id   = mysqli_insert_id($db);
            $_SESSION['user']    = getUserById($logged_in_user_id);
            $_SESSION['success'] = "Você está cadastrado";
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
    global $db;
    $query = "SELECT * FROM users WHERE USERNAME='$username' AND USERTYPE='user'";
    $result = mysqli_query($db, $query);
    $exists = mysqli_num_rows($result);
    return $exists >= 1? true : false;
}

function isAdmin($username){
    global $db;
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
    global $db, $nome_db;
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
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
    }
    
    
    
}

function isLoggedIn(){
    if(isset($_SESSION['user'])){
        return true;
    } else {
        return false;
    }
}

mysqli_close($db);
?>
