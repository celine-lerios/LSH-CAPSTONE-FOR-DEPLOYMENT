

<?php $__env->startSection('heading', 'All Accommodations'); ?>

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
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('uploads/'.$row->photo)); ?>" alt="slide_image" class="w_200">
                                        </td>
                                        <td><?php echo e($row->name); ?></td>
                                        <td class="pt_10 pb_10">
                                            
                                            <a href="<?php echo e(route('customer_review_add', $row->id)); ?>" class="btn btn-success mb-md-0 mb-1" data-toggle="tooltip" data-placement="top" title="Add Review"><i class="fa fa-star" aria-hidden="true"></i></a>
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

<?php echo $__env->make('customer.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/customer/accommodations.blade.php ENDPATH**/ ?>