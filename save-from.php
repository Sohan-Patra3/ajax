<?php

$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

$name = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$sql = "INSERT INTO students (`name`, age , gender , country) VALUES ('{$name}' , '{$age}' , '{$gender}' , '{$country}')";
if(mysqli_query($conn , $sql)){
    echo "hello {$name} your record is save";
}else{
    echo "can't save your data";
}
?>