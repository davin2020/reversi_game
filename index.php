<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Kata Game</title>
	</head>

	<body>
		<h1>Kata Game</h1>

		<pre>
		<?php  
		require 'ReversiGame.php';
		echo 'hello kata game ';

		


		$input = "........
			........
			........
			...BW...
			..BWB...
			........
			........
			........";
		$viewBoard = BoardSetup($input);
		print_r($viewBoard);




		?>
		</pre>

	</body>
</html>
