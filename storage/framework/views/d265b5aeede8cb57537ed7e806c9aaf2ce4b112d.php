<div class="">
    <nav class="navbar navbar-expand-lg navbar-dark">

  <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="dashboard/images/doctorlogo.png" class="img-responsive"></a>

        <a class="navbar-brand mobile" href="#"></a>
        <button class="navbar-toggler" type="button">
            <span class="fa fa-bars"></span>
        </button>
        <?php if(config('app.has_installed') == 1): ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav nav_home">
                    
                <!-- <li class="nav-item" id="appointment">
                    <a class="nav-link <?php echo e(Request::is('appointment') ? 'active' : ''); ?>" href="<?php echo e(url('/appointment')); ?>"> <i class="fa fa-calendar" style="font-size:22px"></i> &nbsp; <?php echo trans('nav.appointment'); ?></a>
                </li> -->

            <?php if(auth()->guard()->guest()): ?>

                <?php if(count(\App\User::all()) == 0): ?>
                <li class="nav-item" id="register">
                    <a class="nav-link <?php echo e(Request::is('register') ? 'active' :''); ?>" href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus fa-md"></i> &nbsp; <?php echo trans('nav.register'); ?></a>
                </li>
                <?php endif; ?>
                <li class="nav-item" id="login">
                    <a class="nav-link <?php echo e(Request::is('login') ? 'active' :''); ?>" href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in fa-md"> </i> &nbsp; <?php echo trans('nav.login'); ?></a>
                </li>

            <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> &nbsp; <?php echo trans('nav.dashboard'); ?></a>
                    </li>

                    
                </ul>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </nav>
</div>
