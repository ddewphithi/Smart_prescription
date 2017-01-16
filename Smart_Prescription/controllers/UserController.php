<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\AccessRule;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $users;
//
//    public function __construct() {}
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
                        'roles' => [
                            User::ROLE_ADMIN,
                        ],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getUserList()
    {
        $user = User::find()->all();
        return $user;
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::$app->session['userId'] = $id;

        $dataProvider = new ActiveDataProvider ( [
            'query' => User::find()->where(['userId' => $id]),
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @param $userId
     * @return bool|null|static
     */
    public function viewUser($userId)
    {
        if(($userId == FALSE) || (is_int($userId)))
        {
            return false;
        } else {
            $user = User::findOne(['id' => $userId]);
            return $user;
        }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $request = Yii::$app->getRequest();
            if ($request->isPost && $request->post('ajax') !== null) {
                $model->load(Yii::$app->request->post());
                Yii::$app->response->format = Response::FORMAT_JSON;
                $result = ActiveForm::validate($model);
                return $result;
            }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if($this->createUser($model)==$model){
                return $this->redirect(['view', 'id'=>$model->id]);
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
     * @param $user
     * @return bool
     */
    public function createUser($user)
    {
        if(empty($user) || (is_string($user)) || (is_int($user))) {
            return false;
        } else {

            $name = $user->name;
            $surname = $user->surname;
            $username = $user->username;
            $password = $user->password;
            $password2 = $user->password2;
            $roleId = $user->roleId;


            $dataName = User::find()->where(['name' => $name])->one();
            $dataSurname = User::find()->where(['surname' => $surname])->one();
            $dataUsername = User::find()->where(['username' => $username])->one();
            $dataPassword = User::find()->where(['password' => $password])->one();
            $dataPassword2 = User::find()->where(['password2' => $password2])->one();
            $dataRoleId = User::find()->where(['roleId' => $roleId])->one();


            if (empty($dataUsername && $dataName && $dataSurname && $dataPassword && $dataPassword2 && $dataRoleId)) {
                $user->save();
                return $user;
            } else {
                return false;
            }
        }
    }

    /**
     * Updates an existing User model.
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

            if($this->updateUser($model)==$model){
                return $this->redirect(['view', 'id'=>$model->id]);
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
     * @param $user
     * @return bool
     */
    public function updateUser($user)
    {
        if(empty($user) || (is_string($user)) || (is_int($user))) {
            return false;
        } else {
            $user->save();
            return $user;

        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($this->deleteUser($model) == $model)
        {

            return $this->redirect(['user/admin']);
        }
    }


    /**
     * @param $userId
     * @return bool
     * @throws \Exception
     */
    public function deleteUser($userId)
    {
        if(!empty($userId) || (is_int($userId))) {
            $model = User::find()->where(['id' => $userId])->one();;

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
     * @param $user
     * @return array
     */
    public function searchUser($user)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->users = $user;
        $query->andFilterWhere([
            'id' => $this->id,
            'role' => $this->roleId,
        ]);

        $query
//            ->orFilterWhere(['like', 'roleName', $this->q])
            ->orFilterWhere(['like', 'name', $this->users])
            ->orFilterWhere(['like', 'surname', $this->users])
            ->orFilterWhere(['like', 'username', $this->users]);

        return $dataProvider->getModels();
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
