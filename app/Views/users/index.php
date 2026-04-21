<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3">Users Admin</h2>
    <a href="<?= base_url('/users/new') ?>" class="btn btn-primary"><i class="bi bi-plus"></i> New User</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $row): ?>
                    <tr>
                        <td><?= esc($row['nama']) ?></td>
                        <td><?= esc($row['username']) ?></td>
                        <td><?= esc($row['email']) ?></td>
                        <td>
                            <?php 
                                $badge = 'bg-secondary';
                                if($row['jabatan'] == 'Admin') $badge = 'bg-primary';
                                else if($row['jabatan'] == 'Gudang') $badge = 'bg-warning text-dark';
                            ?>
                            <span class="badge <?= $badge ?>"><?= esc($row['jabatan']) ?></span>
                        </td>
                        <td>
                            <a href="<?= base_url('/users/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($users)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data user.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
