@extends('layouts.adminLayout')

    @section('content')
	    <div id="page-wrapper" ng-controller="adminProviderProductsController">
            <h1>Products list by Providers</h1>
            <hr>
            <div class="row">
              <div class="col-lg-12" >
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o"></i> Products list</h3>
                  </div>
                  <div class="panel-body">
                    <div class="list-group">
                    <table class="table table-bordered table-hover tablesorter">
                    	<thead>
	                        <tr>
	                          <th>Product <i class="fa fa-sort"></i></th>
	                          <th>Price</th>
	                          <th>Provider <i class="fa fa-sort"></i></th>
	                        </tr>
                      	</thead>
                      	<tbody>
	                        <tr ng-if="!products.length">
					        	<td colspan="3" class="text-center">Sem elementos</td>
					        </tr>
					        <tr ng-repeat="product in products">
			                    <td>@{{ product.description }}</td>
			                    <td>@{{ product.price }}</td>
			                    <td>@{{ product.name }}</td>
					        </tr>
                      	</tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endSection('content')

