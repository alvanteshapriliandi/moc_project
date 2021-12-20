<?php 
    $data_barang = null;
    $params = [
        'nama' => null
    ];
?>
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3>List Barang</h3>
                    </div>
                    <div class="col-6 text-right align-middle">
                        <a href="<?php echo $global->get_url() . '?page=barang-tambah'; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="namaFormControlInput1" placeholder="cari nama barang" name="nama">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="btn-search"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['btn-search'])) {
                        if (isset($_POST['nama'])) {
                            $params['nama'] = $_POST['nama']; 
                        }
                        $data_barang = $gudang->index('barang', $params);
                    } else {
                        $data_barang = $gudang->index('barang');
                    }
                ?>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="text-right">Harga Modal</th>
                            <th class="text-right">Harga Jual</th>
                            <th class="text-right">Stok</th>
                            <th class="text-center">Status</th>
                            <th class="text-right">Tgl Masuk</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php if (count($data_barang) > 0) : ?>
                    <tbody>
                        <?php
                            foreach ( $data_barang as $key => $barang) :
                        ?>
                        <tr>
                            <td><?php echo $barang['nama'] ?></td>
                            <td><?php echo !is_null($barang['deskripsi']) && $barang['deskripsi'] != '' ? $barang['deskripsi'] : '-' ?></td>
                            <td class="text-right"><?php echo number_format($barang['harga_modal']) ?></td>
                            <td class="text-right"><?php echo number_format($barang['harga_jual']) ?></td>
                            <td class="text-right"><?php echo number_format($barang['stok']) ?></td>
                            <td class="text-center">
                                <?php 
                                    if ($barang['status'] === 'Baru') {
                                        echo '<span class="badge bg-primary">'.$barang['status'].'</span>';
                                    } elseif ($barang['status'] === 'Masuk') {
                                        echo '<span class="badge bg-success">'.$barang['status'].'</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">'.$barang['status'].'</span>';
                                    }
                                ?>
                            </td>
                            <td class="text-right"><?php echo date_format(date_create($barang['tgl_masuk']), 'd-m-Y') ?></td>
                            <td class="text-center">
                                <a href="<?php echo $global->get_url() . '?page=barang-detail&id=' . $barang['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye text-white"></i></a>

                                <a href="<?php echo $global->get_url() . '?page=barang-edit&id=' . $barang['id']; ?>" class="btn btn-success btn-sm <?php echo $barang['status'] === 'Masuk' || $barang['status'] === 'Reject'? 'disabled' : ''; ?>"><i class="fa fa-pencil"></i></a>

                                <a href="#" ata-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $barang['id']; ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $barang['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah kamu yakin untuk menghapus <strong><?php echo $barang['nama'] ?></strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-primary" name="btn-delete<?php echo $barang['id']; ?>">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if (isset($_POST['btn-delete' . $barang['id']])) {
                                                $gudang->delete('barang', $barang['id']);
                                                 echo '<script>window.location="'.$global->get_url() . '?page=barang'.'"</script>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <?php else : ?>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data untuk saat ini.</td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>