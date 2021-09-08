<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require 'ReversiGame.php';

final class ReversiTest extends TestCase
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
			// Error: Call to undefined function BoardSetup()

    	$expectedOutput = ". . . . . . . .
. . . . . . . .
. . . . o . . .
. . . B W o . .
. . o W B . . .
. . . o . . . .
. . . . . . . .
. . . . . . . .";
			//havent worked out what board is yet
		// BUT these will never be equal ie the output board will always be a modiciatino of the input board!
    	$this->assertEquals($output, $expectedOutput);
    }
}

//to run tests from win cmd prompt
// vendor\bin\phpunit index.test.php

// expected output for 2nd test
// $expectedOutput = "........
// 			........
// 			....0...
// 			...BW0..
// 			..0WB...
// 			...0....
// 			........
// 			........";
