<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">

    <!--jquery-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript">
    $(function () {
        $("#bank").change(function () {
            if ($(this).val() == "other") {
                $("#banklist").show();
            } else {
                $("#banklist").hide();
            }
        });
    });
</script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name')); ?>

                    </a>

                    <!--Side bar button-->
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>
                        <div id="toggle-btn" onclick="toggleSidebar(this)">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <?php echo e(ucwords(Auth::user()->name)); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <?php if(Auth::user()->user_type == 'super admin'): ?>
                                       <li>
                                           <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
                                       </li> 
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(url('/profile')); ?>">Profile</a>
                                    </li>
                                    <li>
                                        <a href="/profile/<?php echo e(auth()->user()->id); ?>/edit">Update Profile</a>
                                    </li>
                                    <?php if(Auth::user()->user_type == 'admin'): ?>
                                        <li>
                                            <a href="<?php echo e(url('/adminRights')); ?>">
                                                Admin Rights
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('register')); ?>">
                                                Add new user
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <?php if(auth()->user()->user_type == 'super admin'): ?>
                                <?php echo $__env->make('sidebar.superAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php else: ?>
                                <?php switch(auth()->user()->department):
                                    case ('cc'): ?>
                                        <?php echo $__env->make('sidebar.cc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php break; ?>
                                    
                                    <?php case ('hr'): ?>
                                        <?php echo $__env->make('sidebar.hr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php break; ?>

                                    <?php case ('inventory'): ?>
                                        <?php echo $__env->make('sidebar.inventory', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php break; ?>

                                    <?php case ('noc'): ?>
                                        <?php echo $__env->make('sidebar.noc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php break; ?>

                                    <?php case ('sales'): ?>
                                        <?php echo $__env->make('sidebar.sales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php break; ?>
                                    
                                    <?php case ('voip'): ?>
                                        <?php echo $__env->make('sidebar.voip', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php break; ?>                
                                    <?php default: ?>
                                            Default case...
                                <?php endswitch; ?>
                                
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $__env->make('inc.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script type="text/javascript">
        function toggleSidebar(ref) {
          ref.classList.toggle('active');
          document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>
