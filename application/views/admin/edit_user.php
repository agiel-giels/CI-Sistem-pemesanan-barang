<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4 mt-4">
            <div class="container">
                <center>
                    <h1>Form Update User</h1>
                </center>
                <?php foreach($user as $data){ ?>
                <form action="<?php echo site_url('admin/c_User/prosesUpdate/').$data['id'] ?>" method="post">

                    <div class="form-group">
                        <label for="exampleInputEmail1">ID </label>
                        <input type="text" value="<?= $data['id'] ?>" name="id" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama </label>
                        <input type="text" value="<?= $data['nama'] ?>" name="nama" class="form-control" required>
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
                        <label for="exampleInputPassword1">No. Telepon</label>
                        <input type="number" value="<?= $data['no_telp'] ?>" name="no_telp" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" value="<?= $data['alamat'] ?>" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" value="<?= $data['username'] ?>" name="username" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>



                </form>
                <?php } ?>
            </div>
        </div>
    </main>
</div>