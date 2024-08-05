<?php
$result = null;
if(isset($_POST['btnAdd'])) {
    $fnum = $_POST['txtf'];
    $snum = $_POST['txts'];
    $result = $fnum + $snum;
}
if(isset($_POST['btnSub'])) {
    $fnum = $_POST['txtf'];
    $snum = $_POST['txts'];
    $result = $fnum - $snum;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Simple Calculator</title>
</head>
<body>
<center><h1>Simple Calculator</h1>
<form action="" method="POST">
    <label>First Number</label>
    <input type="number" name="txtf"><br><br>
    <label> Second Number</label>
    <input type="number" name="txts"><br><br>
    <label> Result:-</label>
    <input type="text"name="txtResult" value="<?php echo $result; ?>"<br><br>
    <input type="submit" name="btnAdd" value="+">
    <imput type="submit" name="btnSub" value="-">
 </form>
</center>
</body>
</html>

