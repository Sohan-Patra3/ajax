<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-control-Allow-Methods: DELETE');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Request-With');

$conn = mysqli_connect('localhost' , 'root' , '' , 'ajax') or die('connection failed');

$data = json_decode(file_get_contents('php://input'),true);

$orderId = $data['id'];

$sql = "DELETE FROM users WHERE sno = {$orderId}";

if(mysqli_query($conn , $sql)){
    echo json_encode(array('message'=>'Record Deleted successfully.','status'=>true));
}else{
    echo json_encode(array('message'=>'Record not deleted','status'=>false));
}

?>