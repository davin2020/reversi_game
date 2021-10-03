<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require 'ReversiGame.php';

final class ReversiGameTest extends TestCase
{
	private $reversi;

    public function testFirstMove(): void
    {
    	$this->reversi = new ReversiGame();

		$input = "........
		........
		........
		...BW...
		...WB...
		........
		........
		........";
		// Error: Call to undefined function BoardSetup() - means i need to use $this->variable->function()

		//redoing tests using new refactored methods
		$outputBoard = $this->reversi->convertInputStringBoardToArray($input);
		$boardArray = $this->reversi->checkForValidMoves($outputBoard);
		$printedBoard = $this->reversi->printBoardWithSpacesBetweenColumns($boardArray);

		//this currently has custom indenting so that the strings are considered 'equal' when unit testing
    	$expectedBoard = ". . . . . . . .
. . . . . . . .
. . . . o . . .
. . . B W o . .
. . o W B . . .
. . . o . . . .
. . . . . . . .
. . . . . . . .";
		// Each time test is done with differnt input board, need to work out what the expected output board is, as they will never be equal as output board will always be a modification of the input board, so need to compare actual output with expected output
    	// $this->assertEquals($output, $expectedOutput);
    	$this->assertEquals($printedBoard, $expectedBoard);
    }

    public function testSecondMove(): void
    {
    	$this->reversi = new ReversiGame();
    	$inputB = "........
		........
		........
		...BW...
		..BWB...
		........
		........
		........";
    	$outputBoard = $this->reversi->convertInputStringBoardToArray($inputB);
		$boardArray = $this->reversi->checkForValidMoves($outputBoard);
		$printedBoard = $this->reversi->printBoardWithSpacesBetweenColumns($boardArray);
		//this currently has custom indenting so that the strings are considered 'equal' when unit testing
		$expectedBoard = ". . . . . . . .
. . . . . . . .
. . . . o . . .
. . . B W o . .
. . B W B . . .
. . . o . . . .
. . . . . . . .
. . . . . . . .";
		$this->assertEquals($printedBoard, $expectedBoard);
    }
}

