<?php

$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

$name = $_POST['fullname'];
$lastname = $_POST['lastname'];


$sql = "INSERT INTO users (`name`, `Lastname`) VALUES ('{$name}' , '{$lastname}')";
if(mysqli_query($conn , $sql)){
    echo "hello {$name} your record is save";
}else{
    echo "can't save your data";
}
?>