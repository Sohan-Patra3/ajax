<?php 

$conn = mysqli_connect("localhost" , "root" , "" , "ajax");

$limit_per_page = 5;

if(isset($_POST['page_no'])){
    $page = $_POST['page_no'];
}else{
    $page = 0;
}

$sql = "SELECT * from users LIMIT {$page} , {$limit_per_page}";
$query = mysqli_query($conn , $sql);

if(mysqli_num_rows($query)>0){
    $output = "";
    $output .= "<tbody>";
    while($row=mysqli_fetch_assoc($query)){
        $last_id= $row['sno'];
        $output .= "<tr>
                        <td align='center'>{$row['sno']}</td>
                        <td align='center'>{$row['name']} {$row['Lastname']}</td>
                    </tr>";
    }
    $output .= "</tbody>

    <tbody id='pagination'>
    <tr>
        <td align='center'>
            <button id='ajaxbtn' data-id='{$last_id}'>Load More</button>
        </td>
    </tr>
    </tbody>";

    echo $output;

}else{
    echo "";
}
mysqli_close($conn);
?>