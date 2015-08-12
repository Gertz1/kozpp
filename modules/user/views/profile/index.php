<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Yii::t('user', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
 
    <h1><?= Html::encode($this->title) ?></h1>

     <p>
        <?= Html::a(Yii::t('user', 'Edit Profile'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('user', 'Change Password'), ['change-password'], ['class' => 'btn btn-primary']) ?>
    </p>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
        ],
    ]) ?>
 
</div>