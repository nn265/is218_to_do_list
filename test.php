<?php

// Database Constants
	define("DB_SERVER", "127.0.0.1");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "test");

	// 1. Create a database connection
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if ( !$connection ) {
		die("Database connection failed: " . mysql_error());
	}
	// 2. Select a database to use
	$db_select = mysql_select_db(DB_NAME, $connection);
	if ( !$db_select ) {
		die("Database selection failed: " . mysql_error());
	}
	function setTask( $id ) {
		global $connection;
		$query = "INSERT INTO listdata (id, completion, visible) VALUES (\"{$task}\", 0, 1)";
		$result = mysql_query( $query, $connection );
		#echo mysql_error();
	}
	function confirm_query( $result_set ) {
		if ( !$result_set ) {
			die("Database query failed: " . mysql_error() );
		}
	}
	# Delete All Rows from table
	function deleteRows () {
		global $connection;
		$query = "DELETE FROM listdata";
		$result = mysql_query( $query, $connection );
		$query = "ALTER TABLE listdata AUTO_INCREMENT = 1";
		$result = mysql_query( $query, $connection );
	}
	# Set id completion flag to 1 using id Number
	function completedid ( $taskNum ) {
		global $connection;
		$query = "UPDATE listdata SET completed = 1 WHERE id={$taskNum}";
		$result = mysql_query($query, $connection);
		#if ( ) {
		#	echo "Change Success, " . mysql_affected_rows() . " rows affected.";
		#} else {
		#	echo mysql_error();
		#}
	}
	# Set id visibility to 0 using id Number
	function hideTask( $taskNum ) {
		global $connection;
		$newText = "Something";
		$query = "UPDATE listdata SET visible=0 WHERE id={$taskNum}";
		$result = mysql_query($query, $connection);
	}
	# Displays All Visible Tasks
	function getAllTask() {
		global $connection;
		$query = "SELECT * FROM listdata WHERE visible=1";
		$result = mysql_query($query, $connection);
		
		while ( $list = mysql_fetch_array($result) ) {
			#echo print_r($list) . "<br/>";
			echo "id #" . $list[0] . ": " . $list[1] . "<br />";
		}
	}
	# Displays All Visible Tasks
	function getHiddenTask() {
		global $connection;
		$query = "SELECT * FROM listdata WHERE visible=0";
		$result = mysql_query($query, $connection);
		
		while ( $list = mysql_fetch_array($result) ) {
			echo "id #" . $list[0] . ": " . $list[1] . "<br />";
		}
	}
	# Check for task
	if ( isset( $_POST['taskName'] ) && $_POST['taskName'] !== "" ) {		
		$taskName = $_POST['taskName'];
		#echo $taskName;
		setTask( $taskName );
	}
	# Check for hide id number
	if ( isset( $_POST['num'] ) ) {
		$taskNum = $_POST['num'];
		hideTask( $taskNum );
	}
	echo "<form name=\"input\" action=\"listdata.php\" method=\"post\" >";
	echo "<input type=\"text\" name=\"taskName\" placeholder=\"enter id here\"/>";
	echo "<br/>";
	#echo "<label>Enter id Number to Hide: ";
	echo "<input type=\"text\" name=\"num\" placeholder=\"enter id number to hide here\"/>";	
	echo "<input type=\"submit\" name=\"submit\" />";
	echo "</form>";
	echo "<br/><br/>";
	echo "To-Do List: " . "<br/>";
	echo getAllTask();
	echo "<br/>";
	echo "Hidden List: " . "<br/>";
	echo getHiddenTask();

?>