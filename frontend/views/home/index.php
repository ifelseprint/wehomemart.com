<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\HomeAsset;
HomeAsset::register($this);
?>
<main class="main">
    <?= $this->render('_banner', ['Banner'=> $Banner]); ?>

    <?= $this->render('_promotion', ['Promotion'=> $Promotion]); ?>

    <?= $this->render('_product', ['Product'=> $Product]); ?>

	<?= $this->render('_service', ['Service'=> $Service]); ?>

    <?= $this->render('_article', ['Article'=> $Article]); ?>
   
</main><!-- End .main -->
