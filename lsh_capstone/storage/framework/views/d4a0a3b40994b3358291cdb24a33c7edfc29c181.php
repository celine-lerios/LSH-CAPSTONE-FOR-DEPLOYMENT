<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <?php if(Auth::guard('customer')->user()->photo == ''): ?>
    <link rel="icon" type="image/png" href="<?php echo e(asset('uploads/default.png')); ?>">
    <?php else: ?>
    <link rel="icon" type="image/png" href="<?php echo e(asset('uploads/'.Auth::guard('customer')->user()->photo)); ?>">
    <?php endif; ?>
    <title><?php echo e(Auth::guard('customer')->user()->name); ?> - Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <?php echo $__env->make('customer.layout.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('customer.layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        
        <?php echo $__env->make('customer.layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('customer.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1><?php echo $__env->yieldContent('heading'); ?></h1>
                    <div class="ml-auto">
                        <?php echo $__env->yieldContent('right_top_button'); ?>
                    </div>
                </div>

                <?php echo $__env->yieldContent('main_content'); ?>


            </section>
        </div>

    </div>
</div>

<?php echo $__env->make('customer.layout.scripts_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            iziToast.error({
                title: '<?php echo e(session()->get('error')); ?>',
                position: 'topRight',
                message: '<?php echo e($error); ?>',
            });
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(session()->get('error')): ?>
<script>
    iziToast.error({
        title: '',
        position: 'topRight',
        message: '<?php echo e(session()->get('error')); ?>',
    });
</script>
<?php endif; ?>
<?php if(session()->get('success')): ?>
<script>
    iziToast.success({
        title: '',
        position: 'topRight',
        message: '<?php echo e(session()->get('success')); ?>',
    });
</script>
<?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/customer/layout/app.blade.php ENDPATH**/ ?>