<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3"><?= isset($category) ? 'Edit Kategori' : 'New Kategori' ?></h2>
    <a href="<?= base_url('/categories') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php $action = isset($category) ? base_url('/categories/update/'.$category['id']) : base_url('/categories/create'); ?>
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="<?= isset($category) ? esc($category['nama_kategori']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Parent Kategori</label>
                <select name="parent_id" class="form-select">
                    <option value="">-- Pilih Jika Sebagai Subkategori --</option>
                    <?php foreach($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (isset($category) && $category['parent_id'] == $cat['id']) ? 'selected' : '' ?>>
                            <?= esc($cat['nama_kategori']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Foto</label>
                <input type="file" name="foto" class="form-control" id="imgInp" accept="image/*">
                
                <div class="mt-3">
                    <?php if(isset($category) && !empty($category['foto'])): ?>
                        <img id="imgPreview" src="<?= base_url('uploads/categories/'.$category['foto']) ?>" alt="Preview" width="150" class="img-thumbnail">
                    <?php else: ?>
                        <img id="imgPreview" src="#" alt="Preview" width="150" class="img-thumbnail" style="display:none;">
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Live preview image
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
            imgPreview.style.display = 'block';
        }
    }
</script>
<?= $this->endSection() ?>
