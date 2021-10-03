<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Kata Game</title>
	</head>

	<body>
		<h1>Kata Challenge - Reversi Game</h1>

		<!-- using pre so whitespace is respected by html -->
		<pre>
		<?php  
		require 'ReversiGame.php';

		$reversi = new ReversiGame();

		$input = "........
				........
				........
				...BW...
				...WB...
				........
				........
				........";

		//this set of 3 works ok for plain input board - itts prob better to process the board as plain ie nnot with spaces, but to just print it WITH spaces - is plain  board returned from checkForValidMoves()? YES tho printing it as an array does make it look pretty but thats ok - implode board returns plain board  if u remove the implode space option - ie output from one checkForValidMoves() can be used as input for next check! but what i actually need is to feed it a new board, where a user has prechosen a new square 

		//refactored into funcs to explode the plain input board, check the cells for valid moves, then implode the to pretty-print it
		print_r("<h2>Input Board - Showing Starting Positions</h2>");
		print_r("<p>B = Black Player, W = White Player");
		$outputBoard = $reversi->convertInputStringBoardToArray($input);
		print_r($reversi->printBoardWithSpacesBetweenColumns($outputBoard));
		
		$boardArray = $reversi->checkForValidMoves($outputBoard);
		$printedBoard = $reversi->printBoardWithSpacesBetweenColumns($boardArray);

		print_r("<h2>Output Board - Showing valid moves for Player B</h2>");
		print_r("<p>o = valid moves for the current player</p>");
		print_r($printedBoard);

		//input board for move 2
		$inputB = "........
					........
					........
					...BW...
					..BWB...
					........
					........
					........";
		
		//2nd move after provding input board showing where player B chose to go - 
		//later could accept input from user to indicate where they want to go?
		$outputBoardB = $reversi->convertInputStringBoardToArray($inputB);
		$boardArrayB = $reversi->checkForValidMoves($outputBoardB);
		$printedBoardB = $reversi->printBoardWithSpacesBetweenColumns($boardArrayB);
		
		print_r("<h2>Input Board - Showing Next Move Chosen by Player B</h2>");
		print_r($reversi->printBoardWithSpacesBetweenColumns($outputBoardB));

		print_r("<h2>Output Board - Showing Next valid moves for Player B</h2>");
		print_r($printedBoardB);
		
		?>
		</pre>

	</body>
</html>

<!-- tidied code, updated readme, add that i did this with my tech mentor -->
<!-- had to make separete prettyInput as seems output was being create incorretlly due to extra spaces in input array that just make it look pretty - 
consider having implode and explode as sep funcs to call whenever needed, then seprate func to setupBoard and checkForValidMoves etc -->