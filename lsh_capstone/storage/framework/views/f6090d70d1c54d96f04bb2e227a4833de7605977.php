

<?php $__env->startSection('heading', 'Add Review for '.$room_info->room_name . ' ('.$accommodation_info->name.')'); ?>

<?php $__env->startSection('right_top_button'); ?>
<a href="<?php echo e(route('customer_room_review_view')); ?>" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('customer_room_review_submit', $room_info->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="room_id" value="<?php echo e($room_info->id); ?>">
                                <div class="mb-4">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" class="form-control" name="review_heading" value="<?php echo e(old('review_heading')); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Rate *</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rate" value="1">
                                        <label class="form-check-label" for="star1">
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rate" value="2">
                                        <label class="form-check-label" for="star2">
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rate" value="3">
                                        <label class="form-check-label" for="star3">
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rate" value="4">
                                        <label class="form-check-label" for="star4">
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rate" value="5">
                                        <label class="form-check-label" for="star5">
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="review_description" class="form-control h_100"  cols="30" rows="10"><?php echo e(old('review_description')); ?></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
<?php echo $__env->make('customer.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/customer/room_review_add.blade.php ENDPATH**/ ?>