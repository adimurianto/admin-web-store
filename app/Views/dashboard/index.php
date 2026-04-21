<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3">Dashboard</h2>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                    <div>
                        <h3 class="text-white"><?= $total_items ?></h3>
                        <p class="mb-0">Total Items</p>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                    <div>
                        <h3 class="text-white"><?= $total_categories ?></h3>
                        <p class="mb-0">Total Categories</p>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-tags fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-white bg-warning shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                    <div>
                        <h3 class="text-white"><?= $total_users ?></h3>
                        <p class="mb-0">Total Admin Users</p>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
