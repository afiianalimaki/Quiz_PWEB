<?php
session_start();
require 'konek.php';

#cek
if( isset($_COOKIE['id']) && isset($_COOKIE['user'])){
    $id = $_COOKIE['id'];
    $user = $_COOKIE['user'];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    #cek username
    if( $user === hash('whirlpool', $row['username'])){
        $_SESSION['login'] = true; 
    }

}

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    

#cek username
if(mysqli_num_rows($result) === 1){

    #cek password
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row ["password"])){

        $_SESSION["login"] = true;
        
        #add cookie
        if ( isset($_POST['remember'])){
            #COOKIE
            setcookie('id', $row['id'], time()+ 3600);
            setcookie('user', hash('whirlpool', $row['username']));
        }
        header("Location: index.php");
        exit;
    }
}  
}
?>