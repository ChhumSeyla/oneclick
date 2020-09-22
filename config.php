<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '46.101.0.181');
define('DB_USERNAME', 'wvweeyqnbb');
define('DB_PASSWORD', 'Oneclick123');
define('DB_NAME', 'wvweeyqnbb');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	echo "Hello DB Fail";
}

?>