<?php
use app\models\User;
use app\controllers\UserController;

class UTC07Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->userController = new UserController();

        $this->user1 = User::find()->where(['id' => 15])->one();

        $this->user2 = User::find()->where(['id' => 99])->one();

    }

    protected function tearDown()
    {
    }

    // Test Delete User #1
    public function testDeleteUser1()
    {
        $this->assertTrue($this->userController->deleteUser($this->user1), True);
    }

    // Test Delete User #2
    public function testDeleteUser2()
    {
        $this->assertFalse($this->userController->deleteUser($this->user2), False);
    }

}