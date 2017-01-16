<?php

use yii\helpers\ArrayHelper; 

use app\models\User;
use app\controllers\UserController;

class UTC08Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->userController = new UserController();

        $this->user1 = new User();
        $this->user1->id = 15;
        $this->user1->name = "Phithiwat";
        $this->user1->surname = "Sitthitun";
        $this->user1->username = "phithi";
        $this->user1->password = "1234";
        $this->user1->password2 = "1234";
        $this->user1->roleId = 1;

        $this->user2 = new User();
        $this->user2->id = 2;
        $this->user2->name = "Natthakan";
        $this->user2->surname = "Kaeokanpai";
        $this->user2->username = "natthakan";
        $this->user2->password = "man";
        $this->user2->password2 = "man";
        $this->user2->roleId = 2;

        $this->user3 = new User();
        $this->user3->id = 3;
        $this->user3->name = "tony";
        $this->user3->surname = "Stark";
        $this->user3->username = "tony";
        $this->user3->password = "tony";
        $this->user3->password2 = "tony";
        $this->user3->roleId = 3;

        $this->arrayUser1 = array($this->user1);
        $this->arrayUser2 = array($this->user3);
        $this->arrayUser3 = array($this->user2);
        $this->arrayUser4 = array($this->user1, $this->user2, $this->user3);
        $this->arrayUser5 = array(Null);


    }

    protected function tearDown()
    {
    }
	
    // Test Search User #1
 	public function testSearchUser1()
    {
    	$this->assertEquals(ArrayHelper::toArray($this->userController->searchUser("Phithiwat")), ArrayHelper::toArray($this->arrayUser1));
		$this->assertInstanceOf(User::class, $this->user1);
	}
	
    // Test Search User #2
 	public function testSearchUser2()
    {
    	$this->assertEquals(ArrayHelper::toArray($this->userController->searchUser("Stark")), ArrayHelper::toArray($this->arrayUser2));
        $this->assertInstanceOf(User::class, $this->user2);
	}	
	
    // Test Search User #3
 	public function testSearchUser3()
    {
    	$this->assertEquals(ArrayHelper::toArray($this->userController->searchUser("natthakan")), ArrayHelper::toArray($this->arrayUser3));
        $this->assertInstanceOf(User::class, $this->user3);
	}	

    // Test Search User #4
 	public function testSearchUser4()
    {
    	$this->assertEquals(ArrayHelper::toArray($this->userController->searchUser("")), ArrayHelper::toArray($this->arrayUser4));
	}	
	
    // Test Search User #5
 	public function testSearchUser5()
    {
    	$this->assertEquals(ArrayHelper::toArray($this->userController->searchUser("abcdefg")), ArrayHelper::toArray($this->arrayUser5));
	}	

}