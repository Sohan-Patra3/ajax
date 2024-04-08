<?php 

$conn = mysqli_connect("localhost","root","","ajax");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$sql = "INSERT INTO users (`name` , `Lastname`) VALUES ('{$first_name}' , '{$last_name}')";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}

?>