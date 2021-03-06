<?php
use frontend\widgets\ProductFooter;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<footer class="footer footer-2">
    <div class="icon-boxes-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4 block-middle">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-white">
                            <i class="icon-user"></i>
                        </span>
                        <div class="icon-box-content">
                            <h2 class="icon-box-title"><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>"><?= Yii::t('app', 'menu_join_us');?></a></h2><!-- End .icon-box-title -->
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-12 col-lg-4 -->

                <div class="col-sm-12 col-lg-4 block-middle">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-white">
                            <i class="icon-facebook-square"></i>
                        </span>

                        <div class="icon-box-content followus">
                            <p style="letter-spacing: 2px;">FALLOW US</p><!-- End .icon-box-title -->
                            <p style="font-size: 28px;line-height: 24px;font-weight: 500;">wehomemart</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-12 col-lg-4 -->

                <div class="col-sm-12 col-lg-4 block-middle">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-white">
                            <i class="icon-headphones"></i>
                        </span>

                        <div class="icon-box-content">
                            <p style="letter-spacing: 5px;">CONTACT CENTER</p>
                            <h3 class="icon-box-title"> 038-659-951</h3><!-- End .icon-box-title -->
                            <p style="font-size: 15px;"><?=Yii::$app->translated->get(13);?></p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-12 col-lg-4 -->

            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">SC HOME MART</h4><!-- End .widget-title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="widget-list">
                                    <li><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_about');?>"><?= Yii::t('app', 'menu_about');?></a></li>
                                    <li><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_service');?>"><?= Yii::t('app', 'menu_service');?></a></li>
                                    <li><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_join_us');?>"><?= Yii::t('app', 'menu_join_us');?></a></li>
                                    <li><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>"><?= Yii::t('app', 'menu_article');?></a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-3 col-lg-2 -->

                <div class="col-sm-12 col-lg-6">
                    <div class="widget">
                        <h4 class="widget-title"><?= Yii::t('app', 'menu_product');?></h4><!-- End .widget-title -->

                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <?= ProductFooter::widget(array('offset'=>'0','limit'=>'4')); ?>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <?= ProductFooter::widget(array('offset'=>'4','limit'=>'4')); ?>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <?= ProductFooter::widget(array('offset'=>'8','limit'=>'4')); ?>
                            </div>
                        </div><!-- End .row -->
                    </div><!-- End .widget -->
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="widget widget-about">
                        <h4 class="widget-title"><?= Yii::t('app', 'menu_contact_us');?></h4><!-- End .widget-title -->
                        <div class="widget-about-info">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <span class="widget-about-title"><?=Yii::$app->translated->get(41);?></span>
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6 col-md-7">
                                    <figure class="footer-address">
                                        <?=Yii::$app->translated->get(40);?>
                                    </figure><!-- End .footer-payments -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-sm-6 col-md-5">
                                    Contact Center <p><a href="tel:038659951">038659951</a></p>
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6 col-md-7">
                                    <figure class="footer-address">
                                        <?=Yii::$app->translated->get(13);?>
                                    </figure><!-- End .footer-payments -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .widget-about-info -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-12 col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2020 SC HOME MART ALL RIGHTS RESERVED.</p><!-- End .footer-copyright -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->

<!-- Modal Popup Member ##################### -->
<div class="modal fade" id="modal-member">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="width: 100%;"><i class="icofont icofont-plus-circle"></i> <img class="mx-auto d-block" src ="<?=Url::base(true);?>/img/logo_center.png" width="120"></h4>
                <button type="button" class="close" data-dismiss="modal" style="font-size: 30px;">&times;</button>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
                <div id='modal-content-member'></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Popup Member ##################### -->

<!-- Modal Popup Quotation ##################### -->
<div class="modal fade" id="modal-quotation">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="icofont icofont-plus-circle"></i> Request quotation</h4>
                <button type="button" class="close" data-dismiss="modal" style="font-size: 30px;">&times;</button>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
                <div id='modal-content-quotation' style="padding: 5px 10px 20px 10px;"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Popup Quotation ##################### -->