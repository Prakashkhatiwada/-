<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    
</html>
<html >
<head>
</head>
<body>
    <h2> login form</h2>
    <form action="" method="post">
        Username <input type="text " name="username" ><br><br>
        Password <input type="password " name="password"><br><br>
        <input type="submit" name="login" value="login"><br><br>
        <a href="a"> Lost your password?</a> <br><br>
        Dont'have an account? <a href="a">Signup here</a>
</form>
</body>
</html>
<?php

if(isset( $_POST['loin'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    $con =mysqli_connect("localhost","root","","TU");
    $sql ="SELECT * FROM user WHERE username='$username' AND password='password'";
    if(mysqli_query($con,$sql)){
        echo "login successfully!!!!";
    }else{
        echo "sorry try again!!";
    
       }  

    }
?>