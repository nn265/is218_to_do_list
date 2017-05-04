<?php

$localhost = "localhost" ; $username="root";$password="";
$database="test";mysql_connect($localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

?>

spent all my time elsewhere, sorry