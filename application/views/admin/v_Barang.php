<!-- Data Pemesanan Barang -->
<div class="box" style="color:black">
    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Data Pemesanan Baru</h3>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                            <tr>
                                <th>No. </th>
                                <th>ID Pesanan </th>
                                <th>Pemesan</th>
                                <th>Status Pesanan </th>
                                <th>Tanggal Pesanan</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                foreach ($pesanan_checkout as $sp){ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $sp['id_pesan'] ?></td>
                            <td><?php echo $sp['nama'] ?></td>
                            <?php if ($sp['status_pesan'] == 0){ ?>
                            <td class='btn btn-warning'>Menunggu checkout</td>
                            <?php } else if ($sp['status_pesan'] == 1){  ?>
                            <td class='btn btn-primary'>Menunggu Diproses</td>
                            <?php } else if ($sp['status_pesan'] == 2){  ?>
                            <td class='btn btn-danger'>Diproses</td>
                            <?php } else if ($sp['status_pesan'] == 3){  ?>
                            <td class='btn btn-secondary'>Dikirim</td>
                            <?php } else if ($sp['status_pesan'] == 4){  ?>
                            <td class='btn btn-success'>Selesai</td>
                            <?php } ?>
                            <td><?php echo $sp['tgl_pesan'] ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/c_Admin/detail_pesanan/'.$sp['id_pesan']) ?>">
                                    <button type="button" class="btn btn-danger">
                                        <i class="far fa-eye text-white"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Pemesanan Barang Terkonfirmasi -->
    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Data Proses Pemesanan</h3>
                </div>


                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No. </th>
                                <th>ID Pesanan </th>
                                <th>Pemesan</th>
                                <th>Status Pesanan </th>
                                <th>Tanggal Pesanan</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                foreach ($pesanan_diproses as $sp){ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $sp['id_pesan'] ?> </td>
                            <td><?php echo $sp['nama'] ?></td>
                            <?php if ($sp['status_pesan'] == 0){ ?>
                            <td class='btn btn-warning'>Menunggu checkout</td>
                            <?php } else if ($sp['status_pesan'] == 1){  ?>
                            <td class='btn btn-primary'>Menunggu Diproses</td>
                            <?php } else if ($sp['status_pesan'] == 2){  ?>
                            <td class='btn btn-info'>Diproses</td>
                            <?php } else if ($sp['status_pesan'] == 3){  ?>
                            <td class='btn btn-secondary'>Dikirim</td>
                            <?php } else if ($sp['status_pesan'] == 4){  ?>
                            <td class='btn btn-success'>Selesai</td>
                            <?php } else if ($sp['status_pesan'] == 5){ ?>
                            <td class='btn btn-danger'>Pesanan Dibatalkan</td>
                            <?php } ?>


                            <td><?php echo $sp['tgl_pesan'] ?></td>
                            <?php if ($sp['status_pesan'] == 2){ ?>
                            <td>
                                <a href="<?php echo site_url('admin/c_Admin/kirim_pesanan/'.$sp['id_pesan']) ?>">
                                    <button type="button" class="btn btn-dark">
                                        Kirim
                                    </button>
                                </a>
                            </td>
                            <?php } else if ($sp['status_pesan'] == 3){  ?>
                            <td>
                                <a href="<?php echo site_url('admin/c_Admin/selesai_pesanan/'.$sp['id_pesan']) ?>">
                                    <button type="button" class="btn btn-primary">
                                        Selesai
                                    </button>
                                </a>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var url = "<?= site_url(); ?>";

function deletes(id_barang) {
    var r = confirm("Apakah Anda Ingin Menghapus Data ?");
    if (r == true) {
        window.location = url + "/admin/c_User/hapusBarang/" + id_barang;
    } else {
        return false;
    }
}
</script>