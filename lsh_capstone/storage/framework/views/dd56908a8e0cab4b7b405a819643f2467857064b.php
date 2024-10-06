

<?php $__env->startSection('heading', 'Payment Information'); ?>

<?php $__env->startSection('main_content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin_payment_update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Gcash Qr</label>
                                    <div>
                                        <img src="<?php echo e(asset('uploads/'.$payment_info->gcash_qr)); ?>" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Gcash Qr</label>
                                    <div>
                                        <input type="file" name="gcash_qr">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Gcash Recepient Name</label>
                                    <input type="text" class="form-control" name="gcash_name" value="<?php echo e($payment_info->gcash_name); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Gcash Recepient Number</label>
                                    <input type="text" class="form-control" name="gcash_number" value="<?php echo e($payment_info->gcash_number); ?>">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Existing Maya Qr</label>
                                    <div>
                                        <img src="<?php echo e(asset('uploads/'.$payment_info->maya_qr)); ?>" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Maya Qr</label>
                                    <div>
                                        <input type="file" name="maya_qr">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Maya Recepient Name</label>
                                    <input type="text" class="form-control" name="maya_name" value="<?php echo e($payment_info->maya_name); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Maya Recepient Number</label>
                                    <input type="text" class="form-control" name="maya_number" value="<?php echo e($payment_info->maya_number); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/payment_info.blade.php ENDPATH**/ ?>