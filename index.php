<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Kata Game</title>
	</head>

	<body>
		<h1>Kata Game</h1>

		<pre>
		<?php  
		echo 'hello kata game ';

		function BoardSetup($inputBoard) {

			$boardArray = [];
			// $input = "........
			// 	........
			// 	........
			// 	...BW...
			// 	...WB...
			// 	........
			// 	........
			// 	........";
			$lines = explode("\n", $inputBoard);
			// var_dump($lines);
			foreach ($lines as $line) {
				$boardArray[] = str_split(trim($line)); //append to end of array, trim remmove \r too ie carraige return & tabs etc
			}
			print_r($boardArray);
			//modify board array here via another func
			$boardArray = CheckCells($boardArray);

			// TESTS
			//input & outputs, then write functions
			//return as string
			$returnedBoard = [];
			foreach ($boardArray as $line) {
				$returnedBoard[] = implode(" ", $line);
			}

			return implode("\n", $returnedBoard);
		}

		function CheckCells($board) {
			//loop thru array, look for b, then neibghours for W, then blank cells - if found put marker there
			// i as index or line number
		foreach ($board as $i => $line) { //across?
			foreach ($line as $j => $cell) {
				if ($cell == "B") {
					for ($k= -1; $k <= 1; $k++) { //row across
						for ($m= -1; $m <= 1; $m++) {  //line down
							$matchedW = false;
							$searchingOffsetX = $j; //searching along the lines
							$searchingOffsetY = $i; //searching down the columns
							do {
								$searchingOffsetX += $m;
								$searchingOffsetY += $k;
								$searchingNextChar =  $board[$searchingOffsetY][$searchingOffsetX] ?? null;
								//null coalese if element doenst exist, makes it null ie not undefined  - then stop checking  if null etc
								if ( $searchingNextChar == "W") {
									//valid move so keep going
									$matchedW = true;
								}
								else {
									break; //stops the loop
								}
							}
							while (true);
							//dont replace Bs with o, only replace . and o with o's
							if ($matchedW && $searchingNextChar != "B" ) {
								$board[$searchingOffsetY][$searchingOffsetX] = "o";

							}

							// if ( $board[$i + $k][$j + $m] == "W") {
							// 	//kepp looking in same direction and look for blank
							// 	var_dump("original B: at " . $i  ." " .  " " . $j);
							// 	var_dump("found W in rel to B: " . ($i + $k) ." " . ($j + $m));
							// 	var_dump("found: " . ($i + $k + $k) . " " . ($j + $m +$m) ." " . $board[$i + $k + $k][$j + $m +$m]);
							// 	$board[$i + $k + $k][$j + $m +$m] = "o";
							// }
						} 
					}
					
				}
			}
		}
		return $board;




			//print board once Markers are added
			// print_r($board);
		}


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
