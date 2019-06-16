        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Kategori
                    </a>
                    <ul class="list-group">
                        <?php
                        foreach ($data1 as $row):
                        ?>
                        <a href="<?= base_url('beranda_pelanggan/kategori_alat_musik');?>">
                        <li class="list-group-item">Alat Musik
      <span class="label label-primary pull-right"><?= $row->total;?></span>
                        </li>
                        </a>
                        <?php endforeach;?>
                        <?php
                        foreach ($data2 as $row):
                        ?>
                        <a href="<?= base_url('beranda_pelanggan/kategori_alat_pancing');?>">
                        <li class="list-group-item">Alat Pancing
                      <span class="label label-success pull-right"><?= $row->total;?></span>
                        </li>
                        </a>
                        <?php endforeach;?>
                        <?php
                        foreach ($data3 as $row):
                        ?>
                        <a href="<?= base_url('beranda_pelanggan/kategori_alat_olahraga');?>">
                        <li class="list-group-item">Alat Olahraga
                         <span class="label label-danger pull-right"><?= $row->total;?></span>
                        </li>
                        </a>
                        <?php endforeach;?>
                    </ul>
                </div>
                <!-- /.div -->
                <div>
                    <a href="#" class="list-group-item active list-group-item-success">Testimoni
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">-
                             <span class="label label-danger pull-right"> </span>
                        </li>
                    </ul>
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->