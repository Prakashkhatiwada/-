



<?php
  if(isset($_POST['register'])){
   //  validate data
   $username = $_POST['username']; // unique
   $password = $_POST['password']; // encrypt
   $email = $_POST['email'];   // unique 
   $cpassword = $_POST['cpassword'];
   // password and confirm password check
   if($password != $cpassword){
    echo "<script>alert('Password does not match')</script>";
    exit();
   }
   //password encrpt
   $password = md5($password);

   $con = mysqli_connect("localhost","root","","user_login");
   if(!$con){
     echo "Connection Failed!";
   }else{
   	// check username and email is already
    // exist or not in the database.
    $checkSqlUsername = "SELECT * FROM users WHERE username='".$username."'";
    $resultUserCheck = mysqli_query($con,$checkSqlUsername);
    $checkEmail = "SELECT * FROM users WHERE email='".$email."'";
    $resEmail = mysqli_query($con, $checkEmail);
    if (mysqli_num_rows($resultUserCheck) > 0) {
        echo "<h2 style=color:red>Username is already registered!!!</h2>";
        die;
    }elseif(mysqli_num_rows($resEmail)>0){
            echo  "<h2>This Email Is Already Registered !</h2>";
            die;
    }else{
        $sqlInsert = "INSERT INTO users(username,password,email) VALUES('$username','$password','$email')";
        if(mysqli_query($con,$sqlInsert)){
            echo "Register data successfully!!!!";
        }else{
          echo "Failed to register data!!!";
        }
    }
    

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
<body>
    <h2>Registration form</h2>
    <form method="post" action="">
        <input type="text" name="username"  placeholder="Enter username"/>
        <br/> <br/>
        <input type="email" name="email"  placeholder="Enter email"/>
        <br/> <br/>
        <input type="password" name="password"  placeholder="Enter Password"/>
        <br/> <br/>
        <input type="password" name="cpassword"  placeholder="Enter Confirm Password"/>
        <br/> <br/>
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>

<?php
session_start();
if($_SESSION['username']){
    session_destroy();
    echo "<script>alert('logout Successful!');window.location='login.php';</script>";

}
?>




<?php
require_once ('config.php');  //include the config file

  if(isset($_POST['submit'])){
    // echo "hi";
    $username = $_POST["username"]; //
    $password = md5($_POST["password"]);
    //
    $sql = "SELECT * FROM users WHERE username='$username' OR email= '$username'";   //query to check whether user exists or not

    $result = mysqli_query($con,$sql);
    session_start();
    if($result){
        while($row=mysqli_fetch_array($result)) {
            $db_username=$row['username'];
            $db_email = $row['email'];
            $db_password=$row['password'];
              
            if($username==$db_username && $password==$db_password) {
               $_SESSION['username'] = $db_username;
                echo "<script>alert('Login Successful!');window.location='dashboard.php';</script>";
            }elseif($username==$db_email && $password==$db_password){
                $_SESSION['username'] = $db_username;
                echo "<script>alert('Login Successful!');window.location='dashboard.php';</script>";
            }else{
                echo "try again";
            }

        }
        
    }else{
        echo "sorry";
    }
    
  }

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <label for="username">username: </label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password: </label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>

<?php
session_start();
if($_SESSION['username']){
    echo "welcome to admin panel ".$_SESSION['username'];
    echo "<a href='logout.php'>LogOut</a>"; 
}else{
    echo "<script>alert('Please Goto login page');window.location='login.php';</script>";

    

}






?>

<?php
$con = mysqli_connect("localhost","root","","user_login");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
