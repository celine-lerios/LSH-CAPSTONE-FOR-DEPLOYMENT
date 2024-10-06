

<?php $__env->startSection('heading', 'Pending Rooms'); ?>


<?php $__env->startSection('main_content'); ?>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Room</th>
                                        <th>Accommodation Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; ?>
                                    <?php $__currentLoopData = $pending_rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $i++;
                                    $accommodation_info = \App\Models\Accommodation::where('id', $row->accommodation_id)->first();
                                    $accommodation_type_info = \App\Models\AccommodationType::where('id', $accommodation_info->accommodation_type_id)->first();
                                    ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><img src="<?php echo e(asset('uploads/'.$row->featured_photo)); ?>" alt="slide_image" class="w_200"></td>
                                        <td><?php echo e($row->room_name); ?></td>
                                        <td><?php echo e($accommodation_info->name); ?></td>                                        
                                        <?php if($accommodation_type_info->name != 'Hotel'): ?>
                                        <td>₱<?php echo e($row->price); ?>/month</td>
                                        <?php else: ?>
                                        <td>₱<?php echo e($row->price); ?>/night</td>
                                        <?php endif; ?>

                                        <td>
                                            <?php if($row->status === 'published'): ?>
                                            <button class="btn btn-success"><?php echo e($row->status); ?></button>
                                            <?php else: ?>
                                            <button class="btn btn-danger"><?php echo e($row->status); ?></button>
                                            <?php endif; ?>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <button class="btn btn-warning mb-1" data-toggle="modal" data-target="#exampleModal<?php echo e($i); ?>" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </button>
                                            <form action="<?php echo e(route('admin_publish_room', $row->id)); ?>" method="POST" style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" onClick="return confirm('Are you sure you want to publish this room?');" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Publish">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            <a href="<?php echo e(route('admin_room_gallery',$row->id)); ?>" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Gallery">
                                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin_room_edit',$row->id)); ?>" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <div class="modal fade" id="exampleModal<?php echo e($i); ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Photo</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <img src="<?php echo e(asset('uploads/'.$row->featured_photo)); ?>" alt="" class="w_200">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4"><label class="form-label">Name</label></div>
                                                            <div class="col-md-8"><?php echo e($row->room_name); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Description</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo $row->description; ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <?php if($accommodation_type_info->name != 'Hotel'): ?>
                                                                <label class="form-label">Price (per month)</label>
                                                                <?php else: ?>
                                                                <label class="form-label">Price (per night)</label>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="col-md-8">₱<?php echo e($row->price); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Rooms</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo e($row->total_rooms); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Amenities</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <?php
                                                                    $arr = explode(',', $row->amenities);
                                                                    for($j=0; $j<count($arr); $j++) {
                                                                        $temp_row = \App\Models\Amenity::where('id', $arr[$j])->first();
                                                                        echo $temp_row->name .'<br>';
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Room Size</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo e($row->size); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Beds</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo e($row->total_beds); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Bathrooms</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo e($row->total_bathrooms); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Balconies</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo e($row->total_balconies); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Total Guests</label>
                                                            </div>
                                                            <div class="col-md-8"><?php echo e($row->total_guests); ?></div>
                                                        </div>
                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Video</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="iframe-container-1">
                                                                    <iframe  width="560" height="315" src="https://www.youtube.com/embed/<?php echo e($row->video_id); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/pending_room.blade.php ENDPATH**/ ?>