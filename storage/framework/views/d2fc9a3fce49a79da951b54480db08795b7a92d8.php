<?php $__env->startSection('content'); ?>
    <div id="page-wrapper" ng-controller="providerMyProdsController" ng-init="init(<?php echo e(Auth::user()); ?>)">
      <h4><i class="fa fa-product-hunt" aria-hidden="true"></i> | Products</h4>
      <hr>
      <div class="row">
        <div class="col-md-12">
        <h5><i class="fa fa-question-circle" aria-hidden="true"></i> | Sugestions</h5>
        <hr>
          <button id="btn-add" class="btn btn-success btn-sm" ng-click="toggle('add',0)"><i class="fa fa-plus" aria-hidden="true"></i> Suggest new product </button>
        <hr>                
        <table class="table table-bordered table-hover tablesorter">
          <thead>
            <tr>
              <!--<th ng-click="teste(<?php echo e(Auth::user()); ?>)"><?php echo e(Auth::user()->name); ?></th>-->
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <!-- unreaded -->
            <tr ng-repeat="p in products"> 
              <td>{{ p.description }}</td>
              <td>{{ p.price }}</td>
              <td>{{ p.quantity }}</td>
              <td ng-if="p.idstatus==0">Accepted</td>
              <td ng-if="p.idstatus==1">Rejected</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

      <div class="modal fade" id="SuggestProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal">
                      <fieldset>
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="description">Name:</label>  
                          <div class="col-md-4">
                          <input id="description" name="description" ng-model="cv.description" type="text" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="categorie">Category:</label>
                          <div class="col-md-4" >
                            <select id="idcategory" name="idcategory" ng-model="cv.idcategory" class="form-control">
                              <option ng-repeat="cat in categories" value="{{cat.id}}">{{cat.description }}</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="quantity">Stock:</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <input id="quantity" name="quantity" class="form-control" ng-model="cv.quantity" placeholder="" type="number" required="">
                              </div>
                              
                            </div>
                          </div>
                        
                        <!-- Appended Input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="price">Price UNI:</label>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input id="price" name="price" class="form-control" ng-model="cv.price" placeholder="" type="number" min="0.01" step="0.01" required="">
                              <span class="input-group-addon">€</span>
                            </div>
                            
                          </div>
                        </div>
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="saveroduct"></label>
                          <div class="col-md-8">
                            <button id="saveroduct" name="saveroduct" class="btn btn-success" ng-click="save(cv)">Send</button>
                            <button id="cancel" name="cancel" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
              </div>
          </div> 
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutProvider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>