<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Web Store</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-box {
            width: 400px;
            margin: 7% auto;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="card card-outline card-primary shadow">
            <div class="card-header text-center pt-4">
                <a href="#" class="h1 text-decoration-none text-dark"><b>Admin</b>Store</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg text-center text-muted mb-4">Sign in to start your session</p>

                <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/auth/login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
