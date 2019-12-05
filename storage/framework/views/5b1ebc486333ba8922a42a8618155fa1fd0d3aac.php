
<?php $__env->startSection('title', '更新密码'); ?>

<?php $__env->startSection('content'); ?>
<div class="offset-md-1 col-md-10">
  <div class="card">
    <div class="card-header">
        <h5>更新密码</h5>
    </div>

    <div class="card-body">
      <form method="POST" action="<?php echo e(route('password.update')); ?>">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">Email 地址</label>

          <div class="col-md-6">
            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autofocus>

            <?php if($errors->has('email')): ?>
            <span class="invalid-feedback" role="alert">
              <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">密码</label>

          <div class="col-md-6">
            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

            <?php if($errors->has('password')): ?>
            <span class="invalid-feedback" role="alert">
              <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">确认密码</label>

          <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
        </div>

        <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
              重置密码
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/weibo/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>