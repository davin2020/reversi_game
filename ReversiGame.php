<?php
class ReversiGame {

		public function explodeBoard($inputBoard) {
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
		public function implodeBoard($boardArray) {
			$returnedBoard = [];
			// BUG 2oct21 this doesnt like board with spaces!
			foreach ($boardArray as $line) {
				// add a space here ie " " if your input board isnt already spaced, to get a pretty print
				$returnedBoard[] = implode(" ", $line);
			}
			// print_r($boardArray);

			//had to make this \r\n so tests would pass on windows dev env
			return implode("\r\n", $returnedBoard);
		}

		//this currently only checks moves for player B, but could pass in vars like currentPlayer and nextPlayer to make it more dynamic
		public function checkCells($board) {
			//loop thru array, look for cells with B, then neighbouring cells for W, then blank cells - if found put marker o there
			// i as index or line number

			// BUG 2oct21 this doesnt like board with spaces!
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
									//null coalese operator, if element doesnt exist, make it null ie not undefined - then stop checking if null etc
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
							} 
						}
						
					}
				} //endof foreach j
			} //endof foreach i
			return $board;
		}

}