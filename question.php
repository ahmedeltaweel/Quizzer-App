<?php include 'header.php' ?>
	<main>
		<div class="container">
			<p class="current">Question 1 of 5</p>

			<p class="question">What is php stands for ?</p>

			<form action="process.php" method="post">
				<ul class="choices">
					<li><input id="choice1" name="choice" type="radio" value="1">PHP HypertextPreprocessor</li>
					<li><input id="choice2" name="choice" type="radio" value="1">Preprocessor</li>
					<li><input id="choice3" name="choice" type="radio" value="1">Hypertext</li>
					<li><input id="choice4" name="choice" type="radio" value="1">PHP</li>
				</ul>
				<input type="submit" value="submit">
			</form>
		</div>
	</main>
<?php include 'footer.php' ?>