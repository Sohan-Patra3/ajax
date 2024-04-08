<?php  
$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

$sql = "SELECT * FROM users";

$result = mysqli_query($conn , $sql);

$output = mysqli_fetch_all($result , MYSQLI_ASSOC);

$json_data = json_encode($output , JSON_PRETTY_PRINT);

$file_name  = "my-" .date("d-m-Y").".json";

if(file_put_contents($file_name , $json_data)){
    echo $file_name . "file created";
}else{
    echo "can't insert into json file";
}
?>