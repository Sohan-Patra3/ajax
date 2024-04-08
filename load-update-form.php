<?php

$sno = $_POST['id'];

$conn = mysqli_connect("localhost", "root", "", "ajax");

$sql = "select * from users where sno = {$sno}";
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<table> <tr>
       <td>First Name</td>
       <td><input type='text' name='' id='edit-fname' value='{$row['name']}'>
       <input type='text' name='' id='edit-id' hidden value='{$row['sno']}'>
       </td>
   </tr>
   <tr>
       <td>Last Name</td>
       <td><input type='text' name='' id='edit-lname' value={$row['Lastname']}></td>
   </tr>
   <tr>
       <td><input type='submit' name='' id='edit-submit' value='save'></td>
   </tr>
</table>
<div id='close-btn'>
   X
</div>";
    }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
} else {
    echo "<h2>No record found</h2>";
}
?>