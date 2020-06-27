<?php
use yii\helpers\Html;
use yii\helpers\Url;

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
                                <input type="search" class="form-control" name="q" id="q" placeholder="ค้นหาสินค้าที่ต้องการ.." required>
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
                            <a href="#">ไทย</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">ไทย</a></li>
                                    <li><a href="#">EN</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div>
                    </div>
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->

        <div class="header-bottom sticky-header">
            <div class="container">

                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="active">
                                <a href="#">หน้าแรก</a>
                            </li>
                            <li>
                                <a href="#">สินค้า</a>
                            </li>
                            <li>
                                <a href="#">บทความ</a>
                            </li>
                            <li>
                                <a href="#">บริการ</a>
                            </li>
                            <li>
                                <a href="#">ร่วมงานกับเรา</a>
                            </li>
                            <li>
                                <a href="#">ติดต่อเรา</a>
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
                         เวลาทำการ ทุกวัน 08.30 น. - 20.00 น.
                    </div>
                    <div class="icon">
                        <i class="icon-phone" style="color: #fff;"></i>
                         038-029889
                    </div>
                </div>
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </header><!-- End .header -->

    <?= $content; ?>

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
                                <h2 class="icon-box-title">ร่วมงานกับเรา</h2><!-- End .icon-box-title -->
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
                                <p style="letter-spacing: 2px;">CONTACT CENTER</p>
                                <h3 class="icon-box-title"> 08-1839-1818</h3><!-- End .icon-box-title -->
                                <p style="font-size: 12px;">จ.-อ. ช่วงเวลา 08.00-18.00 น.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-12 col-lg-4 -->

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->

        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-4">
                        <div class="widget">
                            <h4 class="widget-title">เกี่ยวกับเรา</h4><!-- End .widget-title -->
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <ul class="widget-list">
                                        <li><a href="#">ธุรกิจในเครือ</a></li>
                                        <li><a href="#">ความเป็นมา</a></li>
                                        <li><a href="#">ผลงานการบริหารงาน</a></li>
                                        <li><a href="#">รับเรื่องร้องเรียน</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6 col-md-6">
                                    <ul class="widget-list">
                                        <li><a href="#">วัสัยทัศน์</a></li>
                                        <li><a href="#">คระกรรมการบริหาร</a></li>
                                        <li><a href="#">วิถีวนาวัฒน์</a></li>
                                        <li><a href="#">ร่วมงานกับเรา</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-3 col-lg-2 -->

                    <div class="col-sm-4 col-lg-4">
                        <div class="widget">
                            <h4 class="widget-title">สินค้า</h4><!-- End .widget-title -->

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <ul class="widget-list">
                                        <li><a href="#">Product 1</a></li>
                                        <li><a href="#">Product 1</a></li>
                                        <li><a href="#">Product 1</a></li>
                                        <li><a href="#">Product 1</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .col-sm-6 -->
                                <div class="col-sm-6 col-md-6">
                                    <ul class="widget-list">
                                        <li><a href="#">Product 1</a></li>
                                        <li><a href="#">Product 1</a></li>
                                        <li><a href="#">Product 1</a></li>
                                        <li><a href="#">Product 1</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-3 col-lg-2 -->


                    <div class="col-sm-12 col-lg-4">
                        <div class="widget widget-about">
                            <h4 class="widget-title">ติดต่อเรา</h4><!-- End .widget-title -->
                            <div class="widget-about-info">
                                <div class="row">
                                    <div class="col-sm-6 col-md-5">
                                        <span class="widget-about-title">บริษัท เอสซี โฮมมาร์ท จํากัด (สํานักงานใหญ่)</span>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 col-md-7">
                                        <figure class="footer-address">
                                            989/1-5 หมู่ 4 ตําบลปลวกแดง อ.ปลวกแดง จ.ระยอง 21140 
                                        </figure><!-- End .footer-payments -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-sm-6 col-md-5">
                                        Contact Center <p><a href="tel:074338000">081-8391818</a></p>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 col-md-7">
                                        <figure class="footer-address">
                                            จ. - ส. ช่วงเวลา 08.000-17.00 น.
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
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

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
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="index.html">Home</a>

                            <ul>
                                <li><a href="index-1.html">01 - furniture store</a></li>
                                <li><a href="index-2.html">02 - furniture store</a></li>
                                <li><a href="index-3.html">03 - electronic store</a></li>
                                <li><a href="index-4.html">04 - electronic store</a></li>
                                <li><a href="index-5.html">05 - fashion store</a></li>
                                <li><a href="index-6.html">06 - fashion store</a></li>
                                <li><a href="index-7.html">07 - fashion store</a></li>
                                <li><a href="index-8.html">08 - fashion store</a></li>
                                <li><a href="index-9.html">09 - fashion store</a></li>
                                <li><a href="index-10.html">10 - shoes store</a></li>
                                <li><a href="index-11.html">11 - furniture simple store</a></li>
                                <li><a href="index-12.html">12 - fashion simple store</a></li>
                                <li><a href="index-13.html">13 - market</a></li>
                                <li><a href="index-14.html">14 - market fullwidth</a></li>
                                <li><a href="index-15.html">15 - lookbook 1</a></li>
                                <li><a href="index-16.html">16 - lookbook 2</a></li>
                                <li><a href="index-17.html">17 - fashion store</a></li>
                                <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                                <li><a href="index-19.html">19 - games store</a></li>
                                <li><a href="index-20.html">20 - book store</a></li>
                                <li><a href="index-21.html">21 - sport store</a></li>
                                <li><a href="index-22.html">22 - tools store</a></li>
                                <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                                <li><a href="index-24.html">24 - extreme sport store</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="category.html">Shop</a>
                            <ul>
                                <li><a href="category-list.html">Shop List</a></li>
                                <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="#">Lookbook</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">Product</a>
                            <ul>
                                <li><a href="product.html">Default</a></li>
                                <li><a href="product-centered.html">Centered</a></li>
                                <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                <li><a href="product-gallery.html">Gallery</a></li>
                                <li><a href="product-sticky.html">Sticky Info</a></li>
                                <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                <li><a href="product-fullwidth.html">Full Width</a></li>
                                <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li>
                                    <a href="about.html">About</a>

                                    <ul>
                                        <li><a href="about.html">About 01</a></li>
                                        <li><a href="about-2.html">About 02</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>

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
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>

                            <ul>
                                <li><a href="blog.html">Classic</a></li>
                                <li><a href="blog-listing.html">Listing</a></li>
                                <li>
                                    <a href="#">Grid</a>
                                    <ul>
                                        <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                        <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                        <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                        <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Masonry</a>
                                    <ul>
                                        <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                        <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                        <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                        <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mask</a>
                                    <ul>
                                        <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                        <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Single Post</a>
                                    <ul>
                                        <li><a href="single.html">Default with sidebar</a></li>
                                        <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                        <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="elements-list.html">Elements</a>
                            <ul>
                                <li><a href="elements-products.html">Products</a></li>
                                <li><a href="elements-typography.html">Typography</a></li>
                                <li><a href="elements-titles.html">Titles</a></li>
                                <li><a href="elements-banners.html">Banners</a></li>
                                <li><a href="elements-product-category.html">Product Category</a></li>
                                <li><a href="elements-video-banners.html">Video Banners</a></li>
                                <li><a href="elements-buttons.html">Buttons</a></li>
                                <li><a href="elements-accordions.html">Accordions</a></li>
                                <li><a href="elements-tabs.html">Tabs</a></li>
                                <li><a href="elements-testimonials.html">Testimonials</a></li>
                                <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                <li><a href="elements-portfolio.html">Portfolio</a></li>
                                <li><a href="elements-cta.html">Call to Action</a></li>
                                <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                        <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                        <li><a href="#">Beds</a></li>
                        <li><a href="#">Lighting</a></li>
                        <li><a href="#">Sofas & Sleeper sofas</a></li>
                        <li><a href="#">Storage</a></li>
                        <li><a href="#">Armchairs & Chaises</a></li>
                        <li><a href="#">Decoration </a></li>
                        <li><a href="#">Kitchen Cabinets</a></li>
                        <li><a href="#">Coffee & Tables</a></li>
                        <li><a href="#">Outdoor Furniture </a></li>
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
