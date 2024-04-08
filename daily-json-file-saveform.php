<?php 

if($_POST['fullname']!='' && $_POST['lastname']!=''){
    if(file_exists('user_data.json')){
        $current_data = file_get_contents('user_data.json');
        $array_data= json_decode($current_data,true);
        $new_data = array(
            'fullname'=>$_POST['fullname'],
            'lastname'=>$_POST['lastname']
        );
        $array_data[]=$new_data;
        $json_data = json_encode($array_data , JSON_PRETTY_PRINT);
    
        if(file_put_contents('user_data.json' , $json_data)){
            echo "<h3>successfully saved data in json file</h3>";
        }else{
            echo "<h3>data doesn't exist</h3>";
        }
    }else{
        echo "<h3>json data doesn't exist</h3>";
    }
   

}else{
    echo "<h3>All form fields are required";
}

?>