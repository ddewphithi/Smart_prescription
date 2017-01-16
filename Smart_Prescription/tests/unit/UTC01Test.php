<?php
use app\models\LoginForm;
use app\controllers\SiteController;

class UTC01Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->siteController = new SiteController();

        $this->login1 = new LoginForm();
        $this->login1->username = "admin";
        $this->login1->password = "admin";

        $this->login2 = new LoginForm();
        $this->login2->username = "admin12";
        $this->login2->password = "admin12";

        $this->login3 = new LoginForm();
        $this->login3->username = "admin";
        $this->login3->password = "admin12";

        $this->login4 = new LoginForm();
        $this->login4->username = "admin12";
        $this->login4->password = "admin";

        $this->login5 = new LoginForm();
        $this->login5->username = "admin";
        $this->login5->password = Null;

        $this->login6 = new LoginForm();
        $this->login6->username = Null;
        $this->login6->password = "admin";

    }

    protected function tearDown()
    {
    }

    // Test Login #1
    public function testLogin1()
    {
        $this->assertTrue($this->siteController->login($this->login1), TRUE);
    }

    // Test Login #2
    public function testLogin2()
    {
        $this->assertFalse($this->siteController->login($this->login2), FALSE);
    }

    // Test Login #3
    public function testLogin3()
    {
        $this->assertFalse($this->siteController->login($this->login3), FALSE);
    }

    // Test Login #4
    public function testLogin4()
    {
        $this->assertFalse($this->siteController->login($this->login4), FALSE);
    }

    // Test Login #5
    public function testLogin5()
    {
        $this->assertFalse($this->siteController->login($this->login5), FALSE);
    }

    // Test Login #6
    public function testLogin6()
    {
        $this->assertFalse($this->siteController->login($this->login6), FALSE);
    }
}