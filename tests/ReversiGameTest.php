<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require 'ReversiGame.php';

final class ReversiGameTest extends TestCase
{
	private $reversi;

    public function testFirstSetup(): void
    {
    	$this->reversi = new ReversiGame();

    	$inputPretty = ". . . . . . . .
		. . . . . . . .
		. . . . . . . .
		. . . B W . . .
		. . . W B . . .
		. . . . . . . .
		. . . . . . . .
		. . . . . . . .";

		$input = "........
		........
		........
		...BW...
		...WB...
		........
		........
		........";
		$output =  $this->reversi->BoardSetup($input);
		// Error: Call to undefined function BoardSetup() - means i need to use $this->variable->function()

		//this currently has custom indenting so that the strings are considered 'equal' when unit testing
    	$expectedOutput = ". . . . . . . .
. . . . . . . .
. . . . o . . .
. . . B W o . .
. . o W B . . .
. . . o . . . .
. . . . . . . .
. . . . . . . .";
		// Each time test is done with differnt input board, need to work out what the expected output board is, as they will never be equal as output board will always be a modification of the input board, so need to compare actual output with expected output
    	$this->assertEquals($output, $expectedOutput);
    }
}

