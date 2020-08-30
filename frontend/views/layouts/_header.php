<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\ProductMenu;
?>
<header class="header header-2 header-intro-clearance">
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="<?=Url::base(true);?>" class="logo">
                     <img src ="<?=Url::base(true);?>/img/logo.png" width="247" height="49">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="<?=Yii::$app->translated->get(12);?>" required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="phone">
                    <a href="#" title="038-029889">
                        <div class="icon">
                            <i class="icon-phone" style="color: #2670bf;"></i>
                            038-029889
                        </div>
                    </a>
                </div>
                <div class="line">
                    <a href="#" title="wehomemart">
                        <div class="icon">
                            <i class="icon-line" style="color: #28a745;"></i>
                            wehomemart
                        </div>
                    </a>
                </div>

                <div class="facebook">
                    <a href="#" title="wehomemart">
                        <div class="icon">
                            <i class="icon-facebook" style="color: #2670bf;"></i>
                            wehomemart
                        </div>
                    </a>
                </div>

                <div class="language">
                    <div class="header-dropdown">
                        <a href="#" style="text-transform: uppercase;"><?=(Yii::$app->language=="th" ? 'ไทย' : 'EN' );?></a>
                        <div class="header-menu">
                            <ul>
                                <li><?= Html::a('ไทย', ['/', 'language' => 'th']); ?></li>
                                <li><?= Html::a('EN', ['/', 'language' => 'en']); ?></li>
                            </ul>
                        </div><!-- End .header-menu -->
                    </div>
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">

            <div class="header-right" style="margin-left: 0;">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="<?php echo (Yii::$app->controller->id=="home" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>"><?= Yii::t('app', 'menu_home');?></a>
                        </li>
                        <li class="<?php echo (Yii::$app->controller->id=="about" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_about');?>"><?= Yii::t('app', 'menu_about');?></a>
                        </li>
                        <li class="<?php echo (Yii::$app->controller->id=="product" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_product');?>/วัสดุโครงสร้าง-1"><?= Yii::t('app', 'menu_product');?></a>
                            <?= ProductMenu::widget(array('action'=>'link-nav')); ?>
                        </li>
                        <li class="<?php echo (Yii::$app->controller->id=="article" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>"><?= Yii::t('app', 'menu_article');?></a>
                        </li>
                        <li class="<?php echo (Yii::$app->controller->id=="service" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_service');?>"><?= Yii::t('app', 'menu_service');?></a>
                        </li>
                        <li class="<?php echo (Yii::$app->controller->id=="join" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>"><?= Yii::t('app', 'menu_join_us');?></a>
                        </li>
                        <li class="<?php echo (Yii::$app->controller->id=="contact" ? 'active' : '' )?>">
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_contact_us');?>"><?= Yii::t('app', 'menu_contact_us');?></a>
                        </li>
                        <!-- <li>
                            <a href="#" class="sf-with-ul">Pages</a>

                            <ul>
                                <li>
                                    <a href="about.html" class="sf-with-ul">About</a>

                                    <ul>
                                        <li><a href="about.html">About 01</a></li>
                                        <li><a href="about-2.html">About 02</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html" class="sf-with-ul">Contact</a>

                                    <ul>
                                        <li><a href="contact.html">Contact 01</a></li>
                                        <li><a href="contact-2.html">Contact 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                                <li><a href="404.html">Error 404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li> -->
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <div class="icon">
                    <i class="icon-clock-o" style="color: #fff;"></i>
                    <?=Yii::$app->translated->get(11);?>
                </div>
                <div class="icon">
                    <i class="icon-phone" style="color: #fff;"></i>
                     038-029889
                </div>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->