<div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                     <li><a href="<?= base_url('beranda_pelanggan');?>">Beranda</a></li>
                        <li>Profil</li>
                        <li><a href="<?= base_url('beranda_pelanggan/keranjang');?>">Keranjang</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/transaksi');?>">Transaksi</a></li>
                    </ol>
                </div>
                <!-- /.div -->
               	<form method="POST" action="edit_proses_profil">
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                    ?>
               <center>
               <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="10"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="<?= base_url('assets/');?>img/images_pelanggan/<?= $row->foto;?>" style="height:175px; width:175px;"></center><!-- 
                                    </div> -->
                                    </td>
                                <tr><td width="15%">Username</td><td width="4%">:</td><td><input type="text" name="username" value="<?= $row->username;?>"></td></tr>
                                <tr><td>Email</td><td>:</td><td><strong><font color="orange"><input type="text" name="email" value="<?= $row->email;?>"></font></strong></td></tr>
                                <tr><td>Nama Lengkap</td><td>:</td><td><input type="text" name="nama_lengkap" value="<?= $row->nama_lengkap;?>"></td></tr>
                                <tr><td>Jenis Kelamin</td><td>:</td><td>
                                <select name="jkel">
                                    <option <?php if($row->jkel == "L"){ echo 'selected="selected"'; } ?> value="L">Laki-Laki</option>
                                    <option <?php if($row->jkel == "P"){ echo 'selected="selected"'; } ?> value="P">Perempuan</option>
                                </select>
                                </td></tr>
                                <tr><td>No. Telp</td><td>:</td><td><input type="text" name="no_telp" value="<?= $row->no_telp;?>"></td></tr>
                                <tr><td>Alamat</td><td>:</td><td><textarea name="alamat"><?= $row->alamat;?></textarea></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3"></tr>
                               
                                    </td>
                                </tr>
                            </table>
                            </center>
                         <center>
                         	<input type="submit" class="btn btn-success" role="button" name="btnEdit" value="Simpan">
							<a href="javascript: history.go(-1)" class="btn btn-default" role="button">Kembali</a>
            </center>
            </div>
        		</form>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php $no++;
                    endforeach;?>
    </div>
    <!-- /.container -->
            </div>
            <!-- /.col -->
        