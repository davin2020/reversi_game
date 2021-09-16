<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require 'ReversiGame.php';

final class ReversiGameTest extends TestCase
{
	private $reversi;

    public function testFirstSetup(): void
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
		$output =  $this->reversi->BoardSetup($input);
			// Error: Call to undefined function BoardSetup() - means i need to use $this->variable->function()

		//this currently has custom indenting so that the strings are considered 'equal'
    	$expectedOutput = ". . . . . . . .
. . . . . . . .
. . . . o . . .
. . . B W o . .
. . o W B . . .
. . . o . . . .
. . . . . . . .
. . . . . . . .";
			//havent worked out what board is yet
		// BUT these will never be equal ie the output board will always be a modifiatino of the input board!
    	$this->assertEquals($output, $expectedOutput);
    }
}

