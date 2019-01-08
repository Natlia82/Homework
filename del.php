<?php
$test = $_GET['test'];
$way = "c:/server/domains/localhost/temp/$test";
unlink($way);
//header("Locaiton: index.php");
  echo '<meta http-equiv="refresh" content="0;URL=/list.php">';
?>
