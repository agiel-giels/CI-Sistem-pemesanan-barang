                      <!-- Begin Page Content -->
                      <div class="container-fluid">

                          <!-- Page Heading -->
                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                              <h1 class="h3 mb-0 text-gray-800">Laporan Pemesanan Barang</h1>


                          </div>

                          <div class="row mb-4">
                              <!-- DataTable with Hover -->
                              <div class="col-lg-12 " style="max-width:60%;margin-left:14rem;">
                                  <div class="card ">
                                      <div class="card-header bg-info">
                                          <h6 class="m-1 font-weight-bold text-white">Range Tanggal Pemesanan</h6>
                                      </div>
                                      <div class="card-body">
                                          <table class="table">
                                              <form action="<?php echo site_url('admin/c_Admin/proses_laporan'); ?>"
                                                  method="post">
                                                  <thead class="thead-light">
                                                      <tr>
                                                          <th> Tanggal Awal</th>
                                                          <th> Tanggal Akhir</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td><input type="date" class="form-control" id="tanggalawal"
                                                                  name="tanggalawal"
                                                                  value="<?= isset($tanggalawal) ? $tanggalawal : ''; ?>">
                                                              </input></td>
                                                          <td><input type="date" class="form-control" id="tanggalakhir"
                                                                  name="tanggalakhir"
                                                                  value="<?= isset($tanggalakhir) ? $tanggalakhir : ''; ?>">
                                                              </input></td>
                                                      </tr>
                                                      <tr>
                                                          <td colspan="2" style="text-align:center;">


                                                              <button type="submit" formtarget="_blank"
                                                                  style=" margin-left: auto;margin-right: auto;"
                                                                  class="btn btn-warning btn-icon-split"
                                                                  name="submittype" value="print">
                                                                  <span class="icon text-white-50">
                                                                      <i class="fas fa-print"></i>
                                                                  </span>
                                                                  <span class="text text-white">Cetak PDF</span>
                                                              </button>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </form>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </form>
                          <!-- <h5 style="text-align:center;"><?php echo $subtitle ?></h5> -->
                          <!--  -->


                      </div>
                      <!-- /.container-fluid -->

                      </div>