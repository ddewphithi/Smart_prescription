<?php
use yii\helpers\ArrayHelper;

use app\models\Allergy;
use app\controllers\AllergyController;

class UTC19Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->allergyController = new AllergyController();

        $this->allergy1 = Allergy::find()->where(['allergy_id' => 10])->one();
        $this->allergy1->personal_id = 1600100485726;
        $this->allergy1->name = "Natthakan";
        $this->allergy1->surname = "Kaeokanpai";
        $this->allergy1->allergy_drug = "Vitamin C, Multivitamins";

        $this->allergy2 = Allergy::find()->where(['allergy_id' => 10])->one();
        $this->allergy2->personal_id = 1759900241047;
        $this->allergy2->name = "Natthakan";
        $this->allergy2->surname = "Kaeokanpai";
        $this->allergy2->prescription = "Vitamin C, Multivitamins";

        $this->allergy3 = Allergy::find()->where(['allergy_id' => 10])->one();
        $this->allergy3->personal_id = Null;
        $this->allergy3->name = "Natthakan";
        $this->allergy3->surname = "Kaeokanpai";
        $this->allergy3->allergy_drug = "Vitamin C, Multivitamins";

        $this->allergy4 = Allergy::find()->where(['allergy_id' => 10])->one();
        $this->allergy4->personal_id = 1600100485726;
        $this->allergy4->name = Null;
        $this->allergy4->surname = "Kaeokanpai";
        $this->allergy4->allergy_drug = "Vitamin C, Multivitamins";

        $this->allergy5 = Allergy::find()->where(['allergy_id' => 10])->one();
        $this->allergy5->personal_id = 1600100485726;
        $this->allergy5->name = "Natthakan";
        $this->allergy5->surname = Null;
        $this->allergy5->allergy_drug = "Vitamin C, Multivitamins";

        $this->allergy6 = Allergy::find()->where(['allergy_id' => 10])->one();
        $this->allergy6->personal_id = 1600100485726;
        $this->allergy6->name = "Natthakan";
        $this->allergy6->surname = "Kaeokanpai";
        $this->allergy6->allergy_drug = Null;
    }

    protected function tearDown()
    {
    }

    // Test Update Allergy #1
    public function testUpdateAllergy1()
    {
        $this->assertTrue($this->allergyController->updateAllergy($this->allergy1), TRUE);
    }

    // Test Update Allergy #2
    public function testUpdateAllergy2()
    {
        $this->assertFalse($this->allergyController->updateAllergy($this->allergy2), FALSE);
    }

    // Test Update Allergy #3
    public function testUpdateAllergy3()
    {
        $this->assertFalse($this->allergyController->updateAllergy($this->allergy3), FALSE);
    }

    // Test Update Patient #4
    public function testUpdateAllergy4()
    {
        $this->assertFalse($this->allergyController->updateAllergy($this->allergy4), FALSE);
    }

    // Test Update Allergy #5
    public function testUpdateAllergy5()
    {
        $this->assertFalse($this->allergyController->updateAllergy($this->allergy5), FALSE);
    }

    // Test Update Allergy #6
    public function testUpdateAllergy6()
    {
        $this->assertFalse($this->allergyController->updateAllergy($this->allergy6), FALSE);
    }

    // Test Update Allergy #7
    public function testUpdateAllergy7()
    {
        $this->assertFalse($this->allergyController->updateAllergy("Allergy"), FALSE);
    }

    // Test Update Allergy #8
    public function testUpdateAllergy8()
    {
        $this->assertFalse($this->allergyController->updateAllergy(""), FALSE);
    }

    // Test Update Allergy #9
    public function testUpdateAllergy9()
    {
        $this->assertFalse($this->allergyController->updateAllergy(500), FALSE);
    }

    // Test Update Allergy #10
    public function testUpdateAllergy10()
    {
        $this->assertFalse($this->allergyController->updateAllergy(Null), FALSE);
    }
}