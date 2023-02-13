<div id="layoutSidenav_content">
<main>
    <div class="card mb-4 mt-4">
        <div class="container">
            <center><h1>Form Update User</h1></center>
            <?php foreach($barang as $data){ ?>            
            <form action="<?php echo site_url('admin/c_Barang/prosesUpdate/').$data['id_barang'] ?>"  method="post">
                
                    <div class="form-group">
                    <label for="exampleInputEmail1">ID Barang</label>
                    <input type="text" value="<?= $data['id_barang'] ?>" name="id_barang" class="form-control" disabled>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang </label>
                    <input type="text" value="<?= $data['nama_barang'] ?>" name="nama_barang" class="form-control"required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input type="text" value="<?= $data['jenis_barang'] ?>" name="jenis_barang" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tahun Pembuatan</label>
                    <input type="number" value="<?= $data['tahun_pembuatan'] ?>" name="tahun_pembuatan" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" value="<?= $data['harga'] ?>" name="harga" class="form-control"required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">QTY</label>
                    <input type="text" value="<?= $data['qty'] ?>" name="qty" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Update</button>                    



            </form>
            <?php } ?>            
        </div>
    </div>
</main>
</div>