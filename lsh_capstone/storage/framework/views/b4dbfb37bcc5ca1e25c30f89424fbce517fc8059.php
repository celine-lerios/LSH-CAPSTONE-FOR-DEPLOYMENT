<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand py-1">
            <a href="<?php echo e(route('accommodation_home')); ?>">
                <img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="" class="logo py-1">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(route('accommodation_home')); ?>"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="<?php echo e(Request::is('accommodation/home') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('accommodation_home')); ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
            </li>

            <li class="<?php echo e(Request::is('accommodation/order-view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('accommodation_order_view')); ?>"><i class="fa fa-list-alt"></i> <span>All Bookings</span></a></li>

            <li class="<?php echo e(Request::is('accommodation/completed-order-view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('accommodation_completed_order_view')); ?>"><i class="fa fa-check"></i> <span>Completed Bookings</span></a></li>

            <li class="<?php echo e(Request::is('accommodation/pending-order-view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('accommodation_pending_order_view')); ?>"><i class="fa fa-clock-o"></i> <span>Pending Bookings</span></a></li>

            <li class="<?php echo e(Request::is('accommodation/declined-order-view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('accommodation_declined_order_view')); ?>"><i class="fa fa-times"></i> <span>Declined Bookings</span></a></li>

             

            <li class="<?php echo e(Request::is('accommodation/payment-info') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('accommodation_payment_info')); ?>"><i class="fa fa-money"></i> <span>Payment Information</span></a>
            </li>

            <li class="<?php echo e(Request::is('accommodation/room-view') ? 'active' : ''); ?>"><a class="nav-link" href="<?php echo e(route('accommodation_room_view')); ?>"><i class="fa fa-bed"></i> <span>Rooms</span></a></li>

            <li class="<?php echo e(Request::is('accommodation/edit-profile') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('accommodation_profile')); ?>"><i class="fa fa-user"></i> <span>Edit Profile</span></a>
            </li>

            <li>
                <a class="nav-link" href="<?php echo e(route('home')); ?>" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> <span>Visit Website</span></a>
            </li>
            
        </ul>
    </aside>
</div><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/accommodation/layout/sidebar.blade.php ENDPATH**/ ?>