<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .my-navbar {
            background-color: #5cb85c;
            
        }
        .nav > li > a {
            color: #ffffff;
            font-weight: bold;
            font-size: 15px;
        }
        .wrap > .container {
            padding: 130px 15px 20px;
        }
        .navbar-brand {
         float: none;
        }
        /* #w1 {
            margin-top: 2rem;
        } */
        .nav > li > a:hover {
            background-color: rgb(0 0 0 / 8%);
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="assets/img/logo_alcaldia.png" style="display:inline; width:10rem;">
        <img src="assets/img/logo_participacion.jpg" style="display:inline; width:7rem;border-radius:50%">',
        // 'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            // 'class' => 'navbar-inverse navbar-fixed-top',
            'class' => 'navbar navbar-dark navbar-fixed-top',
            'style'=> 'background-color: #5cb85c;',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Inscribete', 'url' => ['/adulto/create']],
            ['label' => 'Consulta Proceso', 'url' => ['/control/buscar']],
            ['label' => 'Consulta Inscripción', 'url' => ['/adulto/index'],
            'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Anotaciones', 'url' => ['/control/index'],
            'visible' => !Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ? (
            ['label' => 'Registrar', 'url' => ['/site/register'],
            'visible' => !Yii::$app->user->isGuest]
            ) : (
                ['label' => 'Registrar', 'url' => ['/site/register'],
                'visible' => Yii::$app->user->identity->perfil == "admin"]
            ),
            // ['label' => 'Contáctenos', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Secreataria de participación <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
