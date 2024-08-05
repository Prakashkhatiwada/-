<?php
session_start();
if(isset($_SESSION['email'])){

?>
<style>
a {
text-decoration: none;
}
</style>
<form method="post">
<input type="submit" name="logout" value="logout" />
</form>

<?php
if(isset($_POST['logout'])) {
session_destroy();
echo "<script>alert('logout');window.location='login.php';</script>";
}
$conn = mysqli_connect("localhost","root","root","vac_BCA");
$sql = "SELECT * FROM register";
$result = mysqli_query($conn,$sql);
echo "<center><table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>username</th>";
echo "<th>Password</th>";
echo "<th>Email</th>";
echo "<th>Action</th>";
echo "</tr>";
while($row=mysqli_fetch_array($result)){
echo "<tr>";
echo"<td>".$row['id']."</td>";
echo"<td>".$row['username']."</td>";
echo"<td>".$row['password']."</td>";
echo"<td>".$row['email']."</td>";
echo "<td><a href='update.php?id=" . $row['id'] . "'>EDIT</a> || <a href='delete.php?idD=" . $row['id'] . "'>DELETE</a></td>";
echo "</tr>";
}
echo "</table></center>";

?>

<?php }else{
echo "<script>alert('Please Login First!');window.location='login.php';</script>";
}
?>