<!DOCTYPE html>
<html>
    <title>Halaman Login</title>
<head>
    <link href="css/tes.css" rel="stylesheet" media="screen"> 
</head>
<body>
<div style="color: black ;margin-bottom: 0px;">
    <?php
    if(isset($_COOKIE["message"])){ 
    echo $_COOKIE["message"];   
    }
    ?>
</div>
<h1>Login</h1>
<hr> <br><br>
<div class="login-form">
    <form method="post" action="index.php">
        <div class="form-group "> <input type="text" class="form-control" name="username" placeholder="Username"></div> <br>
        
        <div class="form-group log-status"> <input type="password" class="form-control" name="password" placeholder="Password"> <br><br> 

        <button type="submit" class="log-btn">Login</button>
    </form>
</div>
</body>
</html>


