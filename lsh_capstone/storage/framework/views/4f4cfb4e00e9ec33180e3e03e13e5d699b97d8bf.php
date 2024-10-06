<?php $__env->startSection('heading', $accommodation_type->name); ?>

<?php $__env->startSection('right_top_button'); ?>
<a href="<?php echo e(route('admin_accommodation_add', $accommodation_type->id)); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
<?php $__env->stopSection(); ?>

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
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($row->name); ?></td>
                                        <td><img src="<?php echo e(asset('uploads/'.$row->photo)); ?>" alt="accommodation_type_image" class="w_200"></td>
                                        <td><?php echo e($row->address); ?></td>
                                        <td class="pt_10 pb_10">
                                            <a href="<?php echo e(route('admin_accommodation_edit',$row->id)); ?>" class="btn btn-primary mb-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin_room_view',$row->id)); ?>" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="See Rooms">
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin_accommodation_delete',$row->id)); ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete <?php echo e($row->name); ?>?');" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/accommodation_view.blade.php ENDPATH**/ ?>