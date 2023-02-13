<div class="box" style="color:black">

    <div class="table">
        <!-- Datatables -->
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Menu Kelola User</h3>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"> </i> Tambah User
                    </button>
                </div>


                <div class="table-responsive p-3">

                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>

                                <th>ID User</th>
                                <th>Nama User</th>
                                <th>Jabatan</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <?php
                foreach ($user->result() as $key => $data) { ?>
                        <tr>
                            <td><?php echo $data->id ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->jabatan ?></td>
                            <td><?php echo $data->no_telp ?></td>
                            <td><?php echo $data->alamat ?></td>
                            <td><?php echo $data->username ?></td>
                            <td><?php echo $data->email ?></td>
                            <td>
                                <div class="btn-group text-white" role="group">
                                    <button type="button" class="btn btn-danger">
                                        <a href="javascript:void(0);" onclick="deletes(<?php echo $data->id ?>)">
                                            <span class="fa fa-trash text-white"></span>
                                        </a>
                                    </button>
                                    <button type="button" class="btn btn-warning">
                                        <a href="<?php echo site_url("admin/c_User/updateUser/" . $data->id)?>">
                                            <i class="far fa-edit text-white"></i>
                                    </button>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?= site_url("admin/c_User/aksiTambah") ?>">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Jabatan</label>
                                                <select name='jabatan' class="form-control">
                                                    <option value='admin'>admin</option>
                                                    <option value='pelanggan'>pelanggan</option>
                                                    <option value='pimpinan'>pimpinan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">No Telepon</label>
                                                <input type="number" name="no_telp" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Username</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tambah </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                        var url = "<?= site_url(); ?>";

                        function deletes(id) {
                            var r = confirm("Apakah Anda Ingin Menghapus Data ?");
                            if (r == true) {
                                window.location = url + "/admin/c_User/hapusUser/" + id;
                            } else {
                                return false;
                            }
                        }
                        </script>