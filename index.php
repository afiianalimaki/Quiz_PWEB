<?php 

session_start();
 

include 'koneksi.php';
 

$username = $_POST['username'];
$password = $_POST['password'];
 

$data = mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");
 

$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
    setcookie("message","delete",time()-1);
	header("Location: sukses.php");
    
}else{
    setcookie("message", "Mohon Maaf, Username atau Password salah", time()+3600);
    header("Location: login.php");
}
?>