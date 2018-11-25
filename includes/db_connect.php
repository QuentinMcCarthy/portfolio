<?php
	$dbc = mysqli_connect(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"), getenv("DB_TABLE"));

	if($dbc){
		$dbc->set_charset("utf8");
	} else{
		die("FATAL ERROR: DBC_MAIN_FAIL");
	}
?>
