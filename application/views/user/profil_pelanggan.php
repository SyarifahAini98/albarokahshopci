<div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                     <li><a href="<?= base_url('beranda');?>">Beranda</a></li>
                        <li><a href="<?= base_url('beranda/cara_pemesanan');?>">Cara Pemesanan</a></li>
                        <li>Profil_Pelanggan</li>
                        <li><a href="<?= base_url('beranda/tentang_kami');?>">Tentang Kami</a></li>
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
                                        <img src="<?= base_url('assets/');?>img/pelanggan/<?= $row->foto;?>" style="height:175px; width:175px;"></center><!-- 
                                    </div> -->
                                    </td>
                                <tr><td width="15%">Username</td><td width="4%">:</td><td><?= $row->username;?></td></tr>
                                <tr><td>Email</td><td>:</td><td><strong><font color="orange"> <?= $row->email;?></font></strong></td></tr>
                                <tr><td>Jeni Kelamin</td><td>:</td><td><?= $row->jkel;?></td></tr>
                                <tr><td>Nomor Telpon</td><td>:</td><td><?= $row->no_telp;?></td></tr>
                                <tr><td>Alamat</td><td>:</td><td><?= $row->alamat;?></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3"></tr>
                                
                                    </td>
                                </tr>
                            </table>
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
        