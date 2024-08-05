<?php

$msgU = '';
$msgP = '';
if(isset($_POST['login'])){
    $username = check_data($_POST['txtuser']);
    $password = check_data($_POST['txtpass']);
    if(empty($username)){
        $msgU = "Place enter valid username";
    }else if(empty($password)){
        $msgP = "Please enter valid password";
    } else {
        echo "Data inserted";

    }
    }
    function check_data($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>server side validation</title>
</head>
<body>
    <h2>Form validation </h2>
    <form method="post" action="">
        <input type="text" name="txtuser" placeholder="enter user name">
        <p style="color:red"><?php echo $msgU;?></p>
        <input type="password" name="txtpass" placeholder="enter password">
        <p style="color:red"><?php echo $msgP;?></p>
        <input type="submit" name="login" value="login">


</body>
</html>