
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('beranda');?>">Beranda</a></li>
                        <li><a href="<?= base_url('beranda/tentang_kami');?>">Tentang Kami</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                    ?>
                    <div class="col-md-12 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box" style="height: 300px;">
                            <center>
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="10"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" style="height:175px; width:175px;"><br><h4><b><?= $row->nama_produk;?></b></h4></center><!-- 
                                    </div> -->
                                    </td>
                                <tr><td width="15%">Merek</td><td width="4%">:</td><td><?= $row->merek;?></td></tr>
                                <tr><td>Ukuran</td><td>:</td><td>
                                <?php
                                if($row->ukuran==''){
                                    echo'-';}
                                else{
                                    echo $row->ukuran;
                                }; ?></td></tr>
                                <tr><td>Harga</td><td>:</td><td><strong><font color="orange">Rp <?= $row->harga_produk;?>,00</font></strong></td></tr>
                                <tr><td>Harga Satuan</td><td>:</td><td><?= $row->berat;?> gr</td></tr>
                                <tr><td>Stok</td><td>:</td><td><?= $row->stok_produk;?> produk</td></tr>
                                <tr><td>Kategori</td><td>:</td><td><?= $row->kategori;?></td></tr>
                                <tr><td>Terjual</td><td>:</td><td><?= $row->terjual;?> produk</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">
                                    <a href="<?= base_url('auth');?>" class="btn btn-danger" role="button" style="background-color: #FBEBED;"><font color="#D0011B">Masukkan Keranjang</font></a>
                                    <a href="<?= base_url('auth');?>" class="btn" role="button" style="background-color: #D0011B;"><font color="white">Beli Sekarang</font></a>
                                    </td>
                                </tr>
                            </table>
                            </center>
                        </div>
                    </div>
                    <?php $no++;
                    endforeach;?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->