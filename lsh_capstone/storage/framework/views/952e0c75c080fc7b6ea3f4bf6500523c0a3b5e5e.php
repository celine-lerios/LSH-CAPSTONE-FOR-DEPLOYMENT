<?php $__env->startSection('main_content'); ?>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo e($accommodation->name); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12">
            <img src="<?php echo e(asset('uploads/'.$accommodation->photo)); ?>" alt="" class="w-100 accommodation-image-detail">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-start">
            <div>
                <h3 class="fw-bold mb-4">Contact Information</h3>
                <p><span class="fw-bold">Name:</span> <?php echo e($accommodation->name); ?></p>
                <p><span class="fw-bold">Contact Number:</span> <?php echo e($accommodation->contact_number); ?></p>
                <p><span class="fw-bold">Contact Email:</span> <?php echo e($accommodation->contact_email); ?></p>
                <p><span class="fw-bold">Address:</span> <?php echo e($accommodation->address); ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="map">
                <?php echo $accommodation->map; ?>

            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center fw-bold">
        AVAILABLE ROOMS
    </h2>
</div>

<?php if($room_count > 0): ?>
<div class="home-rooms">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $room_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="inner">
                    <div class="card room-card mb-4">
                        <div class="photo card-img-top">
                            <img src="<?php echo e(asset('uploads/'.$item->featured_photo)); ?>" alt="" class="img-fluid">
                        </div>
                        <div class="text card-body">
                            <h2><a href="<?php echo e(route('room_detail',$item->id)); ?>"><?php echo e($item->room_name); ?></a></h2>
                            <div class="price">
                                <?php if($accommodation_type->name !== 'Hotel'): ?>
                                ₱<?php echo e(number_format($item->price, 2)); ?>/month
                                <?php else: ?>
                                ₱<?php echo e(number_format($item->price, 2)); ?>/night
                                <?php endif; ?>
    
                            </div>
                            <div class="button">
                                <a href="<?php echo e(route('room_detail',$item->id)); ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> See Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-12">
                <?php echo e($room_all->links()); ?>

            </div>
        </div>
    </div>
    
    

    
</div> 
<?php else: ?> 
<div class="container">
    <p class="text-danger text-center mb-4">No rooms were available as of now!</p>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/front/room.blade.php ENDPATH**/ ?>