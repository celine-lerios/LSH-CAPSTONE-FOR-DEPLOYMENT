

<?php $__env->startSection('main_content'); ?>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo e($global_page_data->signup_heading); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="<?php echo e(route('accommodation_register_submit')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="login-form">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="accommodationTypeSelect" class="form-label">Accommodation Type</label>
                                <select class="form-control <?php if($errors->has('accommodation_type_id')): ?> is-invalid <?php endif; ?>" id="accommodationTypeSelect" name="accommodation_type_id" value="<?php echo e(old('accommodation_type_id')); ?>">
                                <?php 
                                $accommodation_types = \App\Models\AccommodationType::get();
                                ?>
                                <option>-- Select an accommodation type --</option>
                                <?php $__currentLoopData = $accommodation_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accommodation_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($accommodation_type->id); ?>"><?php echo e($accommodation_type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Accommodation Name</label>
                            <input type="text" class="form-control" name="name">
                            <?php if($errors->has('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="contact_email">
                            <?php if($errors->has('email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('contact_email')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number">
                            <?php if($errors->has('contact_number')): ?>
                                <span class="text-danger"><?php echo e($errors->first('contact_number')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                            <?php if($errors->has('address')): ?>
                                <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            <?php if($errors->has('password')): ?>
                                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                            <?php if($errors->has('confirm_password')): ?>
                                <span class="text-danger"><?php echo e($errors->first('confirm_password')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Register</button>
                        </div>
                        <div class="mb-3">
                            Already have an account?
                            <a href="<?php echo e(route('customer_login')); ?>" class="primary-color"> Login instead.</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/accommodation/register.blade.php ENDPATH**/ ?>