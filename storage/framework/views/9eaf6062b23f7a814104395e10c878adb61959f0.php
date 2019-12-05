<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container ">
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Weibo App</a>
    <ul class="navbar-nav justify-content-end">
      <?php if(Auth::check()): ?>
        <li class="nav-item"><a class="nav-link" href="{route('users.index')}">用户列表</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo e(Auth::user()->name); ?>

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('users.show', Auth::user())); ?>">个人中心</a>
            <a class="dropdown-item" href="<?php echo e(route('users.edit', Auth::user())); ?>">编辑资料</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
              <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
              </form>
            </a>
          </div>
        </li>
      <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('help')); ?>">帮助</a></li>
        <li class="nav-item" ><a class="nav-link" href="<?php echo e(route('login')); ?>">登录</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav><?php /**PATH /home/vagrant/Code/weibo/resources/views/layouts/_header.blade.php ENDPATH**/ ?>