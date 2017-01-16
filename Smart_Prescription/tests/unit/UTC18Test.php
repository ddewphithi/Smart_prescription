<?php

use app\models\Allergy;
use app\controllers\AllergyController;

class UTC16Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->allergyController = new AllergyController();

        $this->allergy1 = Allergy::find()->where(['allergy_id' => 8])->one();
        $this->allergy1->allergy_id = 8;
        $this->allergy1->personal_id = 1759900241047;
        $this->allergy1->name = "Phithiwat";
        $this->allergy1->surname = "Sitthitun";
        $this->allergy1->prescription = "Pyramidone, co-trimoxazole, aspirin";
        $this->allergy1->reporter = 32;
        $this->allergy1->create_at = "2016-07-30 04:15:11";
        $this->allergy1->update_at = "2016-07-31 04:42:21";

        $this->allergy2 = Allergy::find()->where(['allergy_id' => 00])->one();

        $this->allergy3 = Allergy::find()->where(['allergy_id' => Null])->one();

        $this->allergy4 = Allergy::find()->where(['allergy_id' => "allergyreport"])->one();
    }

    protected function tearDown()
    {
    }

    // Test View Allergy #1
    public function testViewAllergy1()
    {
        $this->assertEquals($this->allergyController->viewAllergy2($this->allergy1), $this->allergy1);
    }

    // Test View Allergy #2
    public function testViewAllergy2()
    {
        $this->assertFalse($this->allergyController->viewAllergy2($this->allergy2), False);
    }

    // Test View Allergy #3
    public function testViewAllergy3()
    {
        $this->assertFalse($this->allergyController->viewAllergy2($this->allergy3), False);
    }

    // Test View Allergy #4
    public function testViewAllergy4()
    {
        $this->assertFalse($this->allergyController->viewAllergy2($this->allergy4), False);
    }

}