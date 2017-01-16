<?php

use app\models\Allergy;
use app\controllers\AllergyController;

class UTC16Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->allergyController = new AllergyController();

        $this->allergy1 = Allergy::find()->where(['allergy_id' => 11])->one();
        $this->allergy3->allergy_id = 11;
        $this->allergy3->personal_id = 1779900241047;
        $this->allergy3->name = "Somjai";
        $this->allergy3->surname = "Ngaila";
        $this->allergy3->prescription = "Multivitamins";
        $this->allergy3->reporter = 31;
        $this->allergy3->create_at = "2016-07-31 18:47:11";
        $this->allergy3->update_at = "2016-07-31 18:47:11";

        $this->allergy2 = Allergy::find()->where(['allergy_id' => 99])->one();

        $this->allergy3 = Allergy::find()->where(['allergy_id' => Null])->one();

        $this->allergy4 = Allergy::find()->where(['allergy_id' => "allergyid"])->one();
    }

    protected function tearDown()
    {
    }

    // Test View Allergy #1
    public function testViewAllergy1()
    {
        $this->assertEquals($this->allergyController->viewAllergy($this->allergy1), $this->allergy1);
    }

    // Test View Allergy #2
    public function testViewAllergy2()
    {
        $this->assertFalse($this->allergyController->viewAllergy($this->allergy2), False);
    }

    // Test View Allergy #3
    public function testViewAllergy3()
    {
        $this->assertFalse($this->allergyController->viewAllergy($this->allergy3), False);
    }

    // Test View Allergy #4
    public function testViewAllergy4()
    {
        $this->assertFalse($this->allergyController->viewAllergy($this->allergy4), False);
    }

}