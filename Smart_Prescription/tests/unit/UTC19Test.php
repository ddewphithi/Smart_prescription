<?php
use yii\helpers\ArrayHelper;

use app\models\Allergy;
use app\controllers\AllergyController;

class UTC19Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->allergyController = new AllergyController();

        $this->allergy1 = new Allergy();
        $this->allergy1->personal_id = 1600100485726;
        $this->allergy1->name = "Natthakan";
        $this->allergy1->surname = "Kaeokanpai";
        $this->allergy1->allergy_drug = "Vitamin C";

        $this->allergy2 = new Allergy();
        $this->allergy2->personal_id = 1600100485726;
        $this->allergy2->name = "Phithiwat";
        $this->allergy2->surname = "Sitthitun";
        $this->allergy2->prescription = "Pyramidone, Co-Trimoxazole, Aspirin";

        $this->allergy3 = new Allergy();
        $this->allergy3->personal_id = Null;
        $this->allergy3->name = "Natthakan";
        $this->allergy3->surname = "Kaeokanpai";
        $this->allergy3->allergy_drug = "Vitamin C";

        $this->allergy4 = new Allergy();
        $this->allergy4->personal_id = 1600100485726;
        $this->allergy4->name = Null;
        $this->allergy4->surname = "Kaeokanpai";
        $this->allergy4->allergy_drug = "Vitamin C";

        $this->allergy5 = new Allergy();
        $this->allergy5->personal_id = 1600100485726;
        $this->allergy5->name = "Natthakan";
        $this->allergy5->surname = Null;
        $this->allergy5->allergy_drug = "Vitamin C";

        $this->allergy6 = new Allergy();
        $this->allergy6->personal_id = 1600100485726;
        $this->allergy6->name = "Natthakan";
        $this->allergy6->surname = "Kaeokanpai";
        $this->allergy6->allergy_drug = Null;
    }

    protected function tearDown()
    {
    }

    // Test Create Allergy #1
    public function testCreateAllergy1()
    {
        $this->assertTrue($this->allergyController->createAllergy($this->allergy1), TRUE);
    }

    // Test Create Allergy #2
    public function testCreateAllergy2()
    {
        $this->assertFalse($this->allergyController->createAllergy($this->allergy2), FALSE);
    }

    // Test Create Allergy #3
    public function testCreateAllergy3()
    {
        $this->assertFalse($this->allergyController->createAllergy($this->allergy3), FALSE);
    }

    // Test Create Patient #4
    public function testCreateAllergy4()
    {
        $this->assertFalse($this->allergyController->createAllergy($this->allergy4), FALSE);
    }

    // Test Create Allergy #5
    public function testCreateAllergy5()
    {
        $this->assertFalse($this->allergyController->createAllergy($this->allergy5), FALSE);
    }

    // Test Create Allergy #6
    public function testCreateAllergy6()
    {
        $this->assertFalse($this->allergyController->createAllergy($this->allergy6), FALSE);
    }

    // Test Create Allergy #7
    public function testCreateAllergy7()
    {
        $this->assertFalse($this->allergyController->createAllergy("Allergy"), FALSE);
    }

    // Test Create Allergy #8
    public function testCreateAllergy8()
    {
        $this->assertFalse($this->allergyController->createAllergy(""), FALSE);
    }

    // Test Create Allergy #9
    public function testCreateAllergy9()
    {
        $this->assertFalse($this->allergyController->createAllergy(500), FALSE);
    }

    // Test Create Allergy #10
    public function testCreateAllergy10()
    {
        $this->assertFalse($this->allergyController->createAllergy(Null), FALSE);
    }
}