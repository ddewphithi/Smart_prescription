<?php

namespace app\controllers;

use Yii;

use app\models\User;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }

        if(Yii::$app->user->identity->roleId == 2) {
            return $this->redirect(['/site/index']);
        }

        if(Yii::$app->user->identity->roleId == 3) {
            return $this->redirect(['/site/index']);
        }

        return $this->render('index', [
            'model' => $this->findUserModel(Yii::$app->user->identity->id),
        ]);
    }


    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    protected function findUserModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}