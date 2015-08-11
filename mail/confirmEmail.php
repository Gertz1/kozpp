<?php
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $user app\modules\user\models\User */
 
$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/confirm-email', 'token' => $user->email_confirm_token]);
?>
 
Здравствуйте, <?= Html::encode($user->username) ?>!

Ваш e-mail был указан при регистрации на сайте РОО КОЗПП "ОБЩЕСТВЕННЫЙ ЗАЩИТНИК". (www.kozpp.ru).

Для подтверждения адреса пройдите по ссылке:
 
<?= Html::a(Html::encode($confirmLink), $confirmLink) ?>
 
Если Вы не регистрировались у на нашем сайте, то просто удалите это письмо.