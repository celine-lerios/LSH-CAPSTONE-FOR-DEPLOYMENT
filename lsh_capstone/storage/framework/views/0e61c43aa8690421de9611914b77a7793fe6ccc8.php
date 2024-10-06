<?php $__env->startSection('main_content'); ?>
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo e($single_room_data->room_name); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">

                <div class="room-detail-carousel owl-carousel">
                    <div class="item" style="background-image:url(<?php echo e(asset('uploads/'.$single_room_data->featured_photo)); ?>);">
                        <div class="bg"></div>
                    </div>
                    
                    <?php $__currentLoopData = $single_room_data->RoomPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" style="background-image:url(<?php echo e(asset('uploads/'.$item->photo)); ?>);">
                        <div class="bg"></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                
                <div class="description">
                    <?php echo $single_room_data->description; ?>

                </div>

                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Amenities</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $arr = explode(',',$single_room_data->amenities);
                        for($j=0;$j<count($arr);$j++) {
                            $temp_row = \App\Models\Amenity::where('id',$arr[$j])->first();
                            echo '<div class="col-lg-6 col-md-12">';
                            echo '<div class="item"><i class="fa fa-check-circle"></i> '.$temp_row->name.'</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>


                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td><?php echo e($single_room_data->size); ?></td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td><?php echo e($single_room_data->total_beds); ?></td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td><?php echo e($single_room_data->total_bathrooms); ?></td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td><?php echo e($single_room_data->total_balconies); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?php if($single_room_data->video_id != ''): ?>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo e($single_room_data->video_id); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <?php endif; ?>

                <div class="py-2 mb-4">
                    <h2 class="text-center mb-5">ROOM REVIEWS</h2>
                    <div class="container">
                        <div class="row">
                            <?php if($room_rates_count !== 0): ?>
                            <?php $__currentLoopData = $room_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                            $user = \App\Models\Customer::where('id', $item->customer_id)->first();
                            ?>
            
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="card testimonial-card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3 fw-bold"><?php echo e($item->review_heading); ?></h5>
                                        <div class="text-start mb-3">
                                            <?php switch($item->rate):
                                                case (1): ?>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <?php break; ?>
            
                                                <?php case (2): ?>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <?php break; ?>
            
                                                <?php case (3): ?>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <?php break; ?>
            
                                                <?php case (4): ?>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <?php break; ?>
            
                                                <?php case (5): ?>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning fs-5" aria-hidden="true"></i>
                                                    <?php break; ?>
            
                                                <?php default: ?>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning fs-5" aria-hidden="true"></i>
                                            <?php endswitch; ?>
                                        </div>
                                        <img src="<?php echo e(asset('/uploads/'.$user->photo)); ?>" alt="" class="w-25 img-fluid rounded-circle">
                                        <p class="card-text mt-3 fst-italic">" <?php echo e($item->review_description); ?> "</p>
                                        <h6 class="card-subtitle mb-2 text-muted">- <?php echo e($user->name); ?></h6>
                                        <p class="fs-6 fst-italic"><?php echo e($item->created_at->format('d F Y h:i A')); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <p class="text-center text-danger">No reviews at this time.</p>
                            <?php endif; ?>
            
                        </div>
                       
                        <?php if(Auth::guard('customer')->check()): ?>
                        <div class="room_add_rate_container container text-center mt-4">
                            <a href="<?php echo e(route('customer_room_review_add', $single_room_data->id)); ?>" class="btn btn-warning py-2 px-2 fw-bold add-review-btn"><i class="fa fa-plus"></i> Add Review</a>
                        </div>
                        <?php endif; ?>
                    </div> 
            
                </div>


            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">

                    <div class="widget">
                        <?php
                        $room = \App\Models\Room::where('id', $single_room_data->id)->first();
                        $accommodation = \App\Models\Accommodation::where('id', $room->accommodation_id)->first();
                        $accommodation_type = \App\Models\AccommodationType::where('id',$accommodation->accommodation_type_id)->first();
                        ?>
                        <?php if($accommodation_type->name != 'Hotel'): ?>
                        <h2>Room Price per Month</h2>
                        <?php else: ?> 
                        <h2>Room Price per Night</h2>
                        <?php endif; ?>
                        <div class="price">
                            ₱<?php echo e(number_format($single_room_data->price, 2)); ?>

                        </div>
                    </div>
                    <div class="widget">
                        <h2>Reserve This Room</h2>
                        <form action="<?php echo e(route('cart_submit')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="room_id" value="<?php echo e($single_room_data->id); ?>">
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout" value="<?php echo e(old('checkin_checkout')); ?>">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Adult</label>
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults" value="<?php echo e(old('adult')); ?>">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children" value="<?php echo e(old('children')); ?>">
                            </div>
                            <button type="submit" class="book-now">Add to Cart</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '<?php echo e($error); ?>',
            });
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/front/room_detail.blade.php ENDPATH**/ ?>