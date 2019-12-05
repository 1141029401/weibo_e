<li class="media mt-4 mb-4">
  <a href="<?php echo e(route('users.show', $user->id )); ?>">
    <img src="<?php echo e($user->gravatar()); ?>" alt="<?php echo e($user->name); ?>" class="mr-3 gravatar"/>
  </a>
  <div class="media-body">
    <h5 class="mt-0 mb-1"><?php echo e($user->name); ?> <small> / <?php echo e($status->created_at->diffForHumans()); ?></small></h5>
    <?php echo e($status->content); ?>

  </div>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy', $status)): ?>
    <form action="<?php echo e(route('statuses.destroy', $status->id)); ?>" method="POST" onsubmit="return confirm('您确定要删除本条微博吗？');">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('DELETE')); ?>

      <button type="submit" class="btn btn-sm btn-danger">删除</button>
    </form>
  <?php endif; ?>
</li><?php /**PATH /home/vagrant/Code/weibo/resources/views/statuses/_status.blade.php ENDPATH**/ ?>