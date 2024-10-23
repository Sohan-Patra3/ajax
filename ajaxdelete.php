<?php 

$sno = $_POST['id'];

$conn=mysqli_connect("localhost" , "root" , "" , "ajax");

$sql = "DELETE FROM users WHERE sno={$sno}";

if(mysqli_query($conn , $sql)){
    echo 1 ;
}else{
    echo 0;
}
?>