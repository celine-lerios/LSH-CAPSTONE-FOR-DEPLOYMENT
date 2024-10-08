<?php $__env->startSection('main_content'); ?>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo e($global_page_data->video_gallery_heading); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <div class="row">
                <?php $__currentLoopData = $video_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card video-gallery-card">
                        <div class="photo-thumb card-img-top">
                            <img src="http://img.youtube.com/vi/<?php echo e($item->video_id); ?>/0.jpg" alt="">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="http://www.youtube.com/watch?v=<?php echo e($item->video_id); ?>" class="video-button"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                        <div class="photo-caption card-body">
                            <?php echo e($item->caption); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <div class="col-md-12">
                    <?php echo e($video_all->links()); ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/front/video_gallery.blade.php ENDPATH**/ ?>