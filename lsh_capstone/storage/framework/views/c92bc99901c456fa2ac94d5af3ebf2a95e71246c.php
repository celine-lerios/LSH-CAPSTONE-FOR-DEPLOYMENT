

<?php $__env->startSection('heading', 'Declined Bookings'); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Reference No.</th>
                                        <th>Payment Method</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $declined_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($row->transaction_id); ?></td>
                                        <td><?php echo e($row->payment_method); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $row->booking_date)->format('F d, Y')); ?></td>
                                        <td>₱<?php echo e(number_format($row->paid_amount, 2)); ?></td>
                                        <td class="pt_10 pb_10">
                                            <button type="button" class="btn btn-dark"><?php echo e($row->status); ?></button>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="<?php echo e(route('customer_invoice',$row->id)); ?>" class="btn btn-info mb-md-0 mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/customer/declined_orders.blade.php ENDPATH**/ ?>