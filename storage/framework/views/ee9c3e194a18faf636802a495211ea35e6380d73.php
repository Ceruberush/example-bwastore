

<?php $__env->startSection('title'); ?>
    Store Dashboard Transaction Detail
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">#<?php echo e($transaction->code); ?></h2>
                <p class="dashboard-subtitle">Transaction Details</p>
              </div>
              <div class="dashboard-content" id="transactionDetails">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img
                              src="<?php echo e(Storage::url($transaction->product->galleries->first()->photos ?? '')); ?>"
                              alt=""
                              class="w-100 mb-3"
                            />
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Customer Name</div>
                                <div class="product-subtitle"><?php echo e($transaction->transaction->user->name); ?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Product Name</div>
                                <div class="product-subtitle">
                                  <?php echo e($transaction->product->name); ?>

                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">
                                  <?php echo e($transaction->created_at); ?>

                                </div>
                                <div class="product-subtitle">
                                  12 Januari, 2020
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Payment Status</div>
                                <div class="product-subtitle text-danger">
                                  <?php echo e($transaction->transaction->transaction_status); ?>

                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Total Amount</div>
                                <div class="product-subtitle">$<?php echo e(number_format($transaction->transaction->total_price)); ?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Mobile</div>
                                <div class="product-subtitle">
                                  <?php echo e($transaction->transaction->user->phone_number); ?>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form action="<?php echo e(route('dashboard-transaction-update', $transaction->id)); ?>" method="POST" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                          <div class="row">
                          <div class="col-12 mt-4">
                            <h5>Shipping Informations</h5>
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="product-title">Address 1</div>
                                <div class="product-subtitle">
                                  <?php echo e($transaction->transaction->user->address_one); ?>

                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Address 2</div>
                                <div class="product-subtitle">
                                  <?php echo e($transaction->transaction->user->address_two); ?>

                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Province</div>
                                <div class="product-subtitle">
                                  <?php echo e(App\Models\Province::find($transaction->transaction->user->provinces_id)->name); ?>

                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">City</div>
                                <div class="product-subtitle">
                                  <?php echo e(App\Models\Regency::find($transaction->transaction->user->regencies_id)->name); ?>

                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Postal Code</div>
                                <div class="product-subtitle"><?php echo e($transaction->transaction->user->zip_code); ?></div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="product-title">Country</div>
                                <div class="product-subtitle"><?php echo e($transaction->transaction->user->country); ?></div>
                              </div>
                              <div class="col-12">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="product-title">Shipping Status</div>
                                    <select
                                      name="shipping_status"
                                      id="status"
                                      class="form-control"
                                      v-model="status"
                                    >
                                      <option value="PENDING">Pending</option>
                                      <option value="SHIPPING">Shipping</option>
                                      <option value="SUCCESS">Success</option>
                                    </select>
                                  </div>
                                  <template v-if="status == 'SHIPPING'">
                                    <div class="col-md-3">
                                      <div class="product-title">
                                        Input Resi
                                      </div>
                                      <input
                                        class="form-control"
                                        type="text"
                                        name="resi"
                                        id="openStoreTrue"
                                        v-model="resi"
                                      />
                                    </div>
                                    <div class="col-md-2">
                                      <button
                                        type="submit"
                                        class="btn btn-success btn-block mt-4"
                                      >
                                        Update Resi
                                      </button>
                                    </div>
                                  </template>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col-12 text-right">
                            <button
                                  type="submit"
                                  class="btn btn-success btn-lg mt-4"
                                >
                                  Save now
                            </button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "<?php echo e($transaction->shipping_status); ?>",
          resi: "<?php echo e($transaction->resi); ?>",
        },
      });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bwastore-laravel\resources\views/pages/dashboard-transactions-details.blade.php ENDPATH**/ ?>