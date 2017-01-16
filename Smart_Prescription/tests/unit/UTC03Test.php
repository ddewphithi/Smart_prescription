<?php

use yii\helpers\ArrayHelper; 

use app\models\User;
use app\controllers\UserController;

class UTC03Test extends \PHPUnit_Framework_TestCase
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

		$this->arrayUser = array($this->user1, $this->user2, $this->user3);

    }

    protected function tearDown()
    {
    }

     // Test Get User List #1
 	public function testGetUserList()
    {
    	$this->assertEquals(ArrayHelper::toArray($this->userController->getUserlist(3)), ArrayHelper::toArray($this->arrayUser));
		$this->assertInstanceOf(User::class, $this->user1);
		$this->assertInstanceOf(User::class, $this->user2);
		$this->assertInstanceOf(User::class, $this->user3);

    }

}