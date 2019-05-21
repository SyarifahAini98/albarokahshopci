
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li class="active">Beranda</li>
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>1235  </strong>produk</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Urutkan Produk &nbsp;
      <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                    ?>
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="" height="100px" width="100px"/>
                            <div class="caption">
                                <h3><a href="#"><?= $row->nama_produk;?></a></h3>
                                <p>Harga : <strong>Rp <?= $row->harga_produk;?></strong>  </p>
                                <p><a href="#"><?= $row->merek;?></a></p>
                                <p><a href="#" class="btn btn-success" role="button">Beli</a> <a href="#" class="btn btn-primary" role="button">Lihat</a></p>
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