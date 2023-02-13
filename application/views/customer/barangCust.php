<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Keranjang Aktif</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-success"
                                href="<?php echo base_url('index.php/customer/c_Pelanggan/tampilPemesanan') ?>"> Tambah
                                Barang</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success"
                                href="<?php echo base_url('index.php/customer/c_Pelanggan/checkout') ?>"> Checkout</a>
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
                                <th>Harga Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                foreach ($pesan as $data) { ?>
                        <tr>
                            <td><?php echo $data['id_pesanan'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['jenis_barang'] ?></td>
                            <td><?php echo $data['qty'] ?></td>
                            <td><?php echo $data['harga'] ?></td>

                            <td>
                                <div class="btn-group text-white" role="group">
                                    <div type="button" class="btn btn-danger">
                                        <a href="javascript:void(0);"
                                            onclick="deletes(<?php echo $data['id_barang'] ?>)">
                                            <i class="far fa-trash-alt text-white"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>



                        <!-- Modal Tambah -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?= site_url('customer/c_Pelanggan/tambah') ?>">
                                            <div class="form-group">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Barang</label>
                                                <input type="text" name="nama_barang" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Jenis Barang</label>
                                                <input type="text" name="jenis_barang" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah Barang</label>
                                        <input type="number" name="qty" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga Satuan</label>
                                        <input type="number" name="harga" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

                <script type="text/javascript">
                var url = "<?= site_url(); ?>";

                function deletes(id_barang) {
                    var r = confirm("Apakah Anda Ingin Menghapus Data ?");
                    if (r == true) {
                        window.location = url + "/customer/c_Pelanggan/delete_barang/" + id_barang;
                    } else {
                        return false;
                    }
                }
                </script>