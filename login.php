<?php

session_start();
include("db_connect.php");

if(isset($_POST['username'])){

$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

$sql="SELECT * FROM users
WHERE username='$username'
AND password='$password'
AND role='$role'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$_SESSION['username']=$username;
$_SESSION['role']=$role;

header("Location: dashboard.php");

}
else{

echo "<script>
alert('Invalid Login');
window.location='login.html';
</script>";

}

}

?>
