<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Pelanggan</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/daftar');?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama');?>">
                  <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group">
                  <input type="jkel" class="form-control form-control-user" id="jkel" placeholder="Jenis Kelamin (L/P)" name="jkel" value="<?= set_value('jkel');?>">
                  <?= form_error('jkel','<small class="text-danger pl-3">','</small>');?>
                  <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="radio" class="form-control form-control-user" id="jkel" name="jkel" value="L">Laki-Laki
                    <?= form_error('jkel','<small class="text-danger pl-3">','</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="radio" class="form-control form-control-user" id="jkel" name="jkel" value="P">Perempuan
                  </div> -->
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= set_value('email');?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="no_telp" placeholder="No Telepon" name="no_telp" value="<?= set_value('no_telp');?>">
                  <?= form_error('no_telp','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" placeholder="Alamat" name="alamat" value="<?= set_value('alamat');?>">
                  <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username" value="<?= set_value('username');?>">
                  <?= form_error('username','<small class="text-danger pl-3">','</small>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Ulangi Password" name="password2">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a href="javascript: history.go(-1)"><button type="button" class="btn btn-default">Kembali</button></a>
                <a class="small" href="<?= base_url('auth');?>">Sudah Punya Akun? Masuk!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>