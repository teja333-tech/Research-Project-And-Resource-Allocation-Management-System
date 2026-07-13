<?php
include("db_connect.php");

if(isset($_POST['add']))
{
$title=$_POST['title'];
$description=$_POST['description'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$status=$_POST['status'];
$faculty_id=$_POST['faculty_id'];

mysqli_query($conn,"INSERT INTO projects(title,description,start_date,end_date,status,faculty_id)
VALUES('$title','$description','$start_date','$end_date','$status','$faculty_id')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM projects WHERE project_id=$id");
}

$result=mysqli_query($conn,"SELECT * FROM projects");
?>

<!DOCTYPE html>
<html>

<head>

<title>Project Management</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2 align="center">Project Management</h2>

<form method="post">

Project Title<br>

<input type="text" name="title" required><br>

Description<br>

<textarea name="description" rows="4" cols="40"></textarea><br>

Start Date<br>

<input type="date" name="start_date"><br>

End Date<br>

<input type="date" name="end_date"><br>

Status<br>

<select name="status">

<option>Ongoing</option>
<option>Completed</option>
<option>Pending</option>

</select>

<br><br>

Faculty ID<br>

<input type="number" name="faculty_id" required><br><br>

<input type="submit" name="add" value="Add Project">

</form>

<br
