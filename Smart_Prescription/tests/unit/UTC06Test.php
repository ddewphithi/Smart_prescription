<?php

use app\models\User;
use app\controllers\UserController;

class UTC06Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
		$this->userController = new UserController();

		$this->user1 = User::find()->where(['id' => 29])->one();
		$this->user1->name = "Steve";
		$this->user1->surnmae = "Rogers";
		$this->user1->usernmae = "rogers";
		$this->user1->password = "rogers";
		$this->user1->password2 = "rogers";
		$this->user1->roleId = 2;

        $this->user2 = User::find()->where(['id' => 29])->one();
        $this->user2->name = "Steve";
        $this->user2->surnmae = "Rogers";
        $this->user2->usernmae = "phithi";
        $this->user2->password = "rogers";
        $this->user2->password2 = "rogers";
        $this->user2->roleId = 2;

        $this->user3 = User::find()->where(['id' => 29])->one();
        $this->user3->name = Null;
        $this->user3->surnmae = "Rogers";
        $this->user3->usernmae = "rogers";
        $this->user3->password = "rogers";
        $this->user3->password2 = "rogers";
        $this->user3->roleId = 2;

        $this->user4 = User::find()->where(['id' => 29])->one();
        $this->user4->name = "Steve";
        $this->user4->surnmae = Null;
        $this->user4->usernmae = "rogers";
        $this->user4->password = "rogers";
        $this->user4->password2 = "rogers";
        $this->user4->roleId = 2;

        $this->user5 = User::find()->where(['id' => 29])->one();
        $this->user5->name = "Steve";
        $this->user5->surnmae = "Rogers";
        $this->user5->usernmae = Null;
        $this->user5->password = "rogers";
        $this->user5->password2 = "rogers";
        $this->user5->roleId = 2;

        $this->user6 = User::find()->where(['id' => 29])->one();
        $this->user6->name = "Steve";
        $this->user6->surnmae = "Rogers";
        $this->user6->usernmae = "rogers";
        $this->user6->password = Null;
        $this->user6->password2 = "rogers";
        $this->user6->roleId = 2;

        $this->user7 = User::find()->where(['id' => 29])->one();
        $this->user7->name = "Steve";
        $this->user7->surnmae = "Rogers";
        $this->user7->usernmae = "rogers";
        $this->user7->password = "rogers";
        $this->user7->password2 = Null;
        $this->user7->roleId = 2;

        $this->user8 = User::find()->where(['id' => 29])->one();
        $this->user8->name = "Steve";
        $this->user8->surnmae = "Rogers";
        $this->user8->usernmae = "rogers";
        $this->user8->password = "rogers";
        $this->user8->password2 = "rogers";
        $this->user8->roleId = Null;

    }

    protected function tearDown()
    {
    }

    // Test Update User #1
    public function testUpdateUser1()
    {
        $this->assertTrue($this->userController->updateUser($this->user1), TRUE);
    }

    // Test Update User #2
    public function testUpdateUser2()
    {
        $this->assertFalse($this->userController->updateUser($this->user2), FALSE);
    }

    // Test Update User #3
    public function testUpdateUser3()
    {
        $this->assertFalse($this->userController->updateUser($this->user3), FALSE);
    }

    // Test Update User #4
    public function testUpdateUser4()
    {
        $this->assertFalse($this->userController->updateUser($this->user4), FALSE);
    }

    // Test Update User #5
    public function testUpdateUser5()
    {
        $this->assertFalse($this->userController->updateUser($this->user5), FALSE);
    }

    // Test Update User #6
    public function testUpdateUser6()
    {
        $this->assertFalse($this->userController->updateUser($this->user6), FALSE);
    }

    // Test Update User #7
    public function testUpdateUser7()
    {
        $this->assertFalse($this->userController->updateUser($this->user7), FALSE);
    }

    // Test Update User #8
    public function testUpdateUser8()
    {
        $this->assertFalse($this->userController->updateUser($this->user8), FALSE);
    }

    // Test Update User #9
    public function testUpdateUser9()
    {
        $this->assertFalse($this->userController->updateUser("test"), FALSE);
    }

    // Test Update User #10
    public function testUpdateUser10()
    {
        $this->assertFalse($this->userController->updateUser(""), FALSE);
    }

    // Test Update User #11
    public function testUpdateUser11()
    {
        $this->assertFalse($this->userController->updateUser(00), FALSE);
    }

    // Test Update User #12
    public function testUpdateUser12()
    {
        $this->assertFalse($this->userController->updateUser(Null), FALSE);
    }
}