<?php

namespace app\modules\user\controllers;
 
use app\modules\user\models\User;
use app\modules\user\models\Profile;
use app\modules\user\models\ChangePasswordForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
 
class AccountController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
 
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }
 
    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findUser(Yii::$app->user->identity->getId());
        //return User::findOne(Yii::$app->user->identity->getId());
        
    }

     public function actionUpdate()
    {
        $model = $this->findModel();
        $model->scenario = User::SCENARIO_PROFILE;
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionChangePassword()
    {
        $user = $this->findModel();
        $model = new ChangePasswordForm($user);
 
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('changePassword', [
                'model' => $model,
            ]);
        }
    }

}