<?php



class UTC60Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {

	}

    protected function tearDown()
    {
    }

    protected function getHello(){
        return "hello";
    }

    // Test Cal Total Score #1
 	public function testGetHello()
    {				
		$this->assertEquals($this->getHello(), "hello");
    }  
	


}