<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Yii::t('user', 'Account');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-account">
 
    <h1><?= Html::encode($this->title) ?></h1>

     <p>
        <?= Html::a(Yii::t('user', 'Edit Account'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('user', 'Change Password'), ['change-password'], ['class' => 'btn btn-primary']) ?>
    </p>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('user', 'Edit Profile'), ['profile/update/' . $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model->profile,
        'attributes' => [
            //'id',
            //'user_id',
            //'created_at',
            //'updated_at',
            'fullname',
            'name',
            'surname',
            'patronymic',
            'gender',
            // 'address_id',
        ],
    ]) ?>
 
</div>