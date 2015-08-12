<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Yii::t('user', 'Edit Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">
 
    <h1><?= Html::encode($this->title) ?></h1>
 
    <div class="user-form">
 
        <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
 
        <div class="form-group">
            <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-primary']) ?>
        </div>
 
        <?php ActiveForm::end(); ?>
 
    </div>
 
</div>