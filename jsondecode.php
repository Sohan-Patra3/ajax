<?php 

$json_string = "my.json";

$json_data = file_get_contents($json_string);

$arr = json_decode($json_data, true);

echo "<table border='1' cellpadding='10px' width='50%'>";
foreach($arr as $item) {
    echo "<tr><td>{$item['id']}</td><td>{$item['title']}</td></tr>";
}
echo "</table>";

/*echo "<pre>";
print_r($arr);
echo "</pre>";*/
?>