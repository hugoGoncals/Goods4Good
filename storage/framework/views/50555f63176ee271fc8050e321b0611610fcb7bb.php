  <?php $__env->startSection('content'); ?>

  <div id="page-wrapper" ng-controller="adminProdListController">
    <h4> <i class="fa fa-product-hunt"></i> | Products</h4>
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
      <div class="col-md-12" >
        <form class="form-inline">
          <label>Status</label>
          <select id="opcoes" class="form-control input-sm" ng-model="stat.idstatus" 
              ng-options="status[0] as status[1] for status in stats">
              <option value="">Escolha uma opcao</option>
          </select>
        </form>
        <hr>
      </div>
      <div class="col-lg-12" >
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Products list</h3>
          </div>
          <div class="panel-body">
            <div class="list-group">
            <table class="table table-bordered table-hover tablesorter">
              <thead>
                <tr>
                  <th class="col-sm-2" ng-click="sortBy('description')">Name <span class="sortorder" ng-show="propertyName === 'description'" ng-class="{reverse: reverse}"></span></th>
                  <th class="col-sm-2" ng-click="sortBy('cat')">Category <span class="sortorder" ng-show="propertyName === 'cat'" ng-class="{reverse: reverse}"></span></th> 
                  <th class="col-sm-2" ng-click="sortBy('name')">Provider <span class="sortorder" ng-show="propertyName === 'name'" ng-class="{reverse: reverse}"></span></th>
                  <th class="col-sm-2" ng-click="sortBy('quantity')">Quantity <span class="sortorder" ng-show="propertyName === 'quantity'" ng-class="{reverse: reverse}"></span></th>
                  <th class="col-sm-2" ng-click="sortBy('price')">Price (UNI) <span class="sortorder" ng-show="propertyName === 'price'" ng-class="{reverse: reverse}"></span></th>
                  <th class="col-sm-2" ng-click="sortBy('price')">Status <span class="sortorder" ng-show="propertyName === 'price'" ng-class="{reverse: reverse}"></span></th>
                  <th class="col-sm-2"><button id="btn-add" class="btn btn-success btn-sm" ng-click="toggle('add', 0)"><i class="fa fa-plus" aria-hidden="true"></i> Add New Product </button></th> -
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat="product in productos | orderBy:propertyName:reverse|filter:search|filter:stat||undefined: true">
                  <td class="col-sm-2">{{product.description}}</td>
                  <td class="col-sm-2">{{product.cat}}</td>
                  <td class="col-sm-2">{{product.name}}</td>
                  <td class="col-sm-2">{{product.quantity}}</td>
                  <td class="col-sm-2">{{product.price | currency }} </td>
                  <td class="col-sm-2">{{product.idstatus}}</td>
                 <td class="col-sm-1">
                    
                    <button class="btn btn-default btn-sm btn-detail" ng-click="toggle('edit', product.id)">Edit <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-left: 10px"></i></button>
                    <button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(product.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    
                  </td>
                  <td>
                    <button ng-model="stat.idstatus"  ng-if="stat.idstatus==1" class="btn btn-success"  ng-click="aproveProduct(product.id)">Approve Product<i aria-hidden="true"></i></button>
                    <button ng-model="stat.idstatus"  ng-if="stat.idstatus==0" class="btn btn-danger" ng-click="disaproveProduct(product.id)" >Disaprove Product<i aria-hidden="true"></i></button>
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
            <button type="button" class="close" data-dismiss="modal" ng-click="reloadRoute()" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-product-hunt"></i> | {{form_title}}</h4>
          </div>
          <div class="modal-body">
            <form name="frmEmployees" class="form-horizontal" novalidate="">
              <div class="form-group">
                <div class="col-sm-5">
                  <label class="col-sm-3">Name</label>
                  <input type="text" class="form-control has-error input-sm" id="description" value="{{description}}" ng-model="product.description" ng-required="true">
                  <span class="help-inline" 
                  ng-show="frmEmployees.description.$invalid && frmEmployees.description.$touched">Name field is required</span>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-3">Price</label>
                  <input type="number" min="0.01" step="0.01" class="form-control has-error input-sm" id="price" value="{{price}}" ng-model="product.price" ng-required="true">
                  <span class="help-inline" 
                  ng-show="frmEmployees.price.$invalid && frmEmployees.price.$touched">Price field is required</span>
                  <br>
                </div>
                <div class="col-sm-3">
                  <label class="col-sm-3">Quantity</label>
                  <input type="number" class="form-control has-error input-sm" id="quantity" value="{{quantity}}" ng-model="product.quantity" ng-required="true">
                  <span class="help-inline" 
                  ng-show="frmEmployees.quantity.$invalid && frmEmployees.quantity.$touched">quantity field is required</span>
                </div> 

                <div class="col-sm-6">
                  <label class="col-sm-3">Categories</label>
                  <select class="form-control input-sm" ng-model="product.idcategory" 
                      ng-options="cat.id as cat.description for cat in categorie">
                      <option value="">Escolha uma opcao</option>
                  </select>
                </div>

                <div class="col-sm-6">
                  <label class="col-sm-3">Providers</label>
                  <select class="form-control input-sm" ng-model="product.idprovider" 
                      ng-options="prov.id as prov.name for prov in providers">
                      <option value="">Escolha uma opcao</option>
                  </select>
                  
                </div>
              </div>
            </form>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>