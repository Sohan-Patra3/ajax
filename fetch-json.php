<?php
$id = $_POST['id'];

$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

$sql = "SELECT * FROM students WHERE id = {$id}";

$result = mysqli_query($conn,$sql);

$output = mysqli_fetch_all($result , MYSQLI_ASSOC);

echo json_encode($output);
?>