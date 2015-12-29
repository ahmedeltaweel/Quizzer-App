<?php
include 'header.php';
include 'database.php';
session_start();
// set the question number;
$number = (int)$_GET['n'];
if (isset($number)) {

	/**
	 * total number of questions
	 */
	$query = "SELECT * FROM `question`";
	$result = $mysqli->query($query) or die($mysqli->error . __LINE__);

	$total = $result->num_rows;

	/**
	 * questions
	 */
	//get the question
	$query = "SELECT * FROM `question` WHERE question_number = $number";
	//get result
	$result = $mysqli->query($query) or die($mysqli->error . __LINE__);
	$question = $result->fetch_assoc();

	/**
	 * choices
	 */
	//get the question
	$query = "SELECT * FROM `choices` WHERE question_number = $number";
	//get choices
	$choices = $mysqli->query($query) or die($mysqli->error . __LINE__);

}
?>
	<main>
		<div class="container">
			<p class="current">Question <?php echo $question['question_number'] . ' of ' . $total ?></p>

			<p class="question"><?php echo $question['text'] ?></p>

			<form action="process.php" method="post" name="question">
				<ul class="choices">
					<?php while ($row = $choices->fetch_assoc()): ?>

						<li><input id="choice" name="choice" type="radio"
								   value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></li>

					<?php endwhile; ?>

				</ul>
				<input type="submit" value="submit">
				<input type="hidden" value="<?php echo $number; ?>" name="number">
			</form>
		</div>
	</main>
<?php include 'footer.php' ?>