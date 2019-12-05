<?php if($feed_items->count() > 0): ?>
  <ul class="list-unstyled">
    <?php $__currentLoopData = $feed_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make('statuses._status',  ['user' => $status->user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <div class="mt-5">
    <?php echo $feed_items->render(); ?>

  </div>
<?php else: ?>
  <p>没有数据！</p>
<?php endif; ?><?php /**PATH /home/vagrant/Code/weibo/resources/views/shared/_feed.blade.php ENDPATH**/ ?>