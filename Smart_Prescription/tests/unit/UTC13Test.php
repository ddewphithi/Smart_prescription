<?php
use app\models\Patient;
use app\controllers\PatientController;

class UTC13Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->patientController = new PatientController();

        $this->patient1 = Patient::find()->where(['personal_id' => 1799900241047])->one();

        $this->patient2 = Patient::find()->where(['personal_id' => 1234567890987])->one();

    }

    protected function tearDown()
    {
    }

    // Test Delete Patient #1
    public function testDeletePatient1()
    {
        $this->assertTrue($this->patientController->deletePatient($this->patient1), True);
    }

    // Test Delete Patient #2
    public function testDeletePatient2()
    {
        $this->assertFalse($this->patientController->deletePatient($this->patient2), False);
    }

}