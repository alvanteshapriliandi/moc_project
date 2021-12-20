<?php 
    $error = null;
    $data_detail = $gudang->detail('barang', $_GET['id']);
    if (isset($_POST['submit'])) {
        $data_barang = [
            $_POST['nama'],
            $_POST['deskripsi'] != '' ? $_POST['deskripsi'] : null,
            $_POST['harga_modal'],
            $_POST['harga_jual'],
            $_POST['stok'],
            $_POST['tgl_masuk'],
            $_GET['id']
        ];
        $data = $gudang->update('barang', $data_barang);
        if ($data) {
            echo '<script>alert("Data berhasil diperbarui");window.location="'.$global->get_url() . '?page=barang'.'"</script>';
        } else {
            $error = 'Update data gagal! Mohon periksa kembali inputan anda';
        }
    }
?>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3>Update Barang</h3>
                    </div>
                    <div class="col-6 text-right align-middle">
                        <a href="<?php echo $global->get_url() . '?page=barang'; ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <?php if ($data_detail['status'] != 'Masuk' && $data_detail['status'] != 'Reject') : ?>
            <div class="card-body">
                <?php if (!is_null($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namaFormControlInput1" class="form-label"><strong>Nama<sup class="text-danger">*</sup></strong></label>
                        <input type="text" class="form-control" id="namaFormControlInput1" placeholder="masukkan nama barang" name="nama" value="<?php echo $data_detail['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargaModalFormControlInput1" class="form-label"><strong>Harga Modal<sup class="text-danger">*</sup></strong></label>
                        <input type="text" min="0" class="form-control" id="hargaModalFormControlInput1" placeholder="masukkan harga modal barang" name="harga_modal" value="<?php echo $data_detail['harga_modal']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargajualFormControlInput1" class="form-label"><strong>Harga Jual<sup class="text-danger">*</sup></strong></label>
                        <input type="number" min="0" class="form-control" id="hargajualFormControlInput1" placeholder="masukkan harga jual barang" name="harga_jual" value="<?php echo $data_detail['harga_jual']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stokFormControlInput1" class="form-label"><strong>Stok<sup class="text-danger">*</sup></strong></label>
                        <input type="number" min="0" class="form-control" id="stokFormControlInput1" placeholder="masukkan stok barang" name="stok" value="<?php echo $data_detail['stok']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_masukFormControlInput1" class="form-label"><strong>Tgl Masuk<sup class="text-danger">*</sup></strong></label>
                        <input type="date" class="form-control" id="tgl_masukFormControlInput1" placeholder="masukkan tgl masuk barang" name="tgl_masuk" value="<?php echo $data_detail['tgl_masuk']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiFormControlInput1" class="form-label"><strong>Deskripsi</strong></label>
                        <textarea class="form-control" id="deskripsiFormControlTextarea1" rows="3" placeholder="masukkan deskripsi barang" name="deskripsi"><?php echo $data_detail['deskripsi']; ?></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-paper-plane"></i> Update</button>
                        <button class="btn btn-secondary" type="reset"><i class="fa fa-times-circle"></i> Reset</button>
                    </div>
                </form>
            </div>
            <?php else : ?>
            <div class="card-body">
                <div class="alert alert-info">Data sudah tidak bisa diperbarui!</div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>


