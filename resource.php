<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$resource_name=$_POST['resource_name'];
$quantity=$_POST['quantity'];
$availability=$_POST['availability'];

mysqli_query($conn,"INSERT INTO resources(resource_name,quantity,availability)
VALUES('$resource_name','$quantity','$availability')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM resources WHERE resource_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM resources");
?>

<!DOCTYPE html>
<html>

<head>

<title>Resource Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Resource Management</h2>

<form method="post">

Resource Name<br>

<input type="text" name="resource_name" required><br>

Quantity<br>

<input type="number" name="quantity" required><br>

Availability<br>

<select name="availability">

<option>Available</option>
<option>In Use</option>
<option>Maintenance</option>

</select>

<br><br>

<input type="submit" name="add" value="Add Resource">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>ID</th>
<th>Resource Name</th>
<th>Quantity</th>
<th>Availability</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['resource_id']."</td>";

echo "<td>".$row['resource_name']."</td>";

echo "<td>".$row['quantity']."</td>";

echo "<td>".$row['availability']."</td>";

echo "<td><a href='?delete=".$row['resource_id']."'>Delete</a></td>";

echo "</tr>";

}

?>

</table>

<br>

<center>

<a href="dashboard.php">Back to Dashboard</a>

</center>

</body>

</html>
