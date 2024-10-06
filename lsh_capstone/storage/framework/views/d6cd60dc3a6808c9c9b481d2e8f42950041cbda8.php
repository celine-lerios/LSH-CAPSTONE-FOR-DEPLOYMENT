<div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fa fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                    <?php if(Auth::guard('accommodation')->user()->photo == ''): ?>
                    <img alt="image" src="<?php echo e(asset('uploads/default.png')); ?>" class="rounded-circle mr-1">
                    <?php else: ?>
                    <img alt="image" src="<?php echo e(asset('uploads/'.Auth::guard('accommodation')->user()->photo)); ?>" class="rounded-circle mr-1">
                    <?php endif; ?>
                    
                    <div class="d-sm-none d-lg-inline-block"><?php echo e(Auth::guard('accommodation')->user()->name); ?></div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo e(route('customer_profile')); ?>" class="dropdown-item has-icon">
                            <i class="fa fa-user"></i> Edit Profile
                        </a>
                        <a href="<?php echo e(route('accommodation_logout')); ?>" class="dropdown-item has-icon text-danger">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/accommodation/layout/nav.blade.php ENDPATH**/ ?>