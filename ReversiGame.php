<?php
//This Kata is to write a program that takes a current board position together with information about whose turn it is, and returns a list of the legal moves for that player. A move is only legal if it results in at least one of the opponent’s counters being flipped.
class ReversiGame {

		// converts an input string representing the board (which must not contain spaces) into an array; was explodeBoard()
		public function convertInputStringBoardToArray($inputBoard) {
			$boardArray = [];
			$lines = explode("\n", $inputBoard);
			// var_dump($lines);
			foreach ($lines as $line) {
				//append to end of array, trim remove \r too ie carraige return & tabs etc
				$boardArray[] = str_split(trim($line)); 
				//how to remove extra spaces?
			}
			return $boardArray;
		}

		// func was named implodeBoard(), input board cannot have any white spaces
		public function printBoardWithSpacesBetweenColumns($boardArray) {
			$returnedBoard = [];
			// BUG 2oct21 this doesnt like board with spaces!
			foreach ($boardArray as $line) {
				// add a space here ie " " if your input board isnt already spaced, to get a pretty print
				$returnedBoard[] = implode(" ", $line);
			}
			// print_r($boardArray);

			//had to make this \r\n so tests will pass on windows dev env
			return implode("\r\n", $returnedBoard);
		}

		//this currently only checks moves for player B, but could pass in vars like currentPlayer and nextPlayer to make it more dynamic - board should not have any whhite spaces in the input array
		// checkForValidMoves($board, $currentPlayer), was named checkCells()
		public function checkForValidMoves($board) {
			//loop thru array, look for cells with B, then neighbouring cells for W, then blank cells - if found put marker o there
			// i as index or line number

			foreach ($board as $i => $line) { //across?
				foreach ($line as $j => $cell) {
					if ($cell == "B") {
						for ($k = -1; $k <= 1; $k++) { //row across
							for ($m = -1; $m <= 1; $m++) {  //line down
								$matchedW = false;
								$searchingOffsetX = $j; //searching along the lines
								$searchingOffsetY = $i; //searching down the columns
								do {
									//this checks the grid of 8 cells around the current cell
									$searchingOffsetX += $m;
									$searchingOffsetY += $k;
									$searchingNextChar =  $board[$searchingOffsetY][$searchingOffsetX] ?? null;
									//null coalese operator, if element doesnt exist, make it null ie not undefined - then stop checking if null etc
									if ($searchingNextChar == "W") {
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
							} 
						}
						
					}
				} //end of foreach j
			} //end of foreach i
			return $board;
		}

}