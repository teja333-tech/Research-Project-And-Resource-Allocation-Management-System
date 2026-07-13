<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$sponsor=$_POST['sponsor'];
$project_id=$_POST['project_id'];
$allocated_amount=$_POST['allocated_amount'];
$used_amount=$_POST['used_amount'];

mysqli_query($conn,"INSERT INTO funding(project_id,sponsor,allocated_amount,used_amount)
VALUES('$project_id','$sponsor','$allocated_amount','$used_amount')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM funding WHERE funding_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM funding");
?>

<!DOCTYPE html>
<html>

<head>

<title>Funding Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Funding Management</h2>

<form method="post">

Project ID<br>

<input type="number" name="project_id" required><br>

Sponsor Name<br>

<input type="text" name="sponsor" required><br>

Allocated Amount<br>

<input type="number" step="0.01" name="allocated_amount" required><br>

Used Amount<br>

<input type="number" step="0.01" name="used_amount" required><br><br>

<input type="submit" name="add" value="Add Funding">

</form>

<br><br>

<table border="1" cellpadding="10" align="center">

<tr>

<th>ID</th>
<th>Project ID</th>
<th>Sponsor</th>
<th>Allocated Amount</th>
<th>Used Amount</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['funding_id']."</td>";

echo "<td>".$row['project_id']."</td>";

echo "<td>".$row['sponsor']."</td>";

echo "<td>".$row['allocated_amount']."</td>";

echo "<td>".$row['used_amount']."</td>";

echo "<td><a href='?delete=".$row['funding_id']."'>Delete</a></td>";

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
