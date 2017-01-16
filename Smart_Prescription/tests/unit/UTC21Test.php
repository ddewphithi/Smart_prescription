<?php
use app\models\Allergy;
use app\controllers\AllergyController;

class UTC21Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->allergyController = new AllergyController();

        $this->allergy1 = Allergy::find()->where(['allergy_id' => 8])->one();

        $this->allergy2 = Allergy::find()->where(['allergy_id' => 789])->one();

    }

    protected function tearDown()
    {
    }

    // Test Delete Allergy #1
    public function testDeleteAllergy1()
    {
        $this->assertTrue($this->allergyController->deleteAllergy($this->allergy1), True);
    }

    // Test Delete Allergy #2
    public function testDeleteAllergy2()
    {
        $this->assertFalse($this->allergyController->deleteAllergy($this->allergy2), False);
    }

}