        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4 text-center">Form Register !</h3>
              <form method="POST" action="<?= site_url('c_Register/aksi_register') ?>"> 
                <div class="form-label-group">
                  <input type="text" name="nama" id="inputNama" class="form-control" placeholder="Masukan Nama Anda" required autofocus>
                  <label for="inputNama">Nama User</label>
                </div>

                <div class="form-label-group">
                  <input type="text" name="no_telp" id="inputNoTelp" class="form-control" placeholder="Masukan No Telepon Anda" required autofocus>
                  <label for="inputNoTelp">No Telepon</label>
                </div>

                <div class="form-label-group">
                  <input type="text" name="alamat" id="inputAlamat" class="form-control" placeholder="Masukan Alamat Anda" required autofocus>
                  <label for="inputAlamat">Alamat</label>
                </div>

                <div class="form-label-group">
                  <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Masukan Username Anda" required autofocus>
                  <label for="inputUsername">Username</label>
                </div>

                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                <div class="form-label-group">
                  <input type="password" name="password2" id="inputPassword1" class="form-control" placeholder="Masukan Ulang Password" required>
                  <label for="inputPassword1">Masukan Ulang Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Daftar</button>
                <p class="text-center"><a href="<?= site_url('c_Auth') ?>">Kembali</a> </p> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
