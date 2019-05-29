<?php
    session_start();
    unset($_SESSION['user']);
    echo "<script>alert('Desconetando...');window.location='index.php'</script>";
    
?>
