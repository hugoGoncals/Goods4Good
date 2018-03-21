<?php $__env->startSection('content'); ?>
<div class="container ">
    <div class="row" >
        <div class="middlePage">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body" style="height: 230px;">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-5"> 
                            <label>You can also sign in using your Facebook, Google or Twitter Account</label>        
                            <a class="btn btn-primary-facebook btn-block spacing" href="<?php echo e(URL::route('auth/facebook')); ?>">
                                Sing in with Facebook
                            </a>
                            <a class="btn btn-primary-google btn-block spacing" href="<?php echo e(URL::route('auth/google')); ?>">
                                Sing in with Google
                            </a>
                            <a class="btn btn-primary-twitter btn-block spacing" href="<?php echo e(URL::route('auth/twitter')); ?>">
                                Sing in with Twitter
                            </a>
                        </div>
                        <div class="col-md-7 " style="border-left:1px solid #ccc;height:200px">
                            <fieldset>
                                <div class="<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>

                                <div class="<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                </div>
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                        </label>
                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                     <button type="submit" class="btn btn-primary btn-block">
                                        Sign in
                                    </button>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>