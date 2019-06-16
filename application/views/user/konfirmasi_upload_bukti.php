
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb" style="text-align: center;">
                        <li><center><a href="#">Upload Bukti Transaksi</a></center></li>
                    </ol>
                <!-- /.div -->
                <div class="row">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                    ?>
                    <div class="col-md-12 text-center col-sm-6 col-xs-6">
                        <!-- <div class="thumbnail product-box" style="height: 300px;"> -->
                        <a href="javascript: history.go(-1)" class="btn btn-default" role="button" style="float:left;">Kembali</a>
                            <center>
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="10"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center><?= $row->id_transaksi;?></center><!-- 
                                    </div> -->

                                    <section class="courses section">
      <div class="container">
        <div class="row">
                <?php echo form_open_multipart('Beranda_pelanggan/proses_upload_gambar');?>
                <table>
                    <tr>
                    <td width="100px"><b>Foto</b></td>
                    <td>: &nbsp</td>
                    <td><input type="file" name="file_name" value="<?php echo $row->foto;?>" ></td>
                    </tr>
                </table>
                <input type="text" name="id_transaksi" value="<?php echo $row->id_transaksi;?>" />
                <input type="submit" value="Edit Data" />
            </form>
        </div>
      </div>
</section>
<!-- End Content Section  -->

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