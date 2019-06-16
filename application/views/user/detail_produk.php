
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('beranda_pelanggan');?>">Beranda</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/profil_pelanggan');?>">Profil</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/keranjang');?>">Keranjang</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/transaksi');?>">Transaksi</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                $id = $row->id_produk;
                $name = $row->nama_produk;
                $description = $row->merek;
                $price = $row->harga_produk;
                $foto = $row->foto;
                $berat = $row->berat;
                    ?>
                    <div class="col-md-12 text-center col-sm-6 col-xs-6">
                        <!-- <div class="thumbnail product-box" style="height: 300px;"> -->
                        <a href="javascript: history.go(-1)" class="btn btn-default" role="button" style="float:left;">Kembali</a>
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
                                    <?php
                        
                        // Create form and send values in 'beranda_pelanggan/add' function.
                        echo form_open('beranda_pelanggan/add');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        echo form_hidden('berat', $berat);
                        ?>
                        <?php
                        $btn = array(
                            'class' => 'btn btn-success',
                            'value' => 'Masukkan Keranjang',
                            'name' => 'action'
                        );
                        
                        // Submit Button.
                        echo form_submit($btn);
                        ?>
                        <?php
                        echo form_close();
                        ?>
                                    </td>
                                </tr>
                            </table>
                            </center>
                        <!-- </div> -->
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