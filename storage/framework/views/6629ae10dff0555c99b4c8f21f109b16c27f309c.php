<?php $__env->startSection('content'); ?>
<div class="container" ng-controller="listDonationUser">
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
                      <th>Date</th>
                      <th>Total</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr ng-repeat="product in donations">
                      <td class="col-sm-1">
                        {{ product.data }}
                      </td>
                      <td class="col-sm-1"> {{ product.totaldone }}€</td>
                      <td class="col-sm-1"><strong>{{ product.status }} </strong></td> 
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>