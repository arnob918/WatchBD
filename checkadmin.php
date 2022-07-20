<?php
session_start();
if(isset($_SESSION['logged_in']))
{
    if($_SESSION['is_admin'] == 0){
        $_SESSION['message'] = "You are not an admin";
        header('Location: index.php');
        exit();
    }
}
else{
    $_SESSION['message'] = "Not logged in";
    header('Location: login.php');
}

?>