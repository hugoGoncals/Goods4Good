@extends('layouts.adminLayout')

    @section('content')

		<div id="page-wrapper" ng-controller="productDelivedController">
				<h4><i class="fa fa-check-square-o" aria-hidden="true"></i>  | Orders</h4>
				<hr>
				<div class="row">
					<div class="col-md-12" >
						<form class="form-inline">
							<div class="form-group ">
								<label >Search</label>
								<input type="text" ng-model="search" class="form-control input-sm" placeholder="Search">
							</div>
						</form>
						<hr>
					</div>
					<div class="col-lg-12" >
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title" ><i class="fa fa-clock-o"></i> Donations list</h3>
							</div>
							<div class="panel-body">
								<div class="list-group" >
								<table class="table table-bordered table-hover tablesorter">
									<thead>
										<tr>
											<th>Donation <i class="fa fa-sort"></i></th>
											<th>Donnor <i class="fa fa-user"></i></th>
											<th>Price <i class="fa fa-sort"></i></th>
											<th>Status <i class="fa fa-sort"></i></th>
											<th><i class="fa fa-cogs"></i></th>
										</tr>
									</thead>
									<tbody>
										<tr ng-if="!donations.length">
											<td colspan="5" align="center">Sem elementos</td>
										</tr>
										<tr ng-repeat="donation in donations">
											<td class="col-sm-2">@{{ donation.data }}</td>
											<td class="col-sm-2">@{{ donation.name }}</td>
											<td class="col-sm-2">@{{ donation.totaldone }}</td>
											<td class="col-sm-2">@{{ donation.status }}</td>
											<td>
												<button id="btn-add" class="btn btn-primary btn-sm" ng-click="toggle(donation.id)"> View Details <i class="fa fa-plus" aria-hidden="true"></i></button>
				 
										 </td>
										</tr>
									</tbody>
								</table>
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
											<table class="table table-bordered table-hover tablesorter">
												<tr>
													<td>Product</td>
													<td>Quantity</td>
													<td>Price</td>
												</tr>                        
												<tr ng-repeat="v in products">
													<td>@{{v.pd }}</td>
													<td>@{{v.quantity }}</td>
													<td>@{{ v.totalline }}</td>
												</tr>
											</table>
										</div>
								</div>
						</div> 
				</div>
				</div>
	@endSection('content')