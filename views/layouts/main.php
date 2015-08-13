<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\widgets\AlertBlock;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => array_filter([
        ['label' => Yii::t('app', 'Home'), 'url' => ['/main/default/index']],
        ['label' => Yii::t('app', 'About'), 'url' => ['/main/default/about']],
        ['label' => Yii::t('app', 'Contact'), 'url' => ['/main/contact/index']],
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'Sign Up'), 'url' => ['/user/default/signup']] :
            false,
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'Login'), 'url' => ['/user/default/login']] :
            false,
        !Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'Admin'), 'items' => [
                ['label' => Yii::t('user', 'Admin'), 'url' => ['/admin/default/index']],
                ['label' => Yii::t('user', 'User Management'), 'url' => ['/admin/users/index']],
            ]] :
            false,
        !Yii::$app->user->isGuest ?
            ['label' => Yii::t('user', 'Profile'), 'items' =>[
                ['label' => Yii::t('user', 'Account'),'url' => ['/user/account/index']],
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/user/default/logout'],
                                'linkOptions' => ['data-method' => 'post']]

            ]]:            
            false,
       
            
    ]),
]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= AlertBlock::widget([
            'useSessionFlash' => true,
            'type' => AlertBlock::TYPE_GROWL
        ]);?>

        <?= $content ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name?>  2011-<?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
