<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
AppAsset::register($this);

$options = [
	'baseUrl' => Yii::$app->request->baseUrl,
	'language' => (Yii::$app->language == 'th-TH') ? 'th' : 'en',
];
$this->registerJs(
	"var yiiOptions = " . \yii\helpers\Json::htmlEncode($options) . ";",
	View::POS_HEAD,
	'yiiOptions'
);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class="page-wrapper">

    <?php echo $this->render('_header'); ?>

    <?= $content; ?>

    <?php echo $this->render('_footer'); ?>

</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<?php echo $this->render('_mobile_menu'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
