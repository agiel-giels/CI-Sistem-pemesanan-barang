<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu History Pesanan</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-success"
                                href="<?php echo base_url('index.php/admin/c_Barang') ?>">Kembali</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary"
                                href="<?php echo base_url('index.php/admin/c_Barang/confirm_pesanan/'.$id_pesanan) ?>">Kirim</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID Pesanan</th>
                                <th>Nama Barang</th>
                                <th>Jenis barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Tersedia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                foreach ($barang as $data) { ?>
                        <tr>
                            <td><?php echo $data['id_pesanan'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['jenis_barang'] ?></td>
                            <td><?php echo $data['qty'] ?></td>
                            <td><?php echo $data['harga'] ?></td>
                            <?php if ($data['tersedia'] == 0){  ?>
                            <td class='btn btn-primary'>Pengecekan</td>
                            <?php } else if ($data['tersedia'] == 1){  ?>
                            <td class='btn btn-primary'>Tersedia</td>
                            <?php } else if ($data['tersedia'] == 2){  ?>
                            <td class='btn btn-primary'>Tidak Tersedia</td>
                            <?php } ?>
                            <td>
                                <div class="btn-group text-white" role="group">
                                    <div type="button" class="btn btn-success">
                                        <a
                                            href="<?php echo base_url('index.php/admin/c_Admin/confirm_pesanan/'.$data['id_barang'].'/'.$data['id_pesanan']) ?>">
                                            <i class="fas fa-check text-white"></i>
                                    </div>
                                    <div type="button" class="btn btn-danger">
                                        <a
                                            href="<?php echo base_url('index.php/admin/c_Admin/batalkan_pesanan/'.$data['id_barang'].'/'.$data['id_pesanan']) ?>">
                                            <i class="fas fa-times text-white"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>