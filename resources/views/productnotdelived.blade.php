 @extends('layouts.adminLayout')

    @section('content')

		<div id="page-wrapper" ng-controller="productNotDelivedController">
	    	<h1>Products for deliver</h1>
	        <hr>
	        <div class="row">
	          <div class="col-lg-12" >
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Produts for deliver list</h3>
	              </div>
	              <div class="panel-body">
	                <div class="list-group">
	                <table class="table table-bordered table-hover tablesorter">
	                  <thead>
	                    <tr>
	                      <th>Donation <i class="fa fa-sort"></i></th>
	                      <th>Price <i class="fa fa-sort"></i></th>
	                      <th>Details<i class="fa fa-sort"></i></th>
	                    </tr>
	                  </thead>
	                  <tbody>
	                   <tr ng-repeat="donation in donations">
	                      <td class="col-sm-9">@{{ donation.name }}</td>
	                      <td class="col-sm-2">@{{ donation.price }}</td>
	                      <td class="col-sm-1">
	                        <button id="btn-add" class="btn btn-primary btn-sm" ng-click="toggle(donation.id)"> View Details <i class="fa fa-plus" aria-hidden="true" style="margin-left: 50px; margin-right: 20px"></i></button>
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
	    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">                 
                                <p>Product</p>
                                <hr>
                            </div>
                            <div class="col-sm-4">                 
                                <p>Quantity</p>
                                <hr>
                            </div> 
                            <div class="col-sm-4">                 
                                <p>Price</p>
                                <hr>
                            </div>     
                        </div>
						<div class="row" ng-repeat="donation in products">
                            <div class="col-sm-4">                  
                                <p>@{{donation.pd }}</p>
                            </div>
                            <div class="col-sm-4">                                                
                                <p>@{{ donation.quantity }}</p>                            
                            </div> 
                            <div class="col-sm-4">                                                
                                <p>@{{ donation.totalline }}</p>                               
                            </div>     
                        </div>
                    </div>
                </div>
            </div> 
        </div>
	    	<!-- /#wrapper -->
	@endSection('content')
