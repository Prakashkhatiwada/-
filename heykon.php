<!DOCTYPE html>
<html>
<head>
<title>Modern Login Window : CSS lab Assignment</title>
<style type="text/css">
body {
background: url("back.png");
background-size: 100%;
}
.login {
width: 380px;
height: 260px;
background: rgba(0, 0, 0, 0.6);
margin: auto;

margin-top: 100px;
border-radius: 5px;
color: white;
padding: 50px;
}
.login table {
width: 100%;
}
input[type="email"],
input[type="password"] {
width: 100%;
padding: 10px;
font-size: 16px;
}
a {
color: white;
}
input[type="button"] {
width: 105%;
color: blue;
padding: 10px 5px;
background: orange;
color: white;
font-size: 18px;
font-weight: bold;
}
#b1 {
font-size: 20px;
}
td,
th {
padding: 10px;
}
input[type="button"]:hover {
background: rgb(3, 202, 252);
}
</style>
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr =  "";
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";

  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
 
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</body>
<body>
<div class="login">
<form>
<table>
<tr>
<th><b id="b1">LOGIN WINDOW</b></th>
</tr>
<tr>
<td><input type="email" placeholder="Your Email Address" /></td>
</tr>
<tr>
<td><input type="password" placeholder="Your Password" /></td>
</tr>
<tr>
<td>
<input
id="ch1"
type="checkbox"
placeholder="Your Password"
/><label for="ch1">Agree With</label>
<a href="#">Terms & Condition</a>
</td>
</tr>
<tr>
<td><input type="button" value="Login" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>
