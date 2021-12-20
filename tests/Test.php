<?php

class Test extends \PHPUnit\Framework\TestCase
{
	public function testInit()
	{
		$toto = 0;
		$this->assertEquals('0', $toto);
	}
}