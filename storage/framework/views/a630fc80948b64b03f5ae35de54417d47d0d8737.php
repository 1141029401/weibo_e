<div class="list-group-item">
  <img class="mr-3" src="<?php echo e($user->gravatar()); ?>" alt="<?php echo e($user->name); ?>" width=32>
  <a href="<?php echo e(route('users.show', $user)); ?>">
    <?php echo e($user->name); ?>

  </a>
</div><?php /**PATH /home/vagrant/Code/weibo/resources/views/users/_user.blade.php ENDPATH**/ ?>