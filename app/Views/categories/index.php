<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3">Manajemen Kategori</h2>
    <?php if(session()->get('jabatan') === 'Admin'): ?>
        <a href="<?= base_url('/categories/new') ?>" class="btn btn-primary"><i class="bi bi-plus"></i> New Kategori</a>
    <?php endif; ?>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama Kategori</th>
                        <th>Parent Kategori</th>
                        <th>Last Edited</th>
                        <?php if(session()->get('jabatan') === 'Admin'): ?>
                        <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $row): ?>
                    <tr>
                        <td>
                            <?php if(!empty($row['foto'])): ?>
                                <img src="<?= base_url('uploads/categories/'.$row['foto']) ?>" alt="Foto" width="50" height="50" class="object-fit-cover rounded">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($row['nama_kategori']) ?></td>
                        <td><?= $row['parent_nama'] ? esc($row['parent_nama']) : '-' ?></td>
                        <td>
                            <?php if(!empty($row['last_edited'])): ?>
                                <?= date('d/m/Y H:i:s', strtotime($row['last_edited'])) ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <?php if(session()->get('jabatan') === 'Admin'): ?>
                        <td>
                            <a href="<?= base_url('/categories/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($categories)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data kategori.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
