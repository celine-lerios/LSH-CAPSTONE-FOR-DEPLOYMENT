<?php $__env->startSection('heading', 'Edit Sign Up Page'); ?>

<?php $__env->startSection('main_content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin_signup_page_update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="signup_heading" value="<?php echo e($signup_data->signup_heading); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select name="signup_status" class="form-control">
                                        <option value="1" <?php if($signup_data->signup_status === 1): ?> selected <?php endif; ?>>Show</option>
                                        <option value="0" <?php if($signup_data->signup_status === 0): ?> selected <?php endif; ?>>Hide</option>
                                    </select>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/signup_page.blade.php ENDPATH**/ ?>