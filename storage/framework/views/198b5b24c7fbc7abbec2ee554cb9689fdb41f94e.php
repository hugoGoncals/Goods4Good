<?php $__env->startSection('content'); ?>
<div class="container" ng-controller="listDonationUser" ng-init="init(<?php echo e(Auth::user()); ?>)">
    <div class="row">
        <div class="col-md-11" >

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-history"></i> My Donations</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                <table class="table table-bordered table-hover tablesorter">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr ng-repeat="product in donations">
                      <td class="col-sm-1">
                        {{ product.id }}
                      </td>
                      <td class="col-sm-1">
                        {{ product.data }}
                      </td>
                      <td class="col-sm-1"> {{ product.totaldone }}€</td>
                      <td class="col-sm-1"><strong>{{ product.status }} </strong></td> 
                      <td class="col-sm-1" align="center" ><button class="more btn btn-primary" ng-click="toggle(product.id)">View products</button>
                      </td>

                    </tr>
                  </tbody>
                </table>
                </div>
                <div class="col-md-6"> 
               <span id="id" style="display:none"><?php echo e(Auth::user()->id); ?></span> 
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
            <h4 class="modal-title" id="myModalLabel"><i  class="fa fa-handshake-o" aria-hidden="true"></i> Basket Details {{form_title}}</h4>
          </div>

            <div class="panel-body">
                <div class="list-group">
                <table class="table table-bordered table-hover tablesorter">

            <thead>
                    <tr>
                      <th>Product</th>
                      <th>Unit Price</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>

            <tbody>
                   <tr ng-repeat="donation in linedonations">
                      <td class="col-sm-1" ng-click="">
                        {{ donation.pd}}
                      </td>
                      <td class="col-sm-1"> {{ donation.totalline }}€</td>
                      <td class="col-sm-1"><strong>{{ donation.quantity }} </strong></td> 
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>