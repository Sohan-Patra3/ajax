<?php 

header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

$conn = mysqli_connect('localhost' , 'root' , '' , 'oomsculpture') or die('connection failed');

$sql = 'select * from banner_mst';

$result = mysqli_query($conn , $sql) or die('sql query failed');

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result , MYSQLI_ASSOC);

    echo json_encode($output);

}else{
    echo json_encode(array('message'=>'No record found.','status'=>false));
}

?>