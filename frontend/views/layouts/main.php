<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
        'brandLabel' => 'LLongAgo Blog',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-top',
        ],
    ]);
    $leftItems = [
        ['label' => '首页', 'url' => ['/post/index', 'id'=>1]],
        ['label' => 'PHP', 'url' => ['/post/list?id=1']],
        ['label' => 'Mysql', 'url' => ['/post/list?id=2']],
        ['label' => 'Linux', 'url' => ['/post/list?id=3']],
        ['label' => 'Redis', 'url' => ['/post/list?id=4']],
        ['label' => 'Yii', 'url' => ['/post/list?id=5']],
    ];
    // if (Yii::$app->user->isGuest) {
    //     $rightItems[] = ['label' => '注册', 'url' => ['/site/signup']];
    //     $rightItems[] = ['label' => '登录', 'url' => ['/site/login']];
    // } else {
    //     $rightItems[] = [
    //         'label' => '你好,'.Yii::$app->user->identity->username,
    //         'items' => [
    //             ['label' => '<i class="fa fa-sign-out"></i> 注销', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']    ],
    //         ],
    //     ];
    // }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftItems,
    ]);

    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => $rightItems,
    //     'encodeLabels' => false,
    // ]);
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right">LLongAgo QQ:512111651</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
