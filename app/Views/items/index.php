<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3">Manajemen Item</h2>
    <?php if(in_array(session()->get('jabatan'), ['Admin', 'Gudang'])): ?>
        <a href="<?= base_url('/items/new') ?>" class="btn btn-primary"><i class="bi bi-plus"></i> New Item</a>
    <?php endif; ?>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama Item</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Last Edited</th>
                        <?php if(in_array(session()->get('jabatan'), ['Admin', 'Gudang'])): ?>
                        <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $row): ?>
                    <tr>
                        <td>
                            <?php if(!empty($row['foto'])): ?>
                                <img src="<?= base_url('uploads/items/'.$row['foto']) ?>" alt="Foto" width="50" height="50" class="object-fit-cover rounded">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong><?= esc($row['nama_item']) ?></strong><br>
                            <small class="text-muted"><?= esc($row['deskripsi_item']) ?></small>
                        </td>
                        <td><?= esc($row['nama_kategori'] ?? '-') ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td>
                            <?php if(!empty($row['last_edited'])): ?>
                                <?= date('d/m/Y H:i:s', strtotime($row['last_edited'])) ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <?php if(in_array(session()->get('jabatan'), ['Admin', 'Gudang'])): ?>
                        <td>
                            <a href="<?= base_url('/items/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($items)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data item.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
