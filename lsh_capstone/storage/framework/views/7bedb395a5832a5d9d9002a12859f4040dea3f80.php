

<?php $__env->startSection('heading', 'Approved Accommodations'); ?>

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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $approved_accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($row->name); ?></td>
                                        <td><img src="<?php echo e(asset('uploads/'.$row->photo)); ?>" alt="accommodation_type_image" class="w_200"></td>
                                        <td><?php echo e($row->address); ?></td>
                                        <td>
                                            <button class="btn btn-success"><?php echo e($row->status); ?></button>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="<?php echo e(route('admin_room_view',$row->id)); ?>" class="btn btn-success mb-1" data-toggle="tooltip" data-placement="top" title="See Rooms">
                                                <i class="fa fa-bed" aria-hidden="true"></i>
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

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/approved_accommodation.blade.php ENDPATH**/ ?>