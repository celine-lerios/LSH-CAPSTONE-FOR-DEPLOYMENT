

<?php $__env->startSection('heading', $accommodation_info->name.' Bookings Report'); ?>

<?php $__env->startSection('main_content'); ?>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h4 class="text-center mb-4 mt-4"><?php echo e($accommodation_info->name); ?> Bookings Report</h4>
                <?php
                $receipt_date = time();
                ?>
                <div class="container row">
                    <div class="col-md-4 mt-4">
                    <strong>Invoice to:</strong><br>
                    <?php if($accommodation_info->photo!= ''): ?>
                    <img src="<?php echo e(asset ('uploads/'.$accommodation_info->photo)); ?>" alt="profile photo" class="w_50"><br>
                    <?php else: ?>
                    <img src="<?php echo e(asset('uploads/default.png')); ?>" alt="profile photo" class="w_50"><br>
                    <?php endif; ?>
                    <?php echo e($accommodation_info->name); ?> <br>
                    <?php echo e($accommodation_info->address); ?>, <br>
                    <?php echo e($accommodation_info->contact_email); ?>

                </div>
                <div class="col-md-4 mt-4">
                    <address>
                        <strong>Invoice from:</strong><br>
                        <img src="<?php echo e(asset ('uploads/logo.png')); ?>"  alt="" class="w_100"><br>
                        Tandang Sora St., Antonino,<br>
                        Labason,Zamboanga del Norte, 7117 <br>
                        contact labasonsafevahen@gmail.com <br>
                    </address>
                </div>
                <div class="col-md-4 mt-4">
                    <strong>Invoice Date:</strong>
                    <?php echo e(\Carbon\Carbon::createFromTimestamp($receipt_date)->format('F j, Y h:i A')); ?>

                </div>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <label for="min">Start Date:</label>
                            <input type="date" id="min" name="min">
                            <label for="max">End Date:</label>
                            <input type="date" id="max" name="max">
                        </div>
                    </div>

                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="reportDetailTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Booking No.</th>
                                    <th>Customer's Name</th>
                                    <th>Payment Method</th>
                                    <th>Booking Date</th>
                                    <th>Paid Amount</th>
                                    <th>Percentage (10%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $accommodation_transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $customer_info = \App\Models\Customer::where('id', $row->customer_id)->first();
                                ?>
                                 <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($row->order_no); ?></td>
                                    <td><?php echo e($customer_info->name); ?></td>
                                    <td><?php echo e($row->payment_method); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::createFromFormat('d/m/Y', $row->booking_date)->format('Y-m-d')); ?></td>
                                    <td>₱<?php echo e(number_format($row->paid_amount, 2)); ?></td>
                                    <td>₱<?php echo e(number_format($row->paid_amount * .1, 2)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" style="text-align:right"><?php echo e($accommodation_info->name); ?> Bookings Report</th>
                                    <th style="text-align:right">Total:</th>
                                    <th id="totalPaidAmount">₱0.00</th>
                                    <th id="totalPercentage">₱0.00</th>
                                </tr>
                                <tr id="invoiceRow" style="display: none;">
                                    <td colspan="7" style="text-align: right;">
                                        <a id="invoiceButton" href="javascript:window.print();" class="btn btn-primary">Generate Invoice</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
        // Custom filtering function which will search data in column five between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();
                var date = data[4]; // Use data for the Booking Date column (0-indexed)

                if (
                    (min === "" && max === "") ||
                    (min === "" && date <= max) ||
                    (min <= date && max === "") ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        // Initialize the DataTable
        var table = $('#reportDetailTable').DataTable();

        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').change(function() {
            table.draw();
        });
        // Function to calculate and update the totals
        function updateTotals() {
            var totalPaidAmount = 0;
            var totalPercentage = 0;
            var rowCount = 0;

            table.rows({ search: 'applied' }).every(function() {
                var data = this.data();
                var paidAmount = parseFloat(data[5].replace(/[^0-9.-]+/g, "")) || 0;
                var percentage = parseFloat(data[6].replace(/[^0-9.-]+/g, "")) || 0;

                totalPaidAmount += paidAmount;
                totalPercentage += percentage;
                rowCount++;
            });
            $('#totalPaidAmount').text('₱' + totalPaidAmount.toFixed(2));
            $('#totalPercentage').text('₱' + totalPercentage.toFixed(2));

            // Show or hide the invoice button based on the results
            if (totalPaidAmount > 0 && rowCount > 0) {
                $('#invoiceRow').show();
            } else {
                $('#invoiceRow').hide();
            }
        }

        // Call updateTotals whenever the table is drawn
        table.on('draw', function() {
            updateTotals();
        });

        // Initial call to set totals
        updateTotals();
    });
</script>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LSH_Version_2-main\lsh_capstone\resources\views/admin/report_detail.blade.php ENDPATH**/ ?>