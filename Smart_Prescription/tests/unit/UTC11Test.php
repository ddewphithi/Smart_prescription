<?php
use yii\helpers\ArrayHelper;

use app\models\Patient;
use app\controllers\PatientController;

class UTC11Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->patientController = new PatientController();

        $this->patient1 = new Patient();
        $this->patient1->personal_id = 1660100485726;
        $this->patient1->name = "Vikom";
        $this->patient1->surname = "Chomjai";
        $this->patient1->prescription = "Paracetamal 500ml.";
        $this->patient1->usernmae = "vikom";

        $this->patient2 = new Patient();
        $this->patient2->personal_id = 1660100485726;
        $this->patient2->name = "Mana";
        $this->patient2->surname = "Sornjai";
        $this->patient2->prescription = "Aspirin 75ml.";
        $this->patient2->usernmae = "mana";

        $this->patient3 = new Patient();
        $this->patient3->personal_id = 1660100485726;
        $this->patient3->name = "Mana";
        $this->patient3->surname = "Sornjai";
        $this->patient3->prescription = "Aspirin 75ml.";
        $this->patient3->usernmae = "vikom";

        $this->patient4 = new Patient();
        $this->patient4->personal_id = Null;
        $this->patient4->name = "Vikom";
        $this->patient4->surname = "Chomjai";
        $this->patient4->prescription = "Paracetamal 500ml.";
        $this->patient4->usernmae = "vikom";

        $this->patient5 = new Patient();
        $this->patient5->personal_id = 1660100485726;
        $this->patient5->name = Null;
        $this->patient5->surname = "Chomjai";
        $this->patient5->prescription = "Paracetamal 500ml.";
        $this->patient5->usernmae = "vikom";

        $this->patient6 = new Patient();
        $this->patient6->personal_id = 1660100485726;
        $this->patient6->name = "Vikom";
        $this->patient6->surname = Null;
        $this->patient6->prescription = "Paracetamal 500ml.";
        $this->patient6->usernmae = "vikom";

        $this->patient7 = new Patient();
        $this->patient7->personal_id = 1660100485726;
        $this->patient7->name = "Vikom";
        $this->patient7->surname = "Chomjai";
        $this->patient7->prescription = Null;
        $this->patient7->usernmae = "vikom";

        $this->patient8 = new Patient();
        $this->patient8->personal_id = 1660100485726;
        $this->patient8->name = "Vikom";
        $this->patient8->surname = "Chomjai";
        $this->patient8->prescription = "Paracetamal 500ml.";
        $this->patient8->usernmae = Null;
    }

    protected function tearDown()
    {
    }

    // Test Create Patient #1
    public function testCreatePatient1()
    {
        $this->assertTrue($this->patientController->createPatient($this->patient1), TRUE);
    }

    // Test Create Patient #2
    public function testCreatePatient2()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient2), FALSE);
    }

    // Test Create Patient #3
    public function testCreatePatient3()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient3), FALSE);
    }

    // Test Create Patient #4
    public function testCreatePatient4()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient4), FALSE);
    }

    // Test Create Patient #5
    public function testCreatePatient5()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient5), FALSE);
    }

    // Test Create Patient #6
    public function testCreatePatient6()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient6), FALSE);
    }

    // Test Create Patient #7
    public function testCreatePatient7()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient7), FALSE);
    }

    // Test Create Patient #8
    public function testCreatePatient8()
    {
        $this->assertFalse($this->patientController->createPatient($this->patient8), FALSE);
    }

    // Test Create Patient #9
    public function testCreatePatient9()
    {
        $this->assertFalse($this->patientController->createPatient("test"), FALSE);
    }

    // Test Create Patient #10
    public function testCreatePatient10()
    {
        $this->assertFalse($this->patientController->createPatient(""), FALSE);
    }

    // Test Create Patient #11
    public function testCreatePatient11()
    {
        $this->assertFalse($this->patientController->createPatient(123), FALSE);
    }

    // Test Create Patient #12
    public function testCreatePatient12()
    {
        $this->assertFalse($this->patientController->createPatient(Null), FALSE);
    }
}