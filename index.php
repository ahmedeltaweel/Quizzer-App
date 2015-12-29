<?php
include 'header.php';
include 'database.php';

// number of questions
$query = "SELECT * FROM `question`";
$result = $mysqli->query($query) or die($mysqli->error . __LINE__);
//number of rows
$total = $result->num_rows;

?>

	<body>
<main>
	<div class="container">
		<h2>Teat your php knowledge</h2>

		<p>This is a multiple choice quiz to test your knowledge in PHP</p>
		<ul>
			<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
			<li><strong>Type: </strong>multiple choice</li>
			<li><strong>Estimated Time: </strong><?php echo $total * .5 . 'Minutes' ?></li>
		</ul>
		<a href="question.php?n=1" class="start">Start Quiz</a>
	</div>
</main>
<?php include 'footer.php' ?>