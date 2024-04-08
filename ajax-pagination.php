<?php

$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

$limit_per_page = 5 ; 

if(isset($_POST['page_no'])){
    $page_no = $_POST['page_no'];
}else{
    $page_no = 1;
}

$offset = ($page_no-1)* $limit_per_page;

$sql = "SELECT * FROM users LIMIT {$offset},{$limit_per_page}";

$result = mysqli_query($conn,$sql);

$output = "";

if(mysqli_num_rows($result)>0){
    $output .= " <table border='1' width='100%'' cellspecing='0' cellpadding='10px'>
    <tr>
        <th width='10%'>ID</th>
        <th width='50%''>Name</th>
    </tr>";

    while($row = mysqli_fetch_assoc($result)){
        $output .="<tr>
        <td align='center'>{$row['sno']}</td>
        <td align='center'>{$row['name']} {$row['Lastname']}</td>
    </tr>";
    }
    $output .="</table>";

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    $total_page = ceil($row/$limit_per_page);
    $output .="<div id='pagination'>";
    for($i = 1 ; $i<=$total_page;$i++){
        $output .=" <a href='' id='{$i}' class='active'>{$i}</a>";
    }
    $output .="</div>";

    echo $output;
}else{
    echo "No records found";
}
?>