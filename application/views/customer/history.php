<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu History Pesanan</h3>
                </div>

                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID Pesanan</th>
                                <th>Status Pesanan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                foreach ($pesan as $data) { ?>
                        <tr>
                            <td><?php echo $data['id_pesan'] ?></td>
                            <?php if ($data['status_pesan'] == 0){ ?>
                            <td class='btn btn-warning'>Menunggu checkout</td>
                            <?php } else if ($data['status_pesan'] == 1){  ?>
                            <td class='btn btn-primary'>Menunggu Diproses</td>
                            <?php } else if ($data['status_pesan'] == 2){  ?>
                            <td class='btn btn-info'>Diproses</td>
                            <?php } else if ($data['status_pesan'] == 3){  ?>
                            <td class='btn btn-secondary'>Dikirim</td>
                            <?php } else if ($data['status_pesan'] == 4){  ?>
                            <td class='btn btn-success'>Selesai</td>
                            <?php } else if ($data['status_pesan'] == 5 ){?>
                            <td class='btn btn-danger'>Pesanan Dibatalkan </td>
                            <?php } ?>


                            <td><?php echo $data['tgl_pesan'] ?></td>
                            <td>
                                <div class="btn-group text-white" role="group">
                                    <div type="button" class="btn btn-primary">
                                        <a
                                            href="<?php echo base_url('index.php/customer/c_Pelanggan/detail_pesanan/'.$data['id_pesan']) ?>">
                                            <i class="far fa-eye text-white"></i>
                                    </div>
                                    <?php if($data['status_pesan'] == 1){ ?>
                                    <div class="btn-group text-white" role="group">
                                        <div type="button" class="btn btn-danger">
                                            <a
                                                href="<?php echo base_url('index.php/customer/c_Pelanggan/pembatalan_pesanan/'.$data['id_pesan']) ?>">
                                                <i class="fas fa-window-close text-white"></i>
                                                <?php } ?>
                                        </div>
                            </td>
                        </tr>
                        <?php } ?>

                        <div class="modal fade" id="batal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda ingin membatalkan pesanan?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Tidak</button>
                                        <a class="btn btn-primary"
                                            href=<?php echo site_url('customer/c_Pelanggan/pembatalan_pesanan') ?>>Iya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                        var url = "<?= site_url(); ?>";

                        function deletes(id_barang) {
                            var r = confirm("Apakah Anda Ingin Membatalkan ?");
                            if (r == true) {
                                window.location = url + "customer/c_Pelanggan/pembatalan_pesanan" + id_pesan;
                            } else {
                                return false;
                            }
                        }
                        </script>