<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\ChangePasswordForm */
 
$this->title = Yii::t('user', 'Change Password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Account'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-accout-change-password">
 
    <h1><?= Html::encode($this->title) ?></h1>
 
    <div class="user-form">
 
        <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'currentPassword')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true]) ?>
 
        <div class="form-group">
            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-primary']) ?>
        </div>
 
        <?php ActiveForm::end(); ?>
 
    </div>
 
</div>