<?php

$localhost = "localhost" ; $username="root";$password="";
$database="test";mysql_connect($localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

?>
<html>

<header>

<!--
<?php
/*
add task button
INSERT INTO listdata (createdate, message, completion, completedate, sessionid, id) VALUES (CURRENT_TIMESTAMP, $message, 0, NULL, $sessionid, %id)
*/
?>
//-->

<form >
  $message = <input type="text" name="fname"><br>
  <input type="submit" value="Submit">
</form>

<?php

$loginid = 1

SELECT * FROM listdata
WHERE id = $loginid,
$GET $firstname = firstname, $lastname = lastname;
echo $firstname
echo $lastname


/*
SELECT firstname, lastname, id ;
FROM userinfo;
[WHERE login = true AND id = $listid];
echo firstname lastname;
*/

?>

</header>
<body> 
</body>

</html>
?>