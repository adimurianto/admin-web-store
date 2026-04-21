<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Store' ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- jQuery for conveniences -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: #c2c7d0;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background-color: #495057;
            border-radius: 5px;
        }
        .content {
            background-color: #f4f6f9;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-3">
                <h3 class="text-center mb-4 border-bottom pb-2">AdminStore</h3>
                
                <div class="mb-3 text-center">
                    <small>Welcome, <?= session()->get('nama') ?></small><br>
                    <span class="badge bg-secondary"><?= session()->get('jabatan') ?></span>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item mb-1">
                        <a href="<?= base_url('/dashboard') ?>" class="nav-link <?= (current_url(true)->getSegment(1) == 'dashboard') ? 'active' : '' ?>">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="<?= base_url('/items') ?>" class="nav-link <?= (current_url(true)->getSegment(1) == 'items') ? 'active' : '' ?>">
                            <i class="bi bi-box-seam me-2"></i> Manajemen Item
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a href="<?= base_url('/categories') ?>" class="nav-link <?= (current_url(true)->getSegment(1) == 'categories') ? 'active' : '' ?>">
                            <i class="bi bi-tags me-2"></i> Kategori Item
                        </a>
                    </li>
                    
                    <?php if(session()->get('jabatan') === 'Admin'): ?>
                    <li class="nav-item mb-1">
                        <a href="<?= base_url('/users') ?>" class="nav-link <?= (current_url(true)->getSegment(1) == 'users') ? 'active' : '' ?>">
                            <i class="bi bi-people me-2"></i> Users Admin
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <li class="nav-item mt-4">
                        <a href="<?= base_url('/auth/logout') ?>" class="nav-link text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content p-4">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
