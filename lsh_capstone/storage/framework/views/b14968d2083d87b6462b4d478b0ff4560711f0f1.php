<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand py-1">
            <a href="<?php echo e(route('customer_home')); ?>">
                <img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="" class="logo py-1">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(route('customer_home')); ?>"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="<?php echo e(Request::is('customer/home') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('customer_home')); ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
            </li>

            <li class="<?php echo e(Request::is('customer/order/view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('customer_order_view')); ?>"><i class="fa fa-list-alt"></i> <span>Completed Bookings</span></a></li>

            <li class="<?php echo e(Request::is('customer/pending-order/view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('customer_pending_order_view')); ?>"><i class="fa fa-clock-o"></i> <span>Pending Bookings</span></a></li>

            <li class="<?php echo e(Request::is('customer/declined-order/view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('customer_declined_order_view')); ?>"><i class="fa fa-times"></i> <span>Declined Bookings</span></a></li>

            

            <li class="<?php echo e(Request::is('customer/room/review/view') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('customer_room_review_view')); ?>"><i class="fa fa-star"></i> <span>My Room Reviews</span></a>
            </li>

            <li class="<?php echo e(Request::is('customer/edit-profile') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('customer_profile')); ?>"><i class="fa fa-user"></i> <span>Edit Profile</span></a>
            </li>

            <li>
                <a class="nav-link" href="<?php echo e(route('home')); ?>" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> <span>Visit Website</span></a>
            </li>
            
        </ul>
    </aside>
</div><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/customer/layout/sidebar.blade.php ENDPATH**/ ?>