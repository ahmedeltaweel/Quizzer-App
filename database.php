<?php
/**
 * Created by PhpStorm.
 * User: ahmedeltaweel
 * Date: 12/18/15
 * Time: 5:01 AM
 */

$db_host = 'localhost';
$db_name = 'quizzer';
$db_username = '';
$db_password = '';

$mysqli = new mysqli($db_host , $db_username , $db_password , $db_name);

if($mysqli->connect_error){
	die('connection failed' . $mysqli->connect_error);
}
