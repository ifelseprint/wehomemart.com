<?php
use yii\helpers\Url;
use frontend\widgets\ProductMenu;
?>
<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        
        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search product ..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true"><?=Yii::$app->translated->get(15);?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false"><?= Yii::t('app', 'menu_product');?></a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li>
                            <a href="<?=Url::base(true);?>"><?= Yii::t('app', 'menu_home');?></a>
                        </li>
                        <li >
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_about');?>"><?= Yii::t('app', 'menu_about');?></a>
                        </li>
                        <li>
                            <a href="#"><?= Yii::t('app', 'menu_product');?></a>
                            <?= ProductMenu::widget(array('action'=>'link-nav')); ?>
                        </li>
                        <li>
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>"><?= Yii::t('app', 'menu_article');?></a>
                        </li>
                        <li>
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_service');?>"><?= Yii::t('app', 'menu_service');?></a>
                        </li>
                        <li>
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>"><?= Yii::t('app', 'menu_join_us');?></a>
                        </li>
                        <li>
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_contact_us');?>"><?= Yii::t('app', 'menu_contact_us');?></a>
                        </li>
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <?= ProductMenu::widget(array('action'=>'link-list-icon')); ?>
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->

        </div><!-- End .tab-content -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->