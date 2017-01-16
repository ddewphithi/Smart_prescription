<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Allergy;
use app\models\AllergySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessRule;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

/**
 * AllergyController implements the CRUD actions for Allergy model.
 */
class AllergyController extends Controller
{
    public $allergies;

    //public function __construct() {}
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
            return [
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'only' => ['index', 'create','view','update','admin','delete'],
//                    'ruleConfig'=>[
//                        'class'=>AccessRule::className()
//                    ],
                    'rules' => [
                        // deny all POST requests
                        [
                            'allow' => true,
                            'actions' => ['create', 'update','delete','admin','view'],
                            'roles' => [
                                User::ROLE_DOCTOR,
                            ],
//                            'verbs' => ['POST'],
                        ],
                        // allow authenticated users
                        [
                            'allow' => true,
                            'actions' => ['fda','view2'],
                            'roles' => [
                                User::ROLE_FDA,
                            ],
                        ],
                        // everything else is denied
                    ],
                ],
            ];
    }

    public function actionFda()
    {
        $searchModel = new AllergySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('fda', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllergyList2()
    {
        $allergy = Allergy::find()->all();
        return $allergy;
    }


    public function actionView2($id)
    {
        return $this->render('view2', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param $allergy_id
     * @return bool|null|static
     */
    public function viewAllergy2($allergy_id)
    {
        if(($allergy_id == false) || (is_int($allergy_id)))
        {
            return false;
        } else {
            $allergy = Allergy::findOne(['id' => $allergy_id]);
            return $allergy;
        }
    }

    /**
     * Lists all Allergy models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $searchModel = new AllergySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAllergyList()
    {
        $allergy = Allergy::find()->all();
        return $allergy;
    }


    /**
     * Displays a single Allergy model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param $allergy_id
     * @return bool|null|static
     */
    public function viewAllergy($allergy_id)
    {
        if(($allergy_id == false) || (is_int($allergy_id)))
        {
            return false;
        } else {
            $allergy = Allergy::findOne(['id' => $allergy_id]);
            return $allergy;
        }
    }

    /**
     * Creates a new Allergy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Allergy();
        $request = Yii::$app->getRequest();
            if ($request->isPost && $request->post('ajax') !== null) {
                $model->load(Yii::$app->request->post());
                Yii::$app->response->format = Response::FORMAT_JSON;
                $result = ActiveForm::validate($model);
                return $result;
            }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if($this->createAllergy($model)==$model){
                return $this->redirect(['view', 'id'=>$model->allergy_id]);
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
     * @param $allergy
     * @return bool
     */
    public function createAllergy($allergy){
        if(empty($allergy) || (is_string($allergy)) || (is_int($allergy))) {
            return false;
        } else {
            $allergy_id = $allergy->allergy_id;
            $name = $allergy->name;

            $dataAllergy_id = Allergy::find()->where(['allergy_id' => $allergy_id])->one();
            $dataName = Allergy::find()->where(['name' => $name])->one();

            if (empty($dataAllergy_id && $dataName)) {
                $allergy->save();
                return $allergy;
            } else {
                return false;
            }
        }

    }

    /**
     * Updates an existing Allergy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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

            if($this->updateAllergy($model)==$model){
                return $this->redirect(['view', 'id'=>$model->allergy_id]);
            } else {
                return $this->redirect(['create']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $allergy
     * @return bool
     */
    public function updateAllergy($allergy)
    {
        if(empty($allergy) || (is_string($allergy)) || (is_int($allergy))) {
            return false;
        } else {
            $allergy->save();
            return $allergy;

        }
    }

    /**
     * Deletes an existing Allergy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($this->deleteAllergy($model) == $model)
        {

            return $this->redirect(['allergy/admin']);
        }
    }

    /**
     * @param $allergy_id
     * @return bool
     * @throws \Exception
     */
    public function deleteAllergy($allergy_id)
    {
        if(!empty($allergy_id) || (is_int($allergy_id))) {
            $model = Allergy::find()->where(['allergy_id' => $allergy_id])->one();;

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
     * @param $allergy
     * @return array
     */
    public function search($allergy)
    {
        $query = Allergy::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->allergies = $allergy;
        // grid filtering conditions
        $query->andFilterWhere([
            'allergy_id' => $this->allergy_id,
            'create_at' => $this->create_at,
        ]);

        $query->orFilterWhere(['like', 'personal_id', $this->allergies])
            ->orFilterWhere(['like', 'name', $this->allergies])
            ->orFilterWhere(['like', 'surname', $this->allergies])
            ->orFilterWhere(['like', 'reporter', $this->allergies]);

        return $dataProvider->getModels();
    }
    /**
     * Finds the Allergy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $allergy_id
     * @return Allergy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($allergy_id)
    {
        if (($model = Allergy::findOne($allergy_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
