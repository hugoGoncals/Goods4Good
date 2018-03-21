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
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/bootstrap-theme.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/elegant-icons-style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/font-awesome.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('user/css/style-responsive.css')); ?>">
        <!-- JS -->
        <script src="<?php echo e(asset('user/js/jquery.js')); ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>   
        <script type="text/javascript" src="<?php echo e(asset('user/js/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('user/js/jquery.scrollTo.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('user/js/jquery.nicescroll.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('user/assets/jquery-knob/js/jquery.knob.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('user/js/scripts.js')); ?>"></script>

        <!-- JS Controllers Angular -->
    </head>    
    <body>
        <header class="header dark-bg">
            <!--logo start-->
             <a href="/" class="logo">Goods4Good</a>
            <div class="top-nav notification-row">
                <ul class="nav pull-right top-menu">
                    <?php if(Auth::guest()): ?>
                        <?php if(Route::current()->getName() == 'register'): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Sign in</a></li>
                        <?php endif; ?>
                        <?php if(Route::current()->getName() == 'login'): ?>
                            <li><a href="<?php echo e(route('register')); ?>">Sign up</a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>

            </div>
        </header>  
        <section id="main-content">
            <section class="wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </section>
        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
    </html>
