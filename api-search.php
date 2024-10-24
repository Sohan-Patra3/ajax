<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


$conn = mysqli_connect('localhost' , 'root' , '' , 'ajax') or die('connection failed');

$data = json_decode(file_get_contents('php://input'),true);

$search_value = $data['search'];

$sql = "SELECT * FROM users WHERE name LIKE '%{$search_value}%' OR Lastname LIKE '%{$search_value}%'";

$result = mysqli_query($conn , $sql);

if(mysqli_num_rows($result)>0){
   $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
   echo json_encode($output);
}else{
    echo json_encode(array('message'=>'Data not found','status'=>false));
}



?>