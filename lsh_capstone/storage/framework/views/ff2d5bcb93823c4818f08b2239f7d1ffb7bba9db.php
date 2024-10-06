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
                <form action="<?php echo e(route('customer_signup_submit')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name">
                            <?php if($errors->has('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email">
                            <?php if($errors->has('email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Identification Card Type</label>
                            <select class="form-select" name="id_type" aria-label="Default select example" <?php if($errors->has('id_type')): ?> is-invalid <?php endif; ?>" name="id_type" value="<?php echo e(old('id_type')); ?>">
                               <option selected>-- Choose your type of ID --</option>
                               <option value="National ID">National ID</option>
                               <option value="Voter's ID">Voter's ID</option>
                               <option value="School ID">School ID</option>
                               <option value="Driver's License">Driver's License</option>
                               <option value="PhilHealth ID">PhilHealth ID</option>
                               <option value="Passport">Passport</option>
                            </select>
                              <?php if($errors->has('id_type')): ?>
                                <span class="text-danger"><?php echo e($errors->first('id_type')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">ID Image</label>
                            <input type="file" class="form-control form-input <?php if($errors->has('id_image')): ?> is-invalid <?php endif; ?>" name="id_image" value="<?php echo e(old('id_image')); ?>">
                            <?php if($errors->has('id_image')): ?>
                                <span class="text-danger"><?php echo e($errors->first('id_image')); ?></span>
                            <?php endif; ?>
                        </div>
                       
                        <div class="mb-3">
                            <label for="" class="form-label">Selfie Image</label>
                            <input type="file" class="form-control form-input <?php if($errors->has('selfie')): ?> is-invalid <?php endif; ?>" name="selfie" value="<?php echo e(old('selfie')); ?>">
                            <?php if($errors->has('selfie')): ?>
                                <span class="text-danger"><?php echo e($errors->first('selfie')); ?></span>
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
                            <button type="submit" class="btn btn-primary bg-website">Submit</button>
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
<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/front/signup.blade.php ENDPATH**/ ?>