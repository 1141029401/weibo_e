<a href="#">
  <strong id="following" class="stat">
    <?php echo e(count($user->followings)); ?>

  </strong>
  关注
</a>
<a href="#">
  <strong id="followers" class="stat">
    <?php echo e(count($user->followers)); ?>

  </strong>
  粉丝
</a>
<a href="#">
  <strong id="statuses" class="stat">
    <?php echo e($user->statuses()->count()); ?>

  </strong>
  微博
</a><?php /**PATH /home/vagrant/Code/weibo/resources/views/shared/_stats.blade.php ENDPATH**/ ?>