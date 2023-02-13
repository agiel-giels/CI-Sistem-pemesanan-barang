<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Laporan Pembelian Barang</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-success"
                                href="<?php echo base_url('index.php/admin/c_Admin/download_laporan') ?>">Download
                                Laporan</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success"
                                href="<?php echo base_url('index.php/admin/c_Barang') ?>">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>


                                <th>Nama Barang</th>
                                <th>Jenis barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Tersedia</th>
                            </tr>
                        </thead>
                        <?php
                foreach ($barang as $data) { ?>
                        <tr>
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
                        </tr>
                        <?php } ?>