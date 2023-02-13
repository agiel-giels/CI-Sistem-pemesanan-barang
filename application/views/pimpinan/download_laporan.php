  <!-- DataTable with Hover -->
  <div class="col-lg-12" style="max-width:60%;margin-left:15rem;">
      <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Print Laporan</h6>
          </div>
          <div class="card-body">
              <form method="post" action="<?= site_url('admin/c_Admin/proses_laporan') ?>">
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nomor Pesanan</label>
                      <select class="form-control" name="id_pesanan">
                          <?php foreach ($id_pesanan as $data): ?>
                          <option value="<?php echo $data['id_pesan'] ?>">Pesanan ID : <?php echo $data['id_pesan'] ?>
                          </option>
                          <?php endforeach ?>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Print</button>
              </form>
          </div>
      </div>
  </div>
  </div>