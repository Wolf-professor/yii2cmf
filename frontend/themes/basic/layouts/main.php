<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

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
    <?php $this->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->config->get('SEO_SITE_KEYWORDS')]);?>
    <?php $this->registerMetaTag(['name' => 'description', 'content' => Yii::$app->config->get('SEO_SITE_DESCRIPTION')]);?>
    <script>var SITE_URL = '<?= Yii::$app->request->hostInfo . Yii::$app->request->baseUrl ?>';</script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= $this->render('_nav') ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= \common\widgets\AlertPlus::widget()?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><a href="<?= Url::to(['/page/index', 'name' => 'mianze'])?>">免责声明</a></div>
            <div class="col-sm-4"><a href="<?= Url::to(['/page/index', 'name' => 'aboutus'])?>">关于我们</a></div>
            <div class="col-sm-4"><a href="<?= Url::to(['/page/index', 'name' => 'code'])?>">获取源码</a></div>
        </div>
    </div>
    <hr/>
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->config->get('SITE_NAME').' '.date('Y') ?></p>
        <p class="pull-right"><?= Yii::$app->config->get('SITE_ICP')?></p>
    </div>
</footer>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<!--回到顶部-->
<?= \common\widgets\scroll\Scroll::widget()?>
<?php if (YII_ENV_PROD):?>
<!--页脚-->
<?= Yii::$app->config->get('FOOTER')?>
<?php endif; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
