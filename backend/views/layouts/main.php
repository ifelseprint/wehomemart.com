<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition layout-top-nav">
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?=Url::base(true);?>/dashboard" class="navbar-brand">
        <img src="<?=Url::base(true);?>/img/logo_allianz_global_assistance_20190701.jpg" alt="" class="brand-image">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?=Url::base(true);?>/dashboard" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item <?php echo (Yii::$app->controller->id=="policy" ? 'active' : '' )?> dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Policy</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow-sm">
              <li><a href="<?=Url::base(true);?>/policy/view" class="dropdown-item <?php echo (Yii::$app->controller->action->id=="view" ? 'active' : '' )?>">View Policy</a></li>
              <li><a href="<?=Url::base(true);?>/policy/create" class="dropdown-item <?php echo (Yii::$app->controller->action->id=="create" ? 'active' : '' )?>">Create Policy</a></li>
              
            </ul>
          </li>       
          <li class="nav-item <?php echo (Yii::$app->controller->id=="user" ? 'active' : '' )?>">
            <a href="<?=Url::base(true);?>/user/view" class="nav-link">Users</a>
          </li>          
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Finance</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow-sm">
              <li><a href="#" class="dropdown-item">Account Payable </a></li>
              <li><a href="#" class="dropdown-item">Payment</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Report</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow-sm">
              <li><a href="#" class="dropdown-item">Cost Containment Report </a></li>
              <li><a href="#" class="dropdown-item">Cost Summary Report</a></li>
              <li class="dropdown-divider"></li>
              <li><a href="#" class="dropdown-item">SUMMARY MEDICAL INBOUND REPORT  </a></li>
             </ul>
          </li>  
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Setting</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow-sm">
              <li><a href="#" class="dropdown-item">Master Data</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Operation</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow-sm">
                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hospital</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow-sm">
                      <li><a href="#" class="dropdown-item">Diagnostic</a></li>
                      <li><a href="#" class="dropdown-item">Treatment</a></li>
                      <li><a href="#" class="dropdown-item"> Department</a></li>
                      <li><a href="#" class="dropdown-item">Medical Expenses Type</a></li>
                      <li><a href="#" class="dropdown-item">Hospital Fee Period</a></li>
                      <li><a href="#" class="dropdown-item">Hospital Fee</a></li>
                      <li><a href="#" class="dropdown-item">Average</a></li>
                      <li><a href="#" class="dropdown-item">Region Setting</a></li>                 
                    </ul>
                  </li>
                  <!-- End Level three -->                
                  <li><a href="#" class="dropdown-item">Escort</a></li>
                  <li><a href="#" class="dropdown-item">Funeral Service</a></li>
                  <li><a href="#" class="dropdown-item">Chartered Flight</a></li>
                  <li><a href="#" class="dropdown-item">Hotel</a></li>
                  <li><a href="#" class="dropdown-item">Transportation</a></li>
                  <li><a href="#" class="dropdown-item">Commercial Airline</a></li>
                  <li><a href="#" class="dropdown-item">Travel Agency</a></li>
                  
                </ul>
              </li>
              <!-- End Level two -->
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Finance</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow-sm">
                  <li><a tabindex="-1" href="#" class="dropdown-item">Owner</a></li>
                  <li><a href="#" class="dropdown-item">Supplier</a></li>
                </ul>
              </li>
              <!-- End Level two -->              
            </ul>
          </li>                       
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-sm">
              <i class="fas fa-star text-warning"></i> 4 Waiting for Approved
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-star text-danger"></i> 8 Payment not Match
              <span class="float-right text-muted text-sm">12 hrs.</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-star text-primary"></i> 3 new GCL
              <span class="float-right text-muted text-sm">2 Days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        
        <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?=Url::base(true);?>/dist/img/user1-128x128.jpg" class="user-image img-circle" alt="User Image">
          <span class="d-none d-md-inline">Alexander Pierce</span>
          <i class="ti-angle-down" style="font-size:11px;"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu dropdown-menu-right dropdown-menu-sm">
          <!-- User image -->
          <li class="user-header bg-info">
            <img src="<?=Url::base(true);?>/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2020</small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat btn-sm bg-gradient-white">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-right btn-sm">Sign out</a>
          </li>
        </ul>
      </li>        
        
      </ul>
    </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $content ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="container">
            <!-- To the right -->
            <div class="appname-footer float-right d-none d-sm-inline">
              <i class="fas fa-plug"></i> Extended Warranty System<small> version 4.0</small> 
            </div>
            <!-- Default to the left -->
            Copyright &copy; 2012 - <script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.allianz-partners.com" target="_blank">Allianz Partner</a>. All rights reserved.
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
