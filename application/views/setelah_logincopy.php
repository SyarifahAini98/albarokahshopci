
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li>Beranda</li>
                        <li><a href="<?= base_url('beranda_pelanggan/profil_pelanggan');?>">Profil</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/keranjang');?>">Keranjang</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/transaksi');?>">Transaksi</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <?php
                        foreach ($data1 as $row):
                        ?>
                        <button type="button" class="btn btn-default"><strong><?= $row->total;?>  </strong>produk</button>
                        <?php
                        endforeach;?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Urutkan Produk &nbsp;
      <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('beranda_pelanggan/harga_terendah');?>">Harga Terendah</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url('beranda_pelanggan/harga_tertinggi');?>">Harga Tertinggi</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url('beranda_pelanggan/populer');?>">Populer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data2 as $row):
                    ?>
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box" style="height: 300px;">
                            <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="" style="height:80px; width:80px;"/>
                            <div class="caption">
                                <h3><?= $row->nama_produk;?></h3>
                                <p>Harga : <strong><font color="orange">Rp <?= $row->harga_produk;?></font></strong>  </p>
                                <p><font color="DodgerBlue"><?= $row->merek;?></font></p>
                                <p>
                                    <!-- fungsi_keranjang.php?act=add&amp;id_produk=<?php echo $data['id_produk']; ?>&amp;ref=keranjang.php -->
                                    <a href="<?= base_url('beranda_pelanggan/fungsi_keranjang/add/'.$row->id_produk.'');?>" class="btn btn-success" role="button">Beli</a> <a href="<?= base_url('beranda_pelanggan/detail_produk/'.$row->id_produk);?>" class="btn btn-primary" role="button">Lihat</a></p>
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