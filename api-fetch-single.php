<?php 

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

$conn = mysqli_connect('localhost' , 'root' , '' , 'oomsculpture') or die('connection failed');

$data = json_decode(file_get_contents('php://input'),true);

$orderId = $data['id'];

$sql = "select * from banner_mst where BAM_BACD={$orderId}";

$result = mysqli_query($conn , $sql) or die('sql query failed');

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result , MYSQLI_ASSOC);

    echo json_encode($output);

}else{
    echo json_encode(array('message'=>'No record found.','status'=>false));
}

?>