<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\User;

class SiteController extends Controller
{

//    public function __construct() {}
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->db->open();
        if(Yii::$app->user->isGuest) {
            return $this->render('index');
        } else {
            if(Yii::$app->user->identity->roleId == 1) {
                return $this->redirect(array('admin/index'));
            } else if(Yii::$app->user->identity->roleId == 2) {
                return $this->redirect(array('doctor/index'));
            } else if(Yii::$app->user->identity->roleId == 3) {
                return $this->redirect(array('fda/index'));
            }
        }
    }

//    public function actionNavbar()
//    {
//        return $this->render('navbar');
//    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $loginData = User::find()->where(['username' => $model->username])->one();

            if(empty($loginData)) {
                Yii::$app->getSession()->setFlash('alert',[
                    'body'=>'<i class="glyphicon glyphicon-warning-sign"></i> '.' Username is incorrect!',
                    'options'=>['class'=>'alert-danger']
                ]);
            } else {
                if($model->username == $loginData->username) {
                    if($model->password == $loginData->password) {
                        if($loginData->roleId == 1) {
                            $model->login();
                            $this->redirect(array('/admin/index'));
                        } else if($loginData->roleId == 2) {
                            $model->login();
                            $this->redirect(array('/doctor/index'));
                        } else if($loginData->roleId == 3) {
                            $model->login();
                            $this->redirect(array('/fda/index'));
                        }
                    } else {
                        Yii::$app->getSession()->setFlash('alert',[
                            'body'=>'<i class="glyphicon glyphicon-warning-sign"></i> '.'Password is incorrect!',
                            'options'=>['class'=>'alert-danger']
                        ]);
                    }
//                } else {
//                    Yii::$app->getSession()->setFlash('alert',[
//                        'body'=>'<i class="glyphicon glyphicon-warning-sign"></i> '.'The account does not exist!',
//                        'options'=>['class'=>'alert-danger']
//                    ]);
                }
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function login($username, $password)
    {
        if(!empty($username) || !empty($password))
        {
            $model = new LoginForm();
            $model->username = $username;
            $model->password = $password;


            if($model->login()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @return bool
     */
    public function logout()
    {
        if(Yii::$app->user->logout()) {
            return Yii::$app->user->isGuest;
        }
    }

}
