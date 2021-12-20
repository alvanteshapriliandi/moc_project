<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3>Detail Barang</h3>
                    </div>
                    <div class="col-6 text-right align-middle">
                        <a href="<?php echo $global->get_url() . '?page=barang'; ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php  $data_detail = $gudang->detail('barang', $_GET['id']) ;?>
                <div class="row pt-3 pb-3">
                    <div class="col-6">
                        <div class="row mb-3">
                            <div class="col-4">
                                <strong>Nama</strong>
                            </div>
                            <div class="col-8">
                                <?php echo $data_detail['nama']; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <strong>Deskripsi</strong>
                            </div>
                            <div class="col-8">
                                <?php echo !is_null($data_detail['deskripsi']) ? $data_detail['deskripsi'] : '-'; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <strong>Harga Modal</strong>
                            </div>
                            <div class="col-8">
                                <?php echo 'Rp. ' . number_format($data_detail['harga_modal']); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <strong>Harga Jual</strong>
                            </div>
                            <div class="col-8">
                                <?php echo 'Rp. ' . number_format($data_detail['harga_jual']); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <strong>Stok</strong>
                            </div>
                            <div class="col-8">
                                <?php echo number_format($data_detail['stok']); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <strong>Tgl Masuk</strong>
                            </div>
                            <div class="col-8">
                                <?php echo date_format(date_create($data_detail['tgl_masuk']), 'd-m-Y'); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <a href="<?php echo $global->get_url() . '?page=barang-edit&id=' . $data_detail['id']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>