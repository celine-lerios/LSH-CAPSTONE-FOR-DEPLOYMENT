<?php $__env->startSection('heading', 'Accommodation Dashboard'); ?>

<?php $__env->startSection('main_content'); ?>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="<?php echo e(route('accommodation_order_view')); ?>">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-list-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>All Bookings</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($total_orders); ?>

                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="<?php echo e(route('accommodation_completed_order_view')); ?>">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-check-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Completed Bookings</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($total_completed_orders); ?>

                       
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="<?php echo e(route('accommodation_pending_order_view')); ?>">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Bookings</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($total_pending_orders); ?>

                    </div>
                </div>
            </div>
        </a>
 </div>
    
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="<?php echo e(route('accommodation_declined_order_view')); ?>">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Declined Bookings</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($total_declined_orders); ?>

                    </div>
                </div>
            </div>
        </a>
        
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <a href="<?php echo e(route('accommodation_room_view')); ?>">
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-bed"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Rooms</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($total_rooms); ?>

                    </div>
                </div>
            </div>
        </a>
        
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        
            <div class="card card-statistic-1">
                <div class="card-icon bg-website">
                    <i class="fa fa-star"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Reviews
                    </div>
                    <div class="card-body">
                        <?php echo e($total_reviews); ?>

                       </div>
                </div> 
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <section class="section">
            <div class="section-header">
                <h1>Recent Bookings</h1>
            </div>
        </section>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Booking No</th>
                                            <th>Payment Method</th>
                                            <th>Checkin & Checkout Date</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recent_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $check_date = \App\Models\OrderDetail::where('order_no', $row->order_no)->first();
                                        ?>

                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($row->order_no); ?></td>
                                            <td><?php echo e($row->payment_method); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $check_date->checkin_date)->format('F d, Y')); ?> 3:00PM - <?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $check_date->checkout_date)->format('F d, Y')); ?> 11:00AM</td>
                                            <td>₱<?php echo e(number_format($row->paid_amount, 2)); ?></td>
                                            <td class="pt_10 pb_10">
                                                <?php if($row->status === 'Completed'): ?>
                                                <button class="btn btn-success"><?php echo e($row->status); ?></button>
                                                <?php elseif($row->status === 'Pending'): ?>
                                                <button class="btn btn-danger"><?php echo e($row->status); ?></button>
                                                <?php else: ?>
                                                <button class="btn btn-dark"><?php echo e($row->status); ?></button>
                                                <?php endif; ?>
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="<?php echo e(route('accommodation_invoice',$row->id)); ?>" class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accommodation.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/accommodation/home.blade.php ENDPATH**/ ?>