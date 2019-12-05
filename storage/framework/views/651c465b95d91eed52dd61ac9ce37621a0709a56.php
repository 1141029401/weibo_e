<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('follow', $user)): ?>
  <div class="text-center mt-2 mb-4">
    <?php if(Auth::user()->isFollowing($user->id)): ?>
      <form action="<?php echo e(route('followers.destroy', $user->id)); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('DELETE')); ?>

        <button type="submit" class="btn btn-sm btn-outline-primary">取消关注</button>
      </form>
    <?php else: ?>
      <form action="<?php echo e(route('followers.store', $user->id)); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <button type="submit" class="btn btn-sm btn-primary">关注</button>
      </form>
    <?php endif; ?>
  </div>
<?php endif; ?><?php /**PATH /home/vagrant/Code/weibo/resources/views/users/_follow_form.blade.php ENDPATH**/ ?>