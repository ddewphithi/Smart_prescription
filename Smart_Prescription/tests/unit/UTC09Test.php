<?php

use yii\helpers\ArrayHelper;

use app\models\Patient;
use app\controllers\PatientController;

class UTC09Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->patientController = new PatientController();

        $this->patient1 = new Patient();
        $this->patient1->personal_id = 1719900241047;
        $this->patient1->name = "Somkiat";
        $this->patient1->surname = "Warahala";
        $this->patient1->prescription = "Paracetamal 500ml.";
        $this->pateint1->create_by = 31;
        $this->patient1->username = "somkiat";
        $this->patient1->password = "54139";
        $this->patient1->create_at = "2016-07-31 18:36:28";
        $this->patient1->update_at = "2016-07-31 18:36:28";

        $this->patient2 = new Patient();
        $this->patient2->personal_id = 1769900241047;
        $this->patient2->name = "Dangdee";
        $this->patient2->surname = "Rakna";
        $this->patient2->prescription = "Vitamin C 90 ml.";
        $this->patient2->create_by = 32;
        $this->patient2->username = "dang";
        $this->patient2->password = "67045";
        $this->patient2->create_at = "2016-07-30 23:55:17";
        $this->patient2->update_at = "2016-07-30 23:59:23";

        $this->patient3 = new Patient();
        $this->patient3->personal_id = 1660100485726;
        $this->patient3->name = "Vikom";
        $this->patient3->surname = "Chomjai";
        $this->patient3->prescription = "Dextrometrophan";
        $this->patient3->create_by = 32;
        $this->patient3->username = "vikom";
        $this->patient3->password = "58706";
        $this->patient3->create_at = "2016-08-01 03:39:11";
        $this->patient3->update_at = "2016-08-01 03:39:11";

        $this->arrayPatient = array($this->patient1, $this->patient2, $this->patient3);

    }

    protected function tearDown()
    {
    }

    // Test Get Patient List #1
    public function testGetPatientList()
    {
        $this->assertEquals(ArrayHelper::toArray($this->patientController->getPatientlist(3)), ArrayHelper::toArray($this->arrayPatient));
        $this->assertInstanceOf(Patient::class, $this->patient1);
        $this->assertInstanceOf(Patient::class, $this->patient2);
        $this->assertInstanceOf(Patient::class, $this->patient3);

    }

}