<?php

use yii\helpers\ArrayHelper; 

use app\models\User;
use app\controllers\UserController;

class UTC05Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
		$this->userController = new UserController();

		$this->user1 = new User();
		$this->user1->name = "Steve";
		$this->user1->surname = "Rogers";
		$this->user1->usernmae = "steve";
		$this->user1->password = "1234";
		$this->user1->password2 = "1234";
		$this->user1->roleId = 1;
			
		$this->user2 = new User();
		$this->user2->name = "Tony";
		$this->user2->surname = "Stark";
		$this->user2->username = "steve";
		$this->user2->password = "tony";
		$this->user2->password2 = "tony";
		$this->user2->roledId = 2;

        $this->user3 = new User();
        $this->user3->name = Null;
        $this->user3->surname = "Rogers";
        $this->user3->username = "steve";
        $this->user3->password = "1234";
        $this->user3->password2 = "1234";
        $this->user3->roledId = 1;

        $this->user4 = new User();
        $this->user4->name = "Steve";
        $this->user4->surname = Null;
        $this->user4->usernmae = "steve";
        $this->user4->password = "1234";
        $this->user4->password2 = "1234";
        $this->user4->roleId = 1;

        $this->user5 = new User();
        $this->user5->name = "Steve";
        $this->user5->surname = "Rogers";
        $this->user5->usernmae = Null;
        $this->user5->password = "1234";
        $this->user5->password2 = "1234";
        $this->user5->roleId = 1;

        $this->user6 = new User();
        $this->user6->name = "Steve";
        $this->user6->surname = "Rogers";
        $this->user6->usernmae = "steve";
        $this->user6->password = Null;
        $this->user6->password2 = "1234";
        $this->user6->roleId = 1;

        $this->user7 = new User();
        $this->user7->name = "Steve";
        $this->user7->surname = "Rogers";
        $this->user7->usernmae = "steve";
        $this->user7->password = "1234";
        $this->user7->password2 = Null;
        $this->user7->roleId = 1;

        $this->user8 = new User();
        $this->user8->name = "Steve";
        $this->user8->surname = "Rogers";
        $this->user8->usernmae = "steve";
        $this->user8->password = "1234";
        $this->user8->password2 = "1234";
        $this->user8->roleId = Null;
		
    }

    protected function tearDown()
    {
    }
	
    // Test Create User #1
 	public function testCreateUser1()
    {
		$this->assertTrue($this->userController->createUser($this->user1), TRUE);
    }  
	
	// Test Create User #2
 	public function testCreateUser2()
    {
		$this->assertFalse($this->userController->createUser($this->user2), FALSE);
    }

    // Test Create User #3
    public function testCreateUser3()
    {
        $this->assertFalse($this->userController->createUser($this->user3), FALSE);
    }

    // Test Create User #4
    public function testCreateUser4()
    {
        $this->assertFalse($this->userController->createUser($this->user4), FALSE);
    }

    // Test Create User #5
    public function testCreateUser5()
    {
        $this->assertFalse($this->userController->createUser($this->user5), FALSE);
    }

    // Test Create User #6
    public function testCreateUser6()
    {
        $this->assertFalse($this->userController->createUser($this->user6), FALSE);
    }

    // Test Create User #7
    public function testCreateUser7()
    {
        $this->assertFalse($this->userController->createUser($this->user7), FALSE);
    }

    // Test Create User #8
    public function testCreateUser8()
    {
        $this->assertFalse($this->userController->createUser($this->user8), FALSE);
    }

    // Test Create User #9
 	public function testCreateUser9()
    {
		$this->assertFalse($this->userController->createUser("test"), FALSE);
    } 
	
	// Test Create User #10
 	public function testCreateUser10()
    {
		$this->assertFalse($this->userController->createUser(""), FALSE);
    } 

	// Test Create User #11
 	public function testCreateUser11()
    {
		$this->assertFalse($this->userController->createUser(00), FALSE);
    }

    // Test Create User #12
    public function testCreateUser12()
    {
        $this->assertFalse($this->userController->createUser(Null), FALSE);
    }
}