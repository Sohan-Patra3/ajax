<?php 
$sid = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

 $sql = "UPDATE users SET name = '{$first_name}', Lastname = '{$last_name}' WHERE sno = '{$sid}'";


if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}

?>