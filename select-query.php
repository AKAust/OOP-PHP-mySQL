<?php
//load db class and create object
require_once("classes/Db.php");
$db = new Db();

$rows = $db -> select("SELECT * FROM `targets`");

foreach ($rows as $row){
echo $row['monthYear']."<br>";

}

$names = $db -> select("SELECT * FROM `salesPerson`");
foreach ($names as $name){
echo $name['Name']."<br>";
}
?>
