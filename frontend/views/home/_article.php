<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="idea-posts">

        <div class="row">
            <div class="col-lg-6">
                <img src ="<?=Url::base(true);?>/img/idea.jpg" alt="image desc" width="100%">
            </div>
            <div class="col-lg-6 block-content">
                <div class="block-desc">
                    <div>
                        <img src ="<?=Url::base(true);?>/img/homeofidea.png" alt="image desc" width="250">
                        <h2 class="title text-left"><?=Yii::$app->translated->get(6);?></h2>
                        <p class="text-left"><?=Yii::$app->translated->get(7);?></p>

                        <div>
                            <a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>" class="btn-readmore"><?=Yii::$app->translated->get(8);?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="article-posts">
        <div class="container">

            <div class="block-title">
                <h2 class="title text-center"><?=Yii::$app->translated->get(9);?></h2><!-- End .title-lg text-center -->
                <p class="text-center"><a href="<?=Url::base(true);?>/<?= Yii::t('app', 'menu_article');?>"><?=Yii::$app->translated->get(10);?> >></a></p>
            </div>

            <div class="owl-carousel owl-simple carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "items": 4,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":4
                        }
                    }
                }'>
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.4s ease 0s; width: 1188px;">
                        <?php
                        foreach ($Article as $value){
                            $article_name = 'article_name_'.Yii::$app->language;
                            $article_content = 'article_content_'.Yii::$app->language;
                        ?> 
                        <div class="owl-item active" style="width: 376px; margin-right: 20px;">
                            <article class="entry entry-display">
                                <figure class="entry-media">
                                    <a href="#">
                                        <img src ="<?=Url::base(true);?>/uploads/<?=$value->article_image_path?>/<?=$value->article_image?>" alt="<?=$value->$article_name?>">
                                    </a>
                                </figure><!-- End .entry-media -->
                                <div class="entry-body text-center">
                                    <h3 class="entry-title">
                                        <a href="#"><?=$value->$article_name?></a>
                                    </h3><!-- End .entry-title -->

                                    <div class="entry-content">
                                        <a href="#"><?=$value->$article_content?></a>
                                    </div><!-- End .entry-content -->
                                </div>
                            </article>
                        </div>
                        <?php } ?>

                    </div> <!-- End .owl-stage -->
                </div>
                <div class="owl-nav disabled">
                    <button type="button" role="presentation" class="owl-prev">
                        <i class="icon-angle-left"></i>
                    </button>
                    <button type="button" role="presentation" class="owl-next">
                        <i class="icon-angle-right"></i>
                    </button>
                </div>
                <div class="owl-dots disabled">
                    <button role="button" class="owl-dot active"><span></span></button>
                </div>
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div> <!-- End .article-posts -->