<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $__env->yieldContent('title', 'Weibo App'); ?> - Laravel 新手入门教程</title>
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
  </head>
  <body>
    <?php echo $__env->make('layouts._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
      <div class="offset-md-1 col-md-10">
        <?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>

    <!--引入app.js-->
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
  </body>
</html><?php /**PATH /home/vagrant/Code/weibo/resources/views/layouts/default.blade.php ENDPATH**/ ?>