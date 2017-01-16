<?php

use app\models\Patient;
use app\controllers\PatientController;

class UTC10Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->patientController = new PatientController();

        $this->patient1 = Patient::find()->where(['personal_id' => 1719900241047])->one();
        $this->patient1->name = "Somkiat";
        $this->patient1->surnmae = "Warahala";
        $this->patient1->usernmae = "Paracetamal 500ml.";
        $this->pateint1->create_by = 31;
        $this->patient1->username = "somkiat";
        $this->patient1->password = "54139";
        $this->patient1->create_at = "2016-07-31 18:36:28";
        $this->patient1->update_at = "2016-07-31 18:36:28";

        $this->patient2 = Patient::find()->where(['personal_id' => 1111111111])->one();

        $this->patient3 = Patient::find()->where(['personal_id' => Null])->one();

        $this->patient4 = Patient::find()->where(['personal_id' => "personal_id"])->one();
    }

    protected function tearDown()
    {
    }

    // Test View Patient #1
    public function testViewPatient1()
    {
        $this->assertEquals($this->patientController->viewPatient($this->patient1), $this->patient1);
    }

    // Test View Patient #2
    public function testViewPatient2()
    {
        $this->assertFalse($this->patientController->viewPatient($this->patient2), False);
    }

    // Test View Patient #3
    public function testViewPatient3()
    {
        $this->assertFalse($this->patientController->viewPatient($this->patient3), False);
    }

    // Test View Patient #4
    public function testViewPatient4()
    {
        $this->assertFalse($this->patientController->viewPatient($this->patient4), False);
    }

}