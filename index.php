<?php
session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Testing Suite</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<style>
		body {
			padding-top: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
			$testing = $_SESSION["testing"];

			if ($testing) {
				if ($_SESSION['finished']) {
					require 'views/result.php';
				} else {
					require 'views/test.php';
				}
				
			} else {
				require 'views/intro.php';
			}

		?>

		<footer class="text-center">
			<hr>
			Created with <span class="text-danger">&hearts;</span> by <a href="https://t.me/MrOnlineCoder">Nikita Kogut</a>
		</footer>
	</div>
</body>
</html>