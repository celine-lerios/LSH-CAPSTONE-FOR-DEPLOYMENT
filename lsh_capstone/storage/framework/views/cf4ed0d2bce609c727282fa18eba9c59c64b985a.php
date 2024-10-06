<?php $__env->startSection('heading', 'Edit Accommodation'); ?>

<?php $__env->startSection('right_top_button'); ?>
<a href="<?php echo e(route('admin_accommodation_view', $accommodation_type_data->id)); ?>" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin_accommodation_update',$accommodation_data->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="<?php echo e(asset('uploads/'.$accommodation_data->photo)); ?>" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo</label>
                                    <div>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="name" class="form-control" name="name" value="<?php echo e($accommodation_data->name); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Address *</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo e($accommodation_data->address); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" value="<?php echo e($accommodation_data->contact_number); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Contact Email</label>
                                    <input type="text" class="form-control" name="contact_email" value="<?php echo e($accommodation_data->contact_email); ?>">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Map Iframe Code</label>
                                    <textarea name="map" class="form-control h_100" id="" cols="30" rows="10"><?php echo e($accommodation_data->map); ?></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/accommodation_edit.blade.php ENDPATH**/ ?>