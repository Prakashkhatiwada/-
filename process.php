<?php
if(isset($_POST['register'])){
$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// connect database 
$con = mysqli_connect('localhost','root','dmc'); //database
if($con){
    $query = "INSERT INTO register(username,password,address,phone) VALUES('$username','$password','$address','$phone')";
    $result = mysqli_query("con,$query");
    if($result){
        echo"<h1><Data inserted</h1>";

    }
}



}
?>
