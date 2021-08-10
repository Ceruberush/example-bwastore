

<?php $__env->startSection('title'); ?>
	Store Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Section Content -->
<div
	class="section-content section-dashboard-home"
	data-aos="fade-up"
>
	<div class="container-fluid">
		<div class="dashboard-heading">
				<h2 class="dashboard-title">User</h2>
				<p class="dashboard-subtitle">
						Edit "<?php echo e($item->name); ?>" User
				</p>
		</div>
		<div class="dashboard-content">
			<div class="row">
				<div class="col-12">
					<?php if($errors->any()): ?>
							<div class="alert alert-danger">
									<ul>
											<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li><?php echo e($error); ?></li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
							</div>
					<?php endif; ?>
					<form action="<?php echo e(route('user.update', $item->id)); ?>" method="post" enctype="multipart/form-data">
						<?php echo method_field('PUT'); ?>
						<?php echo csrf_field(); ?>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Nama User</label>
											<input type="text" class="form-control" name="name" value="<?php echo e($item->name); ?>" required />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Email User</label>
											<input type="text" class="form-control" name="email" value="<?php echo e($item->email); ?>" required />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Password User</label>
											<input type="text" class="form-control" name="password" />
											<small>Kosongkan jika tidak ingin mengganti password</small>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Roles</label>
											<select name="roles" required class="form-control">
													<option value="<?php echo e($item->roles); ?>" selected>Tidak diganti</option>
													<option value="ADMIN">Admin</option>
													<option value="USER">User</option>
												</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col text-right">
										<button
											type="submit"
											class="btn btn-success px-5"
										>
											Save Now
										</button>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bwastore-laravel\resources\views/pages/admin/user/edit.blade.php ENDPATH**/ ?>