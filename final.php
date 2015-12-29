<?php include 'header.php'; session_start(); ?>
<main>
	<div class="container">
		<h2>You are done</h2>
		<p>You have completed the task</p>
		<p>final score: <?php echo $_SESSION['score']; ?></p>
		<?php session_destroy(); ?>
		<a href="question.php?n=1" class="start">Take Again</a>
	</div>
</main>
<?php include 'footer.php' ?>