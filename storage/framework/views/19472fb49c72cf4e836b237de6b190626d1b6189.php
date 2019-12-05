<?php $__env->startSection("title","主页"); ?>
<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          <?php echo $__env->make('shared._status_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
        <h4>微博列表</h4>
        <hr>
        <?php echo $__env->make('shared._feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          <?php echo $__env->make('shared._user_info', ['user' => Auth::user()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
      </aside>
    </div>
  <?php else: ?>
    <div class="jumbotron">
      <h1>Hello Laravel</h1>
      <p class="lead">
        你现在所看到的是 <a href="https://learnku.com/courses/laravel-essential-training">Laravel 入门教程</a> 的示例项目主页。
      </p>
      <p>
        一切，将从这里开始。
      </p>
      <p>
        <a class="btn btn-lg btn-success" href="<?php echo e(route('signup')); ?>" role="button">现在注册</a>
      </p>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/weibo/resources/views/static_pages/home.blade.php ENDPATH**/ ?>