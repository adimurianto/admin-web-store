<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3"><?= isset($user) ? 'Edit User' : 'New User' ?></h2>
    <a href="<?= base_url('/users') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php $action = isset($user) ? base_url('/users/update/'.$user['id']) : base_url('/users/create'); ?>
        <form action="<?= $action ?>" method="post">
            
            <div class="mb-3">
                <label class="form-label">Nama User</label>
                <input type="text" name="nama" class="form-control" value="<?= isset($user) ? esc($user['nama']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <select name="jabatan" class="form-select" required>
                    <option value="Admin" <?= (isset($user) && $user['jabatan'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                    <option value="Gudang" <?= (isset($user) && $user['jabatan'] == 'Gudang') ? 'selected' : '' ?>>Gudang</option>
                    <option value="Guest" <?= (isset($user) && $user['jabatan'] == 'Guest') ? 'selected' : '' ?>>Guest</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= isset($user) ? esc($user['email']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?= isset($user) ? esc($user['username']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" <?= !isset($user) ? 'required' : '' ?>>
                <?php if(isset($user)): ?>
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
