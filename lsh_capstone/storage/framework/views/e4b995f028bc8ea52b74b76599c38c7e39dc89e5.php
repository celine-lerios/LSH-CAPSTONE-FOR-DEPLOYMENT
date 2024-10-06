

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
                                        <th>Customer's Name</th>
                                        <th>Payment Method</th>
                                        <th>Selfie</th>
                                        <th>ID</th>
                                        <th>Booking Date</th>
                                        <th>Paid Amount</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $declined_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $customer_info = \App\Models\Customer::where('id', $row->customer_id)->first();
                                    ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($row->transaction_id); ?></td>
                                        <td><?php echo e($customer_info->name); ?></td>
                                        <td><?php echo e($row->payment_method); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('uploads/'.$customer_info->selfie)); ?>

                                            " alt="selfie" class="w_150">
                                        </td>
                                        <td>
                                            <img src="<?php echo e(asset('uploads/'.$customer_info->id_image)); ?>"
                                            alt="id" class="w_300 magnific"> 
                                        </td>
                                        <td><?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $row->booking_date)->format('F d, Y')); ?></td>
                                        <td>₱<?php echo e(number_format($row->paid_amount, 2)); ?></td>
                                        
                                        <td class="pt_10 pb_10">
                                            <a href="<?php echo e(route('accommodation_invoice',$row->id)); ?>" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </a>
                                            <form action="<?php echo e(route('accommodation_booking_confirm', $row->id)); ?>" method="POST" style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" onClick="return confirm('Are you sure you want to confirm this booking?');" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Confirm booking">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            
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

<?php echo $__env->make('accommodation.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/accommodation/declined_orders.blade.php ENDPATH**/ ?>