<div class="list-group-item">
  <img class="mr-3" src="<?php echo e($user->gravatar()); ?>" alt="<?php echo e($user->name); ?>" width=32>
  <a href="<?php echo e(route('users.show', $user)); ?>">
    <?php echo e($user->name); ?>

  </a>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy', $user)): ?>
    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post" class="float-right">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('DELETE')); ?>

      <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
    </form>
  <?php endif; ?>
</div><?php /**PATH /home/vagrant/Code/weibo/resources/views/users/_user.blade.php ENDPATH**/ ?>