<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="<?php echo e(asset('uploads/lsh_favicon_admin.svg')); ?>">

    <title>Admin Forgot Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    <?php echo $__env->make('admin.layout.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box forgot-password-card">
                            <div class="card-header card-header-auth">
                                <div class="text-center">
                                    <img src="<?php echo e(asset('uploads/logo.png')); ?>" alt="" class="logo">
                                </div>
                                <h4 class="text-center mt-3">Admin Forgot Password</h4>
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="<?php echo e(route('admin_forget_password_submit')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if(session()->get('error')): ?>
                                        <div class="alert alert-danger"><?php echo e(session()->get('error')); ?></div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> email-input" name="email" placeholder="Email Address" value="" autofocus>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="<?php echo e(route('admin_login')); ?>">
                                                Back to login page
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php echo $__env->make('admin.layout.scripts_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/forget_password.blade.php ENDPATH**/ ?>