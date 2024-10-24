<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$conn = mysqli_connect('localhost', 'root', '', 'ajax') or die('Connection failed');

$data = json_decode(file_get_contents('php://input'), true);

$uname = $data['name']; 
$ulname = $data['Lastname'];


$sql = "INSERT INTO users (name, Lastname) VALUES ('{$uname}', '{$ulname}')";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' => 'User record inserted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Record not inserted.', 'status' => false));
}

mysqli_close($conn);
?>
