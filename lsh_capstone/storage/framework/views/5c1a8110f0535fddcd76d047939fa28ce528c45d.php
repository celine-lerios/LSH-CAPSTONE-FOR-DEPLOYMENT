

<?php $__env->startSection('heading', 'Reviews'); ?>

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
                                        <th>Customer's Name</th>
                                        <th>Rate</th>
                                        <th>Heading</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                    $customer = \App\Models\Customer::where('id', $row->customer_id)->first();
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($customer->name); ?></td>
                                        <td>
                                            <?php switch($row->rate):
                                                case (1): ?>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <?php break; ?>

                                                <?php case (2): ?>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <?php break; ?>

                                                <?php case (3): ?>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <?php break; ?>

                                                <?php case (4): ?>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                    <?php break; ?>

                                                <?php case (5): ?>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                    <?php break; ?>

                                                <?php default: ?>
                                                    <span class="text-muted">Unknown</span>
                                            <?php endswitch; ?>
                                        </td>
                                        <td><?php echo e($row->review_heading); ?></td>
                                        <td class="pt_10 pb_10">
                                            <button class="btn btn-info mb-1" data-toggle="modal" data-target="#exampleModal<?php echo e($i); ?>" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            </button>
                                            <a href="<?php echo e(route('accommodation_review_delete', $row->id)); ?>" class="btn btn-danger mb-1" onClick="return confirm('Are you sure you want to delete this review?');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                                            <label class="form-label">Customer's Name</label>
                                                        </div>
                                                        <div class="col-md-8"><?php echo e($customer->name); ?></div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Rate</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php switch($row->rate):
                                                                case (1): ?>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <?php break; ?>

                                                                <?php case (2): ?>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <?php break; ?>

                                                                <?php case (3): ?>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <?php break; ?>

                                                                <?php case (4): ?>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star-o text-warning" aria-hidden="true"></i>
                                                                    <?php break; ?>

                                                                <?php case (5): ?>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                                                    <?php break; ?>

                                                                <?php default: ?>
                                                                    <span class="text-muted">Unknown</span>
                                                            <?php endswitch; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Review Heading</label>
                                                        </div>
                                                        <div class="col-md-8"><?php echo e($row->review_heading); ?></div>
                                                    </div>
                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                        <div class="col-md-4">
                                                            <label class="form-label">Review Description</label>
                                                        </div>
                                                        <div class="col-md-8"><?php echo e($row->review_description); ?></div>
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

<?php echo $__env->make('accommodation.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/accommodation/review.blade.php ENDPATH**/ ?>