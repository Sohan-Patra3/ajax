<?php 

$jsonstring = 'my.json';

$jsondata = file_get_contents($jsonstring);

$arr = json_decode($jsondata,true);

echo "<table border='1' cellpadding='10px' width='50%'>";
foreach($arr as $item) {
    echo "<tr><td>{$item['id']}</td><td>{$item['title']}</td></tr>";
}
echo "</table>";

/*echo "<pre>";
print_r($arr);
echo "</pre>";*/
?>