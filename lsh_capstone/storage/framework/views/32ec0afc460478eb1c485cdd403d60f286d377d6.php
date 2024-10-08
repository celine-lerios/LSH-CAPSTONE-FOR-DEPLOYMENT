<?php $__env->startSection('main_content'); ?>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo e($global_page_data->photo_gallery_heading); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <div class="row">
                <?php $__currentLoopData = $photo_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card photo-gallery-card mb-4">
                        <div class="photo-thumb card-img-top">
                            <img src="<?php echo e(asset('uploads/'.$item->photo)); ?>" alt="" class="photo-gallery-img">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="<?php echo e(asset('uploads/'.$item->photo)); ?>" class="magnific"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <div class="photo-caption card-body">
                            <?php echo e($item->caption); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

                <div class="col-md-12">
                    <?php echo e($photo_all->links()); ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/front/photo_gallery.blade.php ENDPATH**/ ?>