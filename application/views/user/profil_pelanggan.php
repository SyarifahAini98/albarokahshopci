<div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                     <li><a href="<?= base_url('beranda_pelanggan');?>">Beranda</a></li>
                        <li>Profil</li>
                        <li><a href="<?= base_url('beranda_pelanggan/keranjang');?>">Keranjang</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/transaksi');?>">Transaksi</a></li>
                         <li><a href="<?= base_url('beranda_pelanggan/transaksi');?>">Testimoni</a></li>
                    </ol>
                </div>
                <!-- /.div -->
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
                                <tr><td width="15%">Username</td><td width="4%">:</td><td><?= $row->username;?></td></tr>
                                <tr><td>Email</td><td>:</td><td><strong><font color="orange"> <?= $row->email;?></font></strong></td></tr>
                                <tr><td>Nama Lengkap</td><td>:</td><td><?= $row->nama_lengkap;?></td></tr>
                                <tr><td>Jenis Kelamin</td><td>:</td><td><?= $row->jkel;?></td></tr>
                                <tr><td>No. Telp</td><td>:</td><td><?= $row->no_telp;?></td></tr>
                                <tr><td>Alamat</td><td>:</td><td><?= $row->alamat;?></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3"></tr>
                               
                                    </td>
                                </tr>
                            </table>
                            </center>
                         <center>   <a href="<?= base_url('beranda_pelanggan/edit_profil');?>" class="btn btn-primary" role="button">Edit Profil</a>
            </center>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php $no++;
                    endforeach;?>
    </div>
    <!-- /.container -->
            </div>
            <!-- /.col -->
        