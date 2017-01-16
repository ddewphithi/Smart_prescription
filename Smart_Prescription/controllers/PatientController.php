<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{
    public $patients;


    //public function __construct() {}
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create', 'update','admin','delete','view'],
                'rules' => [
                    // deny all POST requests
//                    [
//                        'allow' => false,
//                        'verbs' => ['POST']
//                    ],
                    // allow authenticated users
                    [
                        'actions' =>['index','create', 'update','admin','delete','view'],
                        'allow' => true,
                        'roles' => [User::ROLE_DOCTOR],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }


    /**
     * Lists all Patient models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getPatientList()
    {
        $patient = Patient::find()->all();
        return $patient;
    }

    /**
     * Displays a single Patient model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * @param $personal_id
     * @return bool|null|static
     */
    public function viewPatient($personal_id)
    {
        if(($personal_id == false) || (is_int($personal_id)))
        {
            return false;
        } else {
            $patient = Patient::findOne(['id' => $personal_id]);
            return $patient;
        }
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();
        $request = Yii::$app->getRequest();
            if ($request->isPost && $request->post('ajax') !== null) {
                $model->load(Yii::$app->request->post());
                Yii::$app->response->format = Response::FORMAT_JSON;
                $result = ActiveForm::validate($model);
                return $result;
            }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $length = 5;
            $chars = array_merge(range(0,9));
            shuffle($chars);
            $model->password = implode(array_slice($chars, 0, $length));

            if($this->createPatient($model)==$model){
                return $this->redirect(['view', 'id'=>$model->personal_id]);
            } else {
                return $this->redirect(['create']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * @param $patient
     * @return bool
     */
    public function createPatient($patient){
        if(empty($patient) || (is_string($patient)) || (is_int($patient))) {
            return false;
        } else {
            $personal_id = $patient->personal_id;
            $name = $patient->name;

            $dataPersonal_id = Patient::find()->where(['personal_id' => $personal_id])->one();
            $dataName = Patient::find()->where(['name' => $name])->one();

            if (empty($dataPersonal_id && $dataName)) {
                $patient->save();
                return $patient;
            } else {
                return false;
            }
        }

    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $request = Yii::$app->getRequest();
        if ($request->isPost && $request->post('ajax') !== null) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            $result = ActiveForm::validate($model);
            return $result;
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if($this->updatePatient($model)==$model){
                return $this->redirect(['view', 'id'=>$model->personal_id]);
            } else {
                return $this->redirect(['update']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $patient
     * @return bool
     */
    public function updatePatient($patient)
    {
        if(empty($patient) || (is_string($patient)) || (is_int($patient))) {
            return false;
        } else {
            $patient->save();
            return $patient;

        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($this->deletePatient($model) == $model)
        {

            return $this->redirect(['patient/admin']);
        }
    }


    /**
     * @param $personal_id
     * @return bool
     * @throws \Exception
     */
    public function deletePatient($personal_id)
    {
        if(!empty($personal_id) || (is_int($personal_id))) {
            $model = Patient::find()->where(['personal_id' => $personal_id])->one();;

            if(!empty($model)) {
                if($model->delete()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $patient
     * @return array
     */
    public function searchPatient($patient)
    {
        $query = Patient::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->patients = $patient;

        // grid filtering conditions
        $query->andFilterWhere([
            'create_at' => $this->create_at,
        ]);

        $query->orFilterWhere(['like', 'personal_id', $this->patients])
            ->orFilterWhere(['like', 'name', $this->patients])
            ->orFilterWhere(['like', 'surname', $this->patients])
            ->orFilterWhere(['like', 'create_by', $this->patients])
        ;

        return $dataProvider->getModels();
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $personal_id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($personal_id)
    {
        if (($model = Patient::findOne($personal_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
