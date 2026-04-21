<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3"><?= isset($item) ? 'Edit Item' : 'New Item' ?></h2>
    <a href="<?= base_url('/items') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <?php $action = isset($item) ? base_url('/items/update/'.$item['id']) : base_url('/items/create'); ?>
        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Nama Item</label>
                <input type="text" name="nama_item" class="form-control" value="<?= isset($item) ? esc($item['nama_item']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Item</label>
                <textarea name="deskripsi_item" class="form-control" rows="3" required><?= isset($item) ? esc($item['deskripsi_item']) : '' ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori Barang</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (isset($item) && $item['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                            <?= esc($cat['nama_kategori']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="harga" id="inputHarga" class="form-control" value="<?= isset($item) ? esc($item['harga']) : '' ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Foto</label>
                <input type="file" name="foto" class="form-control" id="imgInp" accept="image/*">
                
                <div class="mt-3">
                    <?php if(isset($item) && !empty($item['foto'])): ?>
                        <img id="imgPreview" src="<?= base_url('uploads/items/'.$item['foto']) ?>" alt="Preview" width="150" class="img-thumbnail">
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

    // Format Ribuan
    var inputHarga = document.getElementById('inputHarga');
    
    inputHarga.addEventListener('keyup', function(e) {
        inputHarga.value = formatRupiah(this.value);
    });

    // Format on load if value exists
    if (inputHarga.value) {
        inputHarga.value = formatRupiah(inputHarga.value);
    }

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		  = number_string.split(','),
        sisa     		  = split[0].length % 3,
        rupiah     		  = split[0].substr(0, sisa),
        ribuan     		  = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<?= $this->endSection() ?>
