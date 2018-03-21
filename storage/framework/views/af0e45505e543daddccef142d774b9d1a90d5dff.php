<!DOCTYPE html>
<html lang="en" ng-app="providerRecords">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Goods4Good</title>
    <!-- jQuery -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->
    <link href="<?php echo e(asset('css/agency.css')); ?>" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script> 
    <!-- Angular -->
    <script src="<?php echo e(asset('/angular/app.js')); ?>"></script> 
    <script src="<?php echo e(asset('/angular/controllers/ProductbasketController.js')); ?>"></script> 


</head>

<body id="page-top" class="index" ng-controller="ProductbasketController as vm" style="background-color: #eeeeee  !important">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top affix" style="background-color: #222222">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/">Goods4Good</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo e(asset('imgs/shopping-cart.png')); ?>"><span style="background-color: #0ED0B4" class="badge">{{vm.listProdsCar.length}}</span><b class="caret"></b></a>
                        
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview" ng-if="!vm.listProdsCar.length">
                                <a>
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="small text-muted">Sem elementos</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview" ng-repeat="productsbasket in vm.listProdsCar">
                                <a>
                                  <div class="media">
                                    <div class="media-body">
                                        <p class="small text-muted">{{ productsbasket.name }}  <i class="fa fa-arrow-right" aria-hidden="true"></i>   {{ productsbasket.price}}€ </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <!-- Portfolio Grid Section -->
    <section id="Checkout" class="bg-light-gray" style="padding: 150px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Checkout</h2>
                    <br>
                       <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><center>Basket Name</center></th>
                              <th><center>Price</center></th>
                              <th><center></center></th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr ng-repeat="productsbasket in vm.listProdsCar">
                              <th scope="row">1</th>
                              <td>{{ productsbasket.name }}</td>
                              <td>{{ productsbasket.price }} €</td>
                              <td><button type="button" class="btn btn-default alert alert-danger" ng-click="vm.removeFromCar($index)">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove
                                </button></td>
                            </tr>
                          </tbody>
                        </table>
                </div>
                <div class="row">
                  <div class="col-md-8"></div>
                  <div class="col-md-4"><h5>Total: {{vm.getTotalCar()}} €</h5></div>
                </div>
                                
            </div>
            <br>
        <?php echo $__env->make('paypal.paypal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </section>

 


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    <!-- Contact Form JavaScript -->
    <script src="<?php echo e(asset('js/jqBootstrapValidation.js')); ?>"></script>
    <script src="<?php echo e(asset('js/contact_me.js')); ?>"></script>
    <!-- Theme JavaScript -->
    <script src="<?php echo e(asset('js/agency.min.js')); ?>"></script>

</body>

</html>
