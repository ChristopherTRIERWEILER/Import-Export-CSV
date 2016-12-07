<?php
// PDO connect *********
function connect() {
	$host = 'localhost';
	$db_name = 'nomdelabdd';
	$db_user = 'user';
	$db_password = 'password';
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
?>