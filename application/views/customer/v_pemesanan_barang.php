  <!-- DataTable with Hover -->
  <div class="col-lg-12" style="max-width:60%;margin-left:15rem;">
      <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
          </div>
          <div class="card-body">
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
                  <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Barang</label>
                      <input type="number" name="qty" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Harga Satuan</label>
                      <input type="number" name="harga" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah Barang</button>
              </form>
          </div>
      </div>
  </div>
  </div>