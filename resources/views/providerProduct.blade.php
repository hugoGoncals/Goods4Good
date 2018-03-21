@extends('layouts.layoutProvider')

@section('content')
    <div id="page-wrapper" ng-controller="ProductController">
      <h1> Products </h1>
      <hr>
      <div class="row">
        <div class="col-lg-12" >
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-clock-o"></i> Products</h3>
            </div>
            <div class="panel-body">
              <div class="list-group">
              <table class="table table-bordered table-hover tablesorter warning">
                <thead>
                  <tr>
                    <th>Categories <i class="fa fa-sort"></i></th>
                    <th>Products <i class="fa fa-sort"></i></th>
                    <th>My Products <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-sm-2">
                      <div class="dropdown">
  			                <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Categories <span class="caret"></span></button>
                			  <ul class="dropdown-menu" >
                			    <li ng-repeat="categorie in categories"><a ng-click="listarProd(categorie.id)">@{{categorie.description}}</a></li>
                			  </ul>
                      </div>
  			            </td>
                    <td class="col-sm-2">                    	
                    	<ul class="list-group">
                        <li class="list-group-item" ng-click="addProvider(product)" ng-repeat="product in products">@{{product.description}}</li>
                      </ul>
                    </td>
                    <td class="col-sm-4">
                    	<ul class="list-group input-group" ng-repeat="product in listProds">
               					<li class="list-group-item">@{{product.description}} </li>
  	                      <input class="col-md-2 form-control" type="number" ng-model="product.price" min=0>
                          <span class="input-group-addon" id="basic-addon2">€</span> 	
                          </ul>
              		    <div class="col-sm-12">
              		    	<button type="button" class="btn btn-sm btn-success pull-right" ng-click="SaveProds()"  ng-if="listProds.length"><span class="glyphicon glyphicon-remove"></span> Save </button>
              		    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
  </div>

 @endSection('contents')  