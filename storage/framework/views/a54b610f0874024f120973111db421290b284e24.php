

<?php $__env->startSection('title', $title); ?>

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
                Halaman untuk menambahkan kupon baru.
            </p>

            <div class="card">

                <form action="<?php echo e(route('coupon.update', $item->id)); ?>" method="post">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

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

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-pencil-alt"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="name" value="<?php echo e($item->name); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kode Kupon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control coupon"
                                        onkeyup="this.value = this.value.toUpperCase();" onkeypress="return event.charCode != 32"
                                        name="coupon_code" value="<?php echo e($item->coupon_code); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Expired</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar-times"></i>
                                            </div>
                                        </div>
                                        <input type="date" name="expired" class="form-control" value="<?php echo e($item->expired); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                        </div>
                                        <select class="form-control" name="status">
                                            <option value="0" <?php echo e($item->status == 0 ? 'selected' : ''); ?>>Tidak Aktif</option>
                                            <option value="1" <?php echo e($item->status == 1 ? 'selected' : ''); ?>>Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Discount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-percentage"></i>
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" name="discount"
                                        onKeyPress="if(this.value >= 100) return false;" value="<?php echo e($item->discount); ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="description" rows="10"><?php echo e($item->description); ?></textarea>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\PENGKODEAN\LaraPOS\resources\views/pages/coupon/edit.blade.php ENDPATH**/ ?>