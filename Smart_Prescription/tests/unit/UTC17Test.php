<?php

use yii\helpers\ArrayHelper;

use app\models\Allergy;
use app\controllers\AllergyController;

class UTC17Test extends \PHPUnit_Framework_TestCase
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

        $this->arrayAllergy = array($this->allergy1, $this->allergy2, $this->allergy3);

    }

    protected function tearDown()
    {
    }

    // Test Get Allergy List #1
    public function testGetAllergyList2()
    {
        $this->assertEquals(ArrayHelper::toArray($this->allergyController->getAllergylist2(3)), ArrayHelper::toArray($this->arrayAllergy));
        $this->assertInstanceOf(Allergy::class, $this->allergy1);
        $this->assertInstanceOf(Allergy::class, $this->allergy2);
        $this->assertInstanceOf(Allergy::class, $this->allergy3);

    }

}