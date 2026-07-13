<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$team_name=$_POST['team_name'];
$project_id=$_POST['project_id'];

mysqli_query($conn,"INSERT INTO teams(team_name,project_id)
VALUES('$team_name','$project_id')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM teams WHERE team_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM teams");
?>

<!DOCTYPE html>
<html>

<head>

<title>Team Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Team Management</h2>

<form method="post">

Team Name<br>

<input type="text" name="team_name" required><br>

Project ID<br>

<input type="number" name="project_id" required><br><br>

<input type="submit" name="add" value="Add Team">

</form>
