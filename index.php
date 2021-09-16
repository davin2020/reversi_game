<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Kata Game</title>
	</head>

	<body>
		<h1>Kata Challenge - Reversi Game</h1>

		<pre>
		<?php  
		require 'ReversiGame.php';

		$input = "
			........
			........
			........
			...BW...
			..BWB...
			........
			........
			........";
		
		print_r("<br>Input Board <br>");
		print_r($input);

		$reversi = new ReversiGame();
		// $output =  $this->reversi->BoardSetup($input);
		$outputBoard = $reversi->BoardSetup($input);

		// $viewBoard = BoardSetup($input);
		print_r("<br>Output Board, of valid moves for Player B <br>");
		print_r($outputBoard);

		?>
		</pre>

	</body>
</html>
