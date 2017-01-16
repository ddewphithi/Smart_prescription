<?php

use yii\helpers\ArrayHelper;

use app\models\Allergy;
use app\controllers\AllergyController;

class UTC22Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->allergyController = new AllergyController();

        $this->allergy1 = new Allergy();
        $this->allergy1->allergy_id = 8;
        $this->allergy1->personal_id = 1759900241047;
        $this->allergy1->name = "Phithiwat";
        $this->allergy1->surname = "Sitthitun";
        $this->allergy1->prescription = "Pyramidone, co-trimoxazole, aspirin";
        $this->allergy1->reporter = 32;
        $this->allergy1->create_at = "2016-07-30 04:15:11";
        $this->allergy1->update_at = "2016-07-31 04:42:21";

        $this->allergy2 = new Allergy();
        $this->allergy2->allergy_id = 10;
        $this->allergy2->personal_id = 1600100485726;
        $this->allergy2->name = "Natthakan";
        $this->allergy2->surname = "Kaeokanpai";
        $this->allergy2->prescription = "Vitamin C";
        $this->allergy2->reporter = 32;
        $this->allergy2->create_at = "2016-07-31 04:20:43";
        $this->allergy2->update_at = "2016-07-31 04:20:43";

        $this->allergy3 = new Allergy();
        $this->allergy3->allergy_id = 11;
        $this->allergy3->personal_id = 1779900241047;
        $this->allergy3->name = "Somjai";
        $this->allergy3->surname = "Ngaila";
        $this->allergy3->prescription = "Multivitamins";
        $this->allergy3->reporter = 31;
        $this->allergy3->create_at = "2016-07-31 18:47:11";
        $this->allergy3->update_at = "2016-07-31 18:47:11";

        $this->arrayAllergy1 = array($this->allergy1);
        $this->arrayAllergy2 = array($this->allergy3);
        $this->arrayAllergy3 = array($this->allergy2);
        $this->arrayAllergy4 = array($this->allergy1, $this->allergy2, $this->allergy3);
        $this->arrayAllergy5 = array(Null);

    }

    protected function tearDown()
    {
    }

    // Test Search Allergy #1
    public function testSearchAllergy1()
    {
        $this->assertEquals(ArrayHelper::toArray($this->allergyController->searchPatient("175990241047")), ArrayHelper::toArray($this->arrayAllergy1));
        $this->assertInstanceOf(Allergy::class, $this->allergy1);
    }

    // Test Search Allergy #2
    public function testSearchAllergy2()
    {
        $this->assertEquals(ArrayHelper::toArray($this->allergyController->searchUser("Somjai")), ArrayHelper::toArray($this->arrayAllergy2));
        $this->assertInstanceOf(Allergy::class, $this->allergy3);
    }

    // Test Search Allergy #3
    public function testSearchAllergy3()
    {
        $this->assertEquals(ArrayHelper::toArray($this->allergyController->searchUser("Kaeokanpai")), ArrayHelper::toArray($this->arrayAllergy3));
        $this->assertInstanceOf(Allergy::class, $this->allergy2);
    }

    // Test Search Allergy #4
    public function testSearchAllergy4()
    {
        $this->assertEquals(ArrayHelper::toArray($this->allergyController->searchUser("")), ArrayHelper::toArray($this->arrayAllergy4));
    }

    // Test Search Allergy #5
    public function testSearchAllergy5()
    {
        $this->assertEquals(ArrayHelper::toArray($this->allergyController->searchUser("aaaaa")), ArrayHelper::toArray($this->arrayAllergy5));
    }

}