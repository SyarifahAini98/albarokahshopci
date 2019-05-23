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
                <center>
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="10"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="<?= base_url('assets/');?>img/pelanggan.jpg" alt="" style="height:180px; width:280px;"/> </center><!-- 
                                    </div> -->
                                    </td>
                                    <td colspan="3"><h4><b><?php echo $_SESSION["profil_pelanggan"]; ?></b></h4></td></tr>
                                    <tr><td colspan="3"></td></tr>
                                    <tr><td width="15%">Username </td><td width="5%">:</td><td><?php echo $_SESSION["username"]; ?></td></tr>
                            </table>
                            </center>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
            </div>
            <!-- /.col -->
        