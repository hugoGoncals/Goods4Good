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

<body id="page-top" class="index" ng-controller="ProductbasketController as vm">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Goods4Good</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#donate">Donate</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About us</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>

                    <?php if(Auth::user()): ?>
                                    <li>
                                    <a href="<?php echo e(action("HomeController@redireciona")); ?>"><?php echo e(Auth::user()->name); ?></a>
                                    </li>

                                    <?php else: ?>
                                    <li>
                        <a href="/inicio">Login</a>
                    </li> 
                                <?php endif; ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo e(asset('imgs/shopping-cart.png')); ?>"> <span style="background-color: #0ED0B4" class="badge">{{vm.listProdsCar.length}}</span> <b class="caret"></b></a>
                        
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview" ng-if="!vm.listProdsCar.length">
                                <a>
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="small text-muted">No elements</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview" ng-repeat="productsbasket in vm.listProdsCar">
                                <a>
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="small text-muted">{{ productsbasket.name }}  <span style="background-color: #0ED0B4" class="badge">{{productsbasket.quantity}}</span><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ productsbasket.price}}€ </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                             <li class="message-preview">
                                <a>
                                  <div class="media">
                                    <div class="media-body">
                                         <p class="small text-muted"><b>Total: {{ vm.getTotalCar() }} € </b></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                            <li class="message-footer" ng-if="vm.listProdsCar.length">
                                <hr>
                                <a href="/checkout"><p class="small text-muted">Checkout</p></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" >
            <div class="intro-text">
                <div class="intro-lead-in">“Help others without any reason and give without the expectation of receiving anything in return.”</div>

                <div class="quote">-Roy T. Bennett</div>

                <!--<div class="intro-heading">It's Nice To Meet You</div> -->
                <a href="#donate" class="page-scroll btn btn-xl">Donate</a>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="donate" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Donate</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item" ng-repeat="productsbasket in vm.listBk" ng-click="vm.selectedBasket=productsbasket;">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal" >
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        
                        <img src="<?php echo e(asset('imgs/portfolio/cart.png')); ?>" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4> {{productsbasket.name}} </h4>
                        <p> {{productsbasket.price}}€</p>
                        <button class="page-scroll btn btn-xs" ng-click="vm.addCar(productsbasket)">Donate</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">"Help other expecting nothing in return!"</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive1" src="<?php echo e(asset('imgs/about/ong1.jpg')); ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Before 2015</h4>
                                    <h4 class="subheading">The Background</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">The number of people seeking refugee status in Europe and in North has soared over recent years,due in large part to war in Syria and Iraq, as well as conflict and instability in countries such as Afghanistan and Eritrea. As a result people began to reach Europe in the hope of claiming asylum, to seeki a better life. The lack of timely and authorised modes of migration, led to people paying large sums of money to be smuggled on overcrowded boats from Libya to Italy or Turkey to Greece.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive1" src="<?php echo e(asset('imgs/about/ong4.jpg')); ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>September 2015</h4>
                                    <h4 class="subheading">The Tipping Point</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">The image of Aylan Kurdi, the Syrian child whose body washed up on a Turkish beach, encapsulated the human tragedies of the thousands trying to reach the shores of Europe. By the time Aylan’s body washed ashore, more than 300,000 people had risked their lives to reach the west. Over 2,600 had perished in the attempt.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive1" src="<?php echo e(asset('imgs/about/ong3.jpg')); ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016-2017</h4>
                                    <h4 class="subheading">The Crisis Today</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Nearly half a million people are thought to have reached Europe since 2016. In the year to 15 June 2017, 92,000 people had arrived in Europe, with Italy receiving the most (>90%) a result of increasing border control by the Turquish authorities. In May 2017, only 22% and 16% of people have been relocated from Greece and Italy, respectively, a process that is proving painfully long, leaving a lot of people destitute and overly dependent on charitable support to survive.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive1" src="<?php echo e(asset('imgs/about/ong2.jpg')); ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>NOW</h4>
                                    <h4 class="subheading">Help us Helping!</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">By purchasing goods from privately-owned businesses supplying donation centres run by charities and iNGOs working on the ground to paliate the harsh living conditions of people stranded in Greece and Italy, you will be contributing to building bridges between local people host communities, migrants and asylum-seekers.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of The
                                    <br>Story!</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

 <!--__________________________________OUR AMAZING TEAM Section_________________________-->
 <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>

                </div>
            </div>


            <div class="row">
                <div class="col-sm-3">
                    <div class="team-member">

                        <img src="<?php echo e(asset('imgs/team/salvation.jpg')); ?>" class="img-responsive img-circle" alt="">
                        <h4>The Salvation Army</h4>
                        <p class="text-muted">Charity</p>

                        <button class="more1 btn btn-primary">More</button><br>
                        <div class="oculta1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo architecto voluptatum asperiores nam natus hic earum ratione quae reprehenderit labore necessitatibus explicabo veritatis ipsam expedita laudantium qui maiores laboriosam inventore?
                            <script type="text/javascript">
                                $('.oculta1').hide();
                                $('.more1').click(function(){
                                    $('.oculta1').slideToggle(); 

                                   
                                      $(this).text($(this).text() == "More" ? "Less" : "More"
                                      );
                                });

                            </script>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="<?php echo e(asset('imgs/team/rita.jpg')); ?>" class="img-responsive img-circle" alt="">
                        <h4>Rita Moreira Silva</h4>
                        <p class="text-muted">Project Booster</p>


                        <button class="more2 btn btn-primary">More</button><br>
                        <div class="oculta2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo architecto voluptatum asperiores nam natus hic earum ratione quae reprehenderit labore necessitatibus explicabo veritatis ipsam expedita laudantium qui maiores laboriosam inventore?
                            <script type="text/javascript">
                                $('.oculta2').hide();
                                $('.more2').click(function(){
                                    $('.oculta2').slideToggle(); 

                                    $(this).text($(this).text() == "More" ? "Less" : "More"
                                      );
                                });

                            </script>

                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="<?php echo e(asset('imgs/team/estg.png')); ?>" class="img-responsive img-circle"  alt="">
                        <h4>ESTG - IPVC</h4>
                        <p class="text-muted">Supporter of the project</p>


                        <button class="more3 btn btn-primary">More</button><br><br>
                        <div class="oculta3">The School of Technology and Management is an organic unit of IPVC (Polytechnic Institute of Viana do Castelo), which was created in 1985 in the city of Viana do Castelo in Portugal.
                        It is a higher education center that values relations with the surrounding environment, especially at the economic and social level, interacting with the community.
                        It is also a center for scientific and technological training that prepares qualified professionals in the field of technology and management and the underlying sciences and techniques.
                            <script type="text/javascript">
                                $('.oculta3').hide();
                                $('.more3').click(function(){
                                    $('.oculta3').slideToggle(); 

                                    $(this).text($(this).text() == "More" ? "Less" : "More"
                                      );
                                });

                            </script>

                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="team-member">
                        <img src="<?php echo e(asset('imgs/team/en.jpg')); ?>" class="img-responsive img-circle" alt="">
                        <h4>Volunteer Students</h4>
                        <p class="text-muted">Developers</p>


                        <button class="more4 btn btn-primary">More</button><br>
                        <div class="oculta4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo architecto voluptatum asperiores nam natus hic earum ratione quae reprehenderit labore necessitatibus explicabo veritatis ipsam expedita laudantium qui maiores laboriosam inventore?
                            <script type="text/javascript">
                                $('.oculta4').hide();
                                $('.more4').click(function(){
                                    $('.oculta4').slideToggle(); 
                                    $(this).text($(this).text() == "More" ? "Less" : "More"
                                      );

                                });
                            </script>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo e(action('MailController@basic_email')); ?>" method="post" >
                    <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" name="nome" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" name="mail" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Subject *" id="subject" name="assunto" required data-validation-required-message="Please enter a subject.">
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" name="mensagem" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!--     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> -->

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <!-- Portfolio Modal 1 -->
   <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><i class="fa fa-times-circle-o fa-3x"></i>
                </div>
                <div class="container" style="width:inherit; height:inherit;">
                    <div class="row" ng-repeat="basket in vm.listBk" ng-if="vm.selectedBasket.id == basket.id">
                        <div class="col-lg-8 col-lg-offset-2" >
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>{{basket.name}}</h2>
                                <br>
                                <p ng-repeat="prod in basket.prods">{{prod.description}}</p>
                                <br>
                                <h4>Price: {{basket.price}}€ </h4>
                                <br>

                                <button type="button" class="btn btn-primary" ng-click="vm.addCar(basket)" data-dismiss="modal" >Donate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
