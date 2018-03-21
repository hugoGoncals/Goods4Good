<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="providerRecords">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Goods4Good</title>
        <!-- css -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/sb-admin.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/admin-styled_sbd.css')}}">
        <style type="text/css">
            .sortorder:after {
                content: '\25b2';   // BLACK UP-POINTING TRIANGLE
            }
            .sortorder.reverse:after {
                content: '\25bc';   // BLACK DOWN-POINTING TRIANGLE
            }
          
            .slidecontainer {
              width: 100%; /* Width of the outside container */
          }
          
          /* The slider itself */
          .slider {
              -webkit-appearance: none;  /* Override default CSS styles */
              appearance: none;
              width: 100%; /* Full-width */
              height: 25px; /* Specified height */
              background: #d3d3d3; /* Grey background */
              outline: none; /* Remove outline */
              opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
              -webkit-transition: .2s; /* 0.2 seconds transition on hover */
              transition: opacity .2s;
          }
          
          /* Mouse-over effects */
          .slider:hover {
              opacity: 1; /* Fully shown on mouse-over */
          }
          
          /* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */ 
          .slider::-webkit-slider-thumb {
              -webkit-appearance: none; /* Override default look */
              appearance: none;
              width: 25px; /* Set a specific slider handle width */
              height: 25px; /* Slider handle height */
              background: #4CAF50; /* Green background */
              cursor: pointer; /* Cursor on hover */
          }
          
          .slider::-moz-range-thumb {
              width: 25px; /* Set a specific slider handle width */
              height: 25px; /* Slider handle height */
              background: #4CAF50; /* Green background */
              cursor: pointer; /* Cursor on hover */
          }
          
          
          </style>
        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>   
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/morris/chart-data-morris.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/tablesorter/jquery.tablesorter.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/tablesorter/tables.js')}}"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script type="text/javascript" src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="{{asset('js/dirPagination.js')}}"></script>
        <!-- JS Controllers Angular -->
        <script src="{{asset('/angular/app.js')}}"></script>
        <script src="{{asset('/angular/controllers/adminProductsController.js')}}"></script>
        <script src="{{asset('/angular/controllers/adminProdListController.js')}}"></script>
        <script src="{{asset('/angular/controllers/productDelivedController.js')}}"></script>
        <script src="{{asset('/angular/controllers/productNotDelivedController.js')}}"></script>
        <script src="{{asset('/angular/controllers/adminProviderProductsController.js')}}"></script>
        <script src="{{asset('/angular/controllers/CategorieController.js')}}"></script>
        <script src="{{asset('/angular/controllers/ProviderController.js')}}"></script>
        <script src="{{asset('/angular/controllers/DonationsMadeController.js')}}"></script>
        <script src="{{asset('/angular/controllers/InboxController.js')}}"></script>  
    </head>
    <body>
        <div id="wrapper">
          <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button> 
                <a href="/inicio" class="logo">Goods4Good</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                <li><a href="/provideradmin"><i class="fa fa-home" aria-hidden="true"></i> Home page</a></li>
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/baskets"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Baskets</a></li>
                <li><a href="/productdelived"><i class="fa fa-handshake-o" aria-hidden="true"></i> Donations</a></li>
                <li><a href="/productsList"><i class="fa fa-product-hunt" aria-hidden="true"></i> Products</a></li>
                <li><a href="/categorie"><i class="fa fa-hashtag" aria-hidden="true"></i> Categories</a></li>
                <li><a href="/provideradmin"><i  class="fa fa-users" aria-hidden="true"></i> Providers</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right navbar-user" ng-controller="InboxController">
                <li>
                  <a href="/inboxa"><i class="fa fa-envelope"></i> Notifications <span class="badge">@{{ msgcount }}</span></a>
                </li>
                <li class="dropdown user-dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                  <ul class="dropdown-menu" >
                    <li><a href="/inboxa"><i class="fa fa-envelope"></i> Inbox <span class="badge">@{{ msgcount }}</span></a></li>
                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                        </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <main>
            @yield('content')
        </main>
    </body>
</html>