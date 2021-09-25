<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Kata Game</title>
	</head>

	<body>
		<h1>Kata Challenge - Reversi Game</h1>

		<!-- using pre so whitespace is respected -->
		<pre>
		<?php  
		require 'ReversiGame.php';

		$input = "
		........
		........
		........
		...BW...
		...WB...
		........
		........
		........";
		
		print_r("<h2>Input Board - Showing Starting Positions</h2>");
		print_r($input);
		print_r("<p>B = Black Player, W = White Player");

		$reversi = new ReversiGame();
		// $output =  $this->reversi->BoardSetup($input);
		$outputBoard = $reversi->BoardSetup($input);

		// $viewBoard = BoardSetup($input);
		print_r("<h2>Output Board - Showing valid moves for Player B</h2>");
		print_r($outputBoard);
		print_r("<p>o = valid moves for the current player</p>");

		?>
		</pre>

	</body>
</html>
