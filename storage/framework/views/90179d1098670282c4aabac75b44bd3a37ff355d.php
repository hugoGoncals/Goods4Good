    <?php $__env->startSection('content'); ?>
	    <div id="page-wrapper" ng-controller="ProviderController">
	    <h4><i  class="fa fa-users" aria-hidden="true"></i> | Providers</h4>
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
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Providers list</h3>
	              </div>
	              <div class="panel-body">
	                <div class="list-group">
	                <table class="table table-bordered table-hover tablesorter">
	                	<thead>
	                        <tr>
	                        	<th ng-click="sortBy('name')">Name <span class="sortorder" ng-show="propertyName === 'name'" ng-class="{reverse: reverse}"></span></th>
	                			<th ng-click="sortBy('email')">Email <span class="sortorder" ng-show="propertyName === 'email'" ng-class="{reverse: reverse}"></span></th>
	                			<th ng-click="sortBy('iban')">IBAN <span class="sortorder" ng-show="propertyName === 'iban'" ng-class="{reverse: reverse}"></span></th>
	                          	<th class="col-md-2"><button id="btn-add" class="btn btn-success btn-sm" ng-click="toggle('add', 0)"><i class="fa fa-plus"></i> Add New Provider </button></th>
	                        </tr>
	                  	</thead>
	                  	<tbody>
	                        <tr ng-repeat="provider in providers|orderBy:propertyName:reverse|filter:search">
		                        <td>{{ provider.name }}</td>
		                        <td>{{ provider.email }}</td>
		                        <td>{{ provider.iban }}</td>
		                        <td class="col-md-2">
		                        	<button class="btn btn-default btn-sm btn-detail" ng-click="toggle('edit', provider.id)">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
									<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(provider.id)"><i class="fa fa-trash-o"></i></button>
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
                            <h4 class="modal-title" id="myModalLabel"><i  class="fa fa-users" aria-hidden="true"></i>  | {{form_title}}</h4>
                        </div>
	                        <div class="modal-body">
	                            <form name="frmEmployees" class="form-horizontal" novalidate="">

	                                <div class="form-group">
	                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="{{name}}" ng-model="provider.name" ng-required="true">
	                                        <span class="help-inline" 
	                                        ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
	                                    <div class="col-sm-9">
	                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{email}}" ng-model="provider.email" ng-required="true">
	                                        <span class="help-inline" 
	                                        ng-show="frmEmployees.email.$invalid && frmEmployees.email.$touched">Valid Email field is required</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="inputEmail3" class="col-sm-3 control-label">IBAN number</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" maxlength="9" class="form-control" id="iban" name="iban" placeholder="IBAN" value="{{iban}}" ng-model="provider.iban" ng-required="true">
	                                    <span class="help-inline" 
	                                        ng-show="frmEmployees.iban.$invalid && frmEmployees.iban.$touched">IBAN is required</span>
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
		    </div>
		<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>