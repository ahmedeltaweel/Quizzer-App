<?php
include 'database.php';

session_start();

//check for score
if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
}

if (isset($_POST)) {
	$number = $_POST['number'];
	$selected = $_POST['choice'];

	$next = $number + 1;


	/**
	 * total number of questions
	 */
	$query = "SELECT * FROM `question`";
	$result = $mysqli->query($query) or die($mysqli->error . __LINE__);

	$total = $result->num_rows;

	/**
	 *  get correct choice
	 */

	$query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";

	$result = $mysqli->query($query) or die($mysqli->error . __LINE__);

	$row = $result->fetch_assoc();

	$correct = $row['id'];

	if ($correct == $selected) {
		$_SESSION['score']++;
	}

	if ($number == $total) {
		header("Location:final.php");
		exit();
	} else {
		header("Location:question.php?n=" . $next);
		exit();
	}

}