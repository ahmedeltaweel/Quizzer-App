<?php
include 'header.php';
include 'database.php';

if (isset($_POST['submit'])) {
	//get post variables
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];

	//choices array
	$choices = [];
	$choices[1] = $_POST['choice1'];
	$choices[2] = $_POST['choice2'];
	$choices[3] = $_POST['choice3'];
	$choices[4] = $_POST['choice4'];
	$choices[5] = $_POST['choice5'];

	//question query
	$query = "INSERT INTO `question` (question_number , text) VALUES ('$question_number' , '$question_text');";
	//run
	$insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);
	//validation insert
	if ($insert_row) {
		//insert choices
		foreach ($choices as $choice => $value) {
			if ($value != '') {
				if ($correct_choice == $choice) {
					$is_correct = 1;
				} else {
					$is_correct = 0;
				}
				//choice query
				$query = "INSERT INTO `choices`(question_number , is_correct , text) VALUES ('$question_number' , '$is_correct ', '$value');";
				//insert query
				$insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);

				//validate insert
				if ($insert_row) {
					continue;
				} else {
					die('Error' . $mysqli->error);
				}
			}
		}
		$message = 'question has been added';
	}
}
/**
 * total number of questions
 */
$query = "SELECT * FROM `question`";
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);

$total = $result->num_rows;
$next = $total + 1;

?>
	<main>
		<div class="container">
			<h2>Add question</h2>
			<?php
			if (isset($message)) {
				echo "<p>$message</p>";
			}
			?>
			<form action="add.php" method="post">
				<p>
					<label for="">Question numbers: </label>
					<input type="number" name="question_number" value="<?php echo $next ?>">
				</p>

				<p>
					<label for="">Question Next: </label>
					<input type="text" name="question_text">
				</p>

				<p>
					<label for="">Choice #1: </label>
					<input type="text" name="choice1">
				</p>

				<p>
					<label for="">Choice #2: </label>
					<input type="text" name="choice2">
				</p>

				<p>
					<label for="">Choice #3: </label>
					<input type="text" name="choice3">
				</p>

				<p>
					<label for="">Choice #4: </label>
					<input type="text" name="choice4">
				</p>

				<p>
					<label for="">Choice #5: </label>
					<input type="text" name="choice5">
				</p>

				<p>
					<label for="">Correct choice number: </label>
					<input type="number" name="correct_choice">
				</p>

				<p>
					<input type="submit" value="submit" name="submit">
				</p>
			</form>
		</div>
	</main>
<?php include 'footer.php' ?>