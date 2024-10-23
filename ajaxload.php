<?php
$conn= mysqli_connect("localhost" , "root" , "" , "ajax") or die("connection faild");

$sql = "select * from users";
$result = mysqli_query($conn,$sql);
$output = "";
if(mysqli_num_rows($result)>0){
    $output = '<table border="1" width="100%" cellspecing="0" cellpadding="10px">
    <tr>
    <th> ID </th>
    <th> Name </th>
    <th> Edit </th>
    <th> Delete</th>
    </tr>';
    while($row = mysqli_fetch_assoc($result)){
       $output .="<tr><td>{$row["sno"]}</td><td>{$row["name"]} {$row["Lastname"]}</td><td><button class='edit-btn' data-eid={$row["sno"]}>Edit</button></td><td><button class='delete-btn' data-id={$row["sno"]}>Delete</button></td></tr>"; 
    }
    $output .="</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No record found</h2>";
}
?>
