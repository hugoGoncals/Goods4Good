<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>" ng-app="providerRecords">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Goods4Good</title>

        <!-- css -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/sb-admin.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/admin-styled_sbd.css')); ?>">
        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>   
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/morris/chart-data-morris.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/tablesorter/jquery.tablesorter.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/tablesorter/tables.js')); ?>"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script type="text/javascript" src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <!-- JS Controllers Angular -->
        <script src="<?php echo e(asset('/angular/app.js')); ?>"></script>
        <script src="<?php echo e(asset('/angular/controllers/CategorieController.js')); ?>"></script>
        <script src="<?php echo e(asset('/angular/controllers/ProviderController.js')); ?>"></script>
        <script src="<?php echo e(asset('/angular/controllers/initPageProviderController.js')); ?>"></script>
        <script src="<?php echo e(asset('/angular/controllers/providerMyProdsController.js')); ?>"></script>
        <script src="<?php echo e(asset('/angular/controllers/ProductController.js')); ?>"></script>
        <script src="<?php echo e(asset('/angular/controllers/InboxController.js')); ?>"></script>

    </head>
    <body>
        <div id="wrapper">
          <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button> 
                <a href="/home" class="logo">Goods4Good</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                <li><a href="/productsMy"><i class="fa fa-product-hunt" aria-hidden="true"></i> Products</a></li>
                <li><a href="/provider"><i class="fa fa-check-square-o" aria-hidden="true"></i> Orders</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right navbar-user" ng-controller="InboxController">
                <li>
                  <a href="/inboxp"><i class="fa fa-envelope"></i> Notifications <span class="badge">{{ msgcount }}</span></a>
                </li>
                <li class="dropdown user-dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                        </form></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </body>
</html>