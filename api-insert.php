<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Request-With');


$conn = mysqli_connect('localhost' , 'root' , '' , 'ajax') or die('connection failed');

$data = json_decode(file_get_contents('php://input'),true);

$uid = $data['id'];
$uname = $data['fname'];
$ulname = $data['lname'];

$sql = "INSERT INTO users(sno,name,Lastname) VALUES ({$uid},'{$uname}' , '{$ulname}')";


if(mysqli_query($conn , $sql)){
    echo json_encode(array('message'=>'User record inserted.','status'=>true));
}else{
    echo json_encode(array('message'=>'Record not inserted.','status'=>false));
}

?>