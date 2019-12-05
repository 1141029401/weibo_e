<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(session()->has($msg)): ?>
    <div class="flash-message">
      <p class="alert alert-<?php echo e($msg); ?>">
        <?php echo e(session()->get($msg)); ?>

      </p>
    </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/vagrant/Code/weibo/resources/views/shared/_messages.blade.php ENDPATH**/ ?>