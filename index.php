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

		$reversi = new ReversiGame();

		$input = "
		........
		........
		........
		...BW...
		...WB...
		........
		........
		........";

		//using this input with spaces removes 2 of the o's
		$inputPretty = "
		. . . . . . . .
		. . . . . . . .
		. . . . . . . .
		. . . B W . . .
		. . . W B . . .
		. . . . . . . .
		. . . . . . . .
		. . . . . . . .";
		
		print_r("<h2>Input Board - Showing Starting Positions</h2>");
		print_r($inputPretty);
		print_r("<p>B = Black Player, W = White Player");

		//this set of 3 works ok for plain input board - itts prob better to process the board as plain ie nnot with spaces, but to just print it WITH spaces - is plain  board returned from checkcells? YES tho printing it as an array does make it look pretty but thats ok - implode board returns plain board  if u remove the implode space option - ie output from one CheckCells() can be used as input for next check! but what i actually need is to feed it a new board, where a user has prechosen a new square 

		//refactored into funcs to explode the plain input board, check the cells for valid moves, then implode the to pretty-print it
		$outputBoard = $reversi->explodeBoard($input);
		$boardArray = $reversi->CheckCells($outputBoard);
		$printedBoard = $reversi->implodeBoard($boardArray);

		$inputB = "
		........
		........
		........
		...BW...
		..BWB...
		........
		........
		........";
		//2nd move - could accept input from user to indicate where they want to go?
		$outputBoardB = $reversi->explodeBoard($inputB);
		$boardArrayB = $reversi->CheckCells($outputBoardB);
		$printedBoardB = $reversi->implodeBoard($boardArrayB);


		// $viewBoard = BoardSetup($input);
		print_r("<h2>Output Board - Showing valid moves for Player B</h2>");
		// print_r($outputBoard);
		print_r($printedBoard);
		print_r("<p>o = valid moves for the current player</p>");

		
		print_r("<h2>Input Board - Showing Next Move Chosen by Player B</h2>");
		//input board for move 2
		print_r($reversi->implodeBoard($outputBoardB));

		//output board for move 2
		print_r("<h2>Output Board - Showing Next valid moves for Player B</h2>");
		print_r($printedBoardB);
		
		?>
		</pre>

	</body>
</html>

<!-- tidied code, updated readme, add that i did this with my tech mentor -->
<!-- had to make separete prettyInput as seems output was being create incorretlly due to extra spaces in input array that just make it look pretty - 
consider having implode and explode as sep funcs to call whenever needed, then seprate func to setupBoard and checkCells etc -->