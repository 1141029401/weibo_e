<li class="media mt-4 mb-4">
  <a href="<?php echo e(route('users.show', $user->id )); ?>">
    <img src="<?php echo e($user->gravatar()); ?>" alt="<?php echo e($user->name); ?>" class="mr-3 gravatar"/>
  </a>
  <div class="media-body">
    <h5 class="mt-0 mb-1"><?php echo e($user->name); ?> <small> / <?php echo e($status->created_at->diffForHumans()); ?></small></h5>
    <?php echo e($status->content); ?>

  </div>
</li><?php /**PATH /home/vagrant/Code/weibo/resources/views/statuses/_status.blade.php ENDPATH**/ ?>