<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\Profile */

$this->title = Yii::t('user', 'Update {modelClass}: ', [
    'modelClass' => 'Profile',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('user', 'Update');
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
