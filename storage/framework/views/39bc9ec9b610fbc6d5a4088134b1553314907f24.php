
<?php $__env->startSection('title', '重置密码'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-8 offset-md-2">
  <div class="card ">
    <div class="card-header"><h5>重置密码</h5></div>

    <div class="card-body">
      <?php if(session('status')): ?>
      <div class="alert alert-success">
        <?php echo e(session('status')); ?>

      </div>
      <?php endif; ?>

      <form class="" method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo e(csrf_field()); ?>


        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
          <label for="email" class="form-control-label">邮箱地址：</label>

          <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

          <?php if($errors->has('email')): ?>
            <span class="form-text">
              <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
          <?php endif; ?>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">
            发送密码重置邮件
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/weibo/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>