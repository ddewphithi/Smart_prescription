<?php

use app\models\Patient;
use app\controllers\PatientController;

class UTC13Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
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

        $this->arrayPatient1 = array($this->patient3);
        $this->arrayPatient2 = array($this->patient1);
        $this->arrayPatient3 = array($this->patient2);
        $this->arrayPatient4 = array($this->patient1, $this->patient2, $this->patient3);
        $this->arrayPatient5 = array(Null);
    }

    protected function tearDown()
    {
    }

    // Test Search Patient #1
    public function testSearchPatient1()
    {
        $this->assertEquals(ArrayHelper::toArray($this->patientController->searchPatient("1660100485726")), ArrayHelper::toArray($this->arrayPatient1));
        $this->assertInstanceOf(Patient::class, $this->patient3);
    }

    // Test Search Patient #2
    public function testSearchPatient2()
    {
        $this->assertEquals(ArrayHelper::toArray($this->patientController->searchUser("Somkiat")), ArrayHelper::toArray($this->arrayPatient2));
        $this->assertInstanceOf(Patient::class, $this->patient1);
    }

    // Test Search Patient #3
    public function testSearchPatient3()
    {
        $this->assertEquals(ArrayHelper::toArray($this->patientController->searchUser("Rakna")), ArrayHelper::toArray($this->arrayPatient3));
        $this->assertInstanceOf(Patient::class, $this->patient2);
    }

    // Test Search Patient #4
    public function testSearchPatient4()
    {
        $this->assertEquals(ArrayHelper::toArray($this->patientController->searchUser("")), ArrayHelper::toArray($this->arrayPatient4));
    }

    // Test Search Patient #5
    public function testSearchPatient5()
    {
        $this->assertEquals(ArrayHelper::toArray($this->patientController->searchUser("qwert")), ArrayHelper::toArray($this->arrayPatient5));
    }
}