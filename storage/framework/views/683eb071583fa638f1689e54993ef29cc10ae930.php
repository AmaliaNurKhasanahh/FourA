

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('addon-css'); ?>
<link rel="stylesheet" href="<?php echo e(url('assets/modules/izitoast/css/iziToast.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo e($title); ?></h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                <?php echo e($title); ?>

            </h2>
            <p class="section-lead">
                Transaksi yang sudah dilakukan.
            </p>

            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            <?php echo e($error); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
            <?php endif; ?>

            <div class="row">

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Informasi
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo e($data['user']); ?>" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo e($transactionCode); ?>" name="transaction_code" disabled>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="far fa-calendar-check"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo e(\Carbon\Carbon::create($data['date'])->format('d/m/Y')); ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card card-block d-flex" style="height: 311px">
                        <div class="card-header">
                            Rp.
                        </div>
                        <div class="card-body text-center align-items-center d-flex justify-content-center">
                            <h1 class="display-1 priceDisplay"><?php echo e(number_format($subTotal, 0,',',',')); ?></h1>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="card">
                <div class="card-header">
                    Sales
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="saleTable">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col"></th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Harga</th>
                                  <th scope="col">Qty</th>
                                  <th scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <th><?php echo e($index + 1); ?></th>
                                        <th>
                                            <img src="<?php echo e(Storage::disk('public')->exists($item->product->photo) ? Storage::url($item->product->photo) : url('assets/img/image_not_available.png')); ?>"
                                            alt="Foto Produk" class="img-fluid rounded mt-1 mb-1" height="10px" width="80px" />
                                        </th>
                                        <th><?php echo e($item->product->name); ?></th>
                                        <th>Rp. <?php echo e(number_format($item->product_price, 0,',',',')); ?></th>
                                        <th><?php echo e($item->quantity); ?></th>
                                        <th>Rp. <?php echo e(number_format($item->total_price, 0,',',',')); ?></th>
                                    </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Belum ada produk yang dibeli.
                                        </td>
                                    </tr>
                                  <?php endif; ?>
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="transaction_code" value="<?php echo e($transactionCode); ?>">
                            <div class="form-group">
                                <label>Kupon</label>
                                <input type="text" name="coupon_code" class="form-control"
                                onkeyup="this.value = this.value.toUpperCase();" onkeypress="return event.charCode != 32"
                                value="<?php echo e($data['couponCode']); ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Customer</label>
                                <select name="customer_id" class="custom-select" disabled>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>" <?php echo e($data['customerId'] == $customer->id ? 'selected' : ''); ?>>
                                            <?php echo e($customer->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="hidden" name="coupon_code" value="<?php echo e(session('coupon_code')); ?>" />
                                    <div class="form-group">
                                        <label>Diskon</label>
                                        <div class="input-group mb-2">
                                            <input type="text" name="discount" class="form-control" value="<?php echo e($data['discount']); ?>" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Potongan Diskon</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="discount_price" class="form-control currency" value="0" disabled/>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Sub Total</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="sub_total" class="form-control currency" value="<?php echo e($subTotal); ?>" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Grand Total</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="grand_total" class="form-control currency" value="<?php echo e($subTotal); ?>" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Dibayar</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="paid" class="form-control currency" value="<?php echo e($data['paid']); ?>" disabled/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Kembalian</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="change" class="form-control currency" value="<?php echo e($data['change']); ?>" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('addon-script'); ?>
<script src="<?php echo e(url('assets/modules/sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/modules/izitoast/js/iziToast.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/modules/cleave-js/dist/cleave.min.js')); ?>"></script>
<script src="<?php echo e(url('js/my_cleave.js')); ?>"></script>
<script src="<?php echo e(url('js/my_sweetalert.js')); ?>"></script>
<script>
$( document ).ready(function() {

    function currencyFormat(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    let discount = $('[name="discount"]').val();
    let discountPrice = $('[name="discount_price"]');
    let subTotal = $('[name="sub_total"]').val().replace(/,/g, '');
    let grandTotal = $('[name="grand_total"]');
    let paid = $('[name="paid"]');
    let change = $('[name="change"]');
    let priceDisplay = $('.priceDisplay');

    let sumDiscountPrice = subTotal * discount/100;

    discountPrice.val(currencyFormat(sumDiscountPrice));
    grandTotal.val(currencyFormat(subTotal - sumDiscountPrice));
    priceDisplay.html(currencyFormat(subTotal - sumDiscountPrice));

});    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PENGKODEAN\LaraPOS\resources\views/pages/transaction/show.blade.php ENDPATH**/ ?>