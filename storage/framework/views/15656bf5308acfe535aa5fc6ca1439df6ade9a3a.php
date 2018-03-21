 

   <?php $__env->startSection('content'); ?>

      <div id="page-wrapper" ng-controller="DonationsMadeController">
        <h1>Dashboard</h1>
        <hr>
        <div class="row">
          
          <div class="col-lg-6">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-shopping-basket"></i> Baskets avaiable</h3>
              </div>
              <div class="panel-body">
                <div class="list-group">
                <table class="table table-bordered table-hover tablesorter">
                  <thead>
                    <tr>
                      <th>Basket name <i class="fa fa-sort"></i></th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                   <tr ng-repeat="v in listBk">
                      <td class="col-sm-2">{{ v.name }}</td>
                      <td class="col-sm-2"><strong>{{ v.price }}</strong></td>
                    </tr>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /#wrapper -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>