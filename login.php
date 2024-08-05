<?php
if(isset($_POST['login'])){
    $username = $_POST['userame'];
    $password = $_POST['password'];
    $con = mysqli_connect('locolhost','root','abc'); //database
    $sql = "SELECT * FORM register WHERE username=='$username' AND password='$password'";
    $sql =mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<script>alert('login succesfully')</script>";
    }else{
        echo "<script>alert('sorry Try again')</script>";

    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<center>
<body>
    <form>
    
       <label>Username : </label>
       <input type="text" name="username"><br><br>
       <label>Password :</label>
       <input type="password" name="password"><br><br>
       <label>address : </label>
       <input type="text" name="address"><br><br>
       <label>phone : </label>
       <input type="text" name="phone"><br><br>
       <input type="submit" value="register" name="register">
</form>
</body>
</html>

