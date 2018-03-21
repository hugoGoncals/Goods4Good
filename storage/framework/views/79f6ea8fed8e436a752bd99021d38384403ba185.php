<?php $__env->startSection('content'); ?>
<div class="container" ng-controller="userController">
  <div class="row">
      <div class="col-md-11">
        
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-history" ></i> About me</h3>
          </div>
          <div class="panel-body">
            <div class="col-sm-6 col-md-4" style=" margin-top: 25px;margin-left:25px;">
               <img  style="width: 130px;"src="<?php echo e(Auth::user()->avatar); ?>" class="img-circle" >
            </div>
            <div class="col-sm-6 col-md-8" style="margin-left:-150px;">
              <h2><?php echo e(Auth::user()->name); ?></h2><br>
              <span class="glyphicon glyphicon-envelope one" style="width:30px;"></span> <?php echo e(Auth::user()->email); ?><br>
              <span class="glyphicon glyphicon-gift" style="width:30px;"></span>  <?php echo e(Auth::user()->age); ?><br>
              <span class="glyphicon glyphicon-user one" style="width:30px;"></span> <?php echo e(Auth::user()->gender); ?><br>
              <span class="glyphicon glyphicon-map-marker one" style="width:30px;"></span> <?php echo e(Auth::user()->location); ?><br>
              <br>
            </div>
            <div  style="margin-left:870px; margin-top:-180px;"class="col-sm-6 col-md-8">
                <button style="width: 130px;" type="submit" class="btn btn-primary" ng-click="toogle()">
                    Edit profile
                </button>
            </div>
          </div>
      </div>

    </div>
    <div class="col-sm-11">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-history" ></i> Social Media</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12 text-left">

              <p>Share us with your friends and let them know that you are helping others!</p>
              <br>
              <div id="fb-root"></div>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.11&appId=183095938953017&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
             <div class="fb-share-button" data-href="http://negativesintopositives.ipvc.pt/" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnegativesintopositives.ipvc.pt%2F&amp;src=sdkpreparse">Share</a></div>
           
             <div style="margin-left:100px; margin-top:-27px;">
                <a href="https://twitter.com/intent/tweet?url=http://negativesintopositives.ipvc.pt/" class="twitter-share-button" data-show-count="false" data-size="large">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
             </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-11">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-history" ></i> My Achievement</h3>
        </div>
        <div class="panel-body">
          <div ng-repeat="donation in don">
            <h3 style="text-align: center;">Total Donated: {{donation.sdon}}€</h3>
          </div>
          <div class="col-md-4 col-md-offset-1" style="text-align: center;" ng-repeat="badge in badgets" ng-if="badge.min_value < donations">
            <img style="margin-top: 30px;" src="{{ badge.urlfoto }}">
            <h3 style="text-align: center; margin: 20px;">{{badge.description}}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mensage modal (readed and unreaded) -->
  <div class="modal fade" id="ModalEditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit profile</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">  
            <div>

            <label for="gender" class="col-md-4 control-label">Gender</label>
              <div class="col-md-6">
                <input id="gender" type="text" class="form-control" ng-model="gender" value="<?php echo e(old('gender')); ?>">
              </div>
            </div>

            <div>
              <label for="age" class="col-md-4 control-label">Age</label>
              <div class="col-md-6">
                <input id="age" class="form-control" type="text" value="<?php echo e(old('age')); ?>" ng-model="age">
              </div>
            </div>

            <div>
              <label for="location" class="col-md-4 control-label">Location</label>
              <div class="col-md-6">
                <input id="location" type="text" class="form-control" ng-model="location" value="<?php echo e(old('location')); ?>">
              </div>
            </div>

            <div>
              <div class="col-md-6"> 
                 <span id="id" style="display:none"><?php echo e(Auth::user()->id); ?></span> 
              </div>
            </div>

              <br><br><br><br><br><br><br>
            <div class="col-sm-4" > <!-- change msg status -->
              <button id="btn-add" class="btn btn-success btn-sm" ng-click="editar()"> Save </button>
            </div>  
          </div>      
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>