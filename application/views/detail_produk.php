
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li>Beranda</li>
                        <li><a href="<?= base_url('beranda/cara_pemesanan');?>">Cara Pemesanan</a></li>
                        <li><a href="<?= base_url('beranda/tentang_kami');?>">Tentang Kami</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                    ?>
                    <div class="">
                        <div class="thumbnail product-box" style="height: 300px;">
                            <center>
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="11"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" style="height:175px; width:175px;"></center><!-- 
                                    </div> -->
                                    </td>
                                    <td colspan="3"><h4><b><?= $row->nama_produk;?></b></h4></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
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
                                    <a href="masuk.php" class="btn btn-danger" role="button" style="background-color: #FBEBED;"><font color="#D0011B">Masukkan Keranjang</font></a>
                                    <a href="masuk.php" class="btn" role="button" style="background-color: #D0011B;"><font color="white">Beli Sekarang</font></a>
                                    </td>
                                </tr>
                            </table>
                            </center>
                            dsdsdsds
                            <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="" style="height:80px; width:80px;"/>
                            <div class="caption">
                                <h3><a href="#"><?= $row->nama_produk;?></a></h3>
                                <p>Harga : <strong>Rp <?= $row->harga_produk;?></strong>  </p>
                                <p><a href="#"><?= $row->merek;?></a></p>
                                <p><a href="<?= base_url('auth');?>" class="btn btn-success" role="button">Beli</a> <a href="<?= base_url('beranda/detail_produk/'.$row->id_produk);?>" class="btn btn-primary" role="button">Lihat</a></p>
                            </div>
                        </div>
                    </div>
                    <?php $no++;
                    endforeach;?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->