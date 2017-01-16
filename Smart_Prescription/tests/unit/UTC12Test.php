<?php

use yii\helpers\ArrayHelper;

use app\models\Patient;
use app\controllers\PatientController;

class UTC12Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->patientController = new PatientController();

        $this->patient1 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient1->personal_id = 1660100485726;
        $this->patient1->name = "Vikom";
        $this->patient1->surname = "Chomjai";
        $this->patient1->prescription = "Paracetamal 500ml.";
        $this->patient1->usernmae = "vikom";

        $this->patient2 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient2->personal_id = 1660100485726;
        $this->patient2->name = "Mana";
        $this->patient2->surname = "Sornjai";
        $this->patient2->prescription = "Aspirin 75ml.";
        $this->patient2->usernmae = "mana";

        $this->patient3 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient3->personal_id = 1660100485726;
        $this->patient3->name = "Mana";
        $this->patient3->surname = "Sornjai";
        $this->patient3->prescription = "Aspirin 75ml.";
        $this->patient3->usernmae = "vikom";

        $this->patient4 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient4->personal_id = Null;
        $this->patient4->name = "Vikom";
        $this->patient4->surname = "Chomjai";
        $this->patient4->prescription = "Paracetamal 500ml.";
        $this->patient4->usernmae = "vikom";

        $this->patient5 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient5->personal_id = 1660100485726;
        $this->patient5->name = Null;
        $this->patient5->surname = "Chomjai";
        $this->patient5->prescription = "Paracetamal 500ml.";
        $this->patient5->usernmae = "vikom";

        $this->patient6 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient6->personal_id = 1660100485726;
        $this->patient6->name = "Vikom";
        $this->patient6->surname = Null;
        $this->patient6->prescription = "Paracetamal 500ml.";
        $this->patient6->usernmae = "vikom";

        $this->patient7 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient7->personal_id = 1660100485726;
        $this->patient7->name = "Vikom";
        $this->patient7->surname = "Chomjai";
        $this->patient7->prescription = Null;
        $this->patient7->usernmae = "vikom";

        $this->patient8 = Patient::find()->where(['personal_id' => 1660100485726])->one();
        $this->patient8->personal_id = 1660100485726;
        $this->patient8->name = "Vikom";
        $this->patient8->surname = "Chomjai";
        $this->patient8->prescription = "Paracetamal 500ml.";
        $this->patient8->usernmae = Null;
    }

    protected function tearDown()
    {
    }

    // Test Update Patient #1
    public function testUpdatePatient1()
    {
        $this->assertTrue($this->patientController->updatePatient($this->patient1), TRUE);
    }

    // Test Update Patient #2
    public function testUpdatePatient2()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient2), FALSE);
    }

    // Test Update Patient #3
    public function testUpdatePatient3()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient3), FALSE);
    }

    // Test Update Patient #4
    public function testUpdatePatient4()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient4), FALSE);
    }

    // Test Update Patient #5
    public function testUpdatePatient5()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient5), FALSE);
    }

    // Test Update Patient #6
    public function testUpdatePatient6()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient6), FALSE);
    }

    // Test Update Patient #7
    public function testUpdatePatient7()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient7), FALSE);
    }

    // Test Update Patient #8
    public function testUpdatePatient8()
    {
        $this->assertFalse($this->patientController->updatePatient($this->patient8), FALSE);
    }

    // Test Update Patient #9
    public function testUpdatePatient9()
    {
        $this->assertFalse($this->patientController->updatePatient("test"), FALSE);
    }

    // Test Update Patient #10
    public function testUpdatePatient10()
    {
        $this->assertFalse($this->patientController->updatePatient(""), FALSE);
    }

    // Test Update Patient #11
    public function testUpdatePatient11()
    {
        $this->assertFalse($this->patientController->updatePatient(123), FALSE);
    }

    // Test Update Patient #12
    public function testUpdatePatient12()
    {
        $this->assertFalse($this->patientController->updatePatient(Null), FALSE);
    }
}