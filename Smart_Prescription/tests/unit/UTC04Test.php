<?php
use app\models\User;
use app\controllers\UserController;

class UTC04Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->userController = new UserController();

        $this->user1 = User::find()->where(['id' => 15])->one();
        $this->user1->name = "Phithiwat";
        $this->user1->surnmae = "Sitthitun";
        $this->user1->usernmae = "phithi";
        $this->user1->password = "1234";
        $this->user1->password2 = "1234";
        $this->user1->roleId = 1;

        $this->user2 = User::find()->where(['id' => 99])->one();

        $this->user3 = User::find()->where(['id' => Null])->one();

        $this->user4 = User::find()->where(['id' => "phithiwat"])->one();
    }

    protected function tearDown()
    {
    }

    // Test View User #1
    public function testViewUser1()
    {
        $this->assertEquals($this->userController->viewUser($this->user1), $this->user1);
    }

    // Test View User #2
    public function testViewUser2()
    {
        $this->assertFalse($this->userController->viewUser($this->user2), False);
    }

    // Test View User #3
    public function testViewUser3()
    {
        $this->assertFalse($this->userController->viewUser($this->user3), False);
    }

    // Test View User #4
    public function testViewUser4()
    {
        $this->assertFalse($this->userController->viewUser($this->user4), False);
    }

}