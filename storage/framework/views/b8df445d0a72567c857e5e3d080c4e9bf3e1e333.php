<form action="<?php echo e(route('statuses.store')); ?>" method="POST">
  <?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo e(csrf_field()); ?>

  <textarea class="form-control" rows="3" placeholder="聊聊新鲜事儿..." name="content"><?php echo e(old('content')); ?></textarea>
  <div class="text-right">
      <button type="submit" class="btn btn-primary mt-3">发布</button>
  </div>
</form><?php /**PATH /home/vagrant/Code/weibo/resources/views/shared/_status_form.blade.php ENDPATH**/ ?>