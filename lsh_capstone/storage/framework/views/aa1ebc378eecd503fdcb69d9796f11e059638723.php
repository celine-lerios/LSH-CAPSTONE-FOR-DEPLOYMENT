<?php $__env->startSection('main_content'); ?>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo e($accommodation_type->name); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="home-rooms">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $accommodation_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="inner">
                    <div class="card accommodation-card mb-4">
                        <div class="photo card-img-top">
                            <img src="<?php echo e(asset('uploads/'.$item->photo)); ?>" alt="" class="img-fluid">
                        </div>
                        <div class="text card-body">
                            <h2><a href="<?php echo e(route('room',$item->id)); ?>"><?php echo e($item->name); ?></a></h2>
                            <div class="button">
                                <a href="<?php echo e(route('room',$item->id)); ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/front/accommodation_detail.blade.php ENDPATH**/ ?>