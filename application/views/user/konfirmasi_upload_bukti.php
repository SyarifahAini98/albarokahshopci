
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb" style="text-align: center;">
                        <li><center><a href="#">Upload Bukti Transaksi</a></center></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="col-md-12 text-center col-sm-6 col-xs-6">
                    <?php
                    $no=1;
                    foreach ($data as $row):
                    ?>
                    <a href="javascript: history.go(-1)" class="btn btn-default" role="button" style="float:left;">Kembali</a><br>
                <?php echo form_open_multipart('Beranda_pelanggan/proses_upload_gambar');?>
                <table border="0">
                    <tr>
                    <td width="100px"><b>Foto</b></td>
                    <td>: &nbsp</td>
                    <td><input type="file" name="file_name" value="" ></td>
                    </tr>
                    <tr>
                    <td><b>Alamat</b></td>
                    <td>: &nbsp</td>
                    <td><textarea name="alamat"></textarea></td>
                    </tr>
                    <tr>
                    <td><b>No. Rekening</b></td>
                    <td>: &nbsp</td>
                    <td><input type="text" name="rekening" maxlength="30" value=""></td>
                    </tr>
                </table>
                <input type="hidden" name="id_transaksi" value="<?php echo $row->id_transaksi;?>" /><br>
                <input type="submit" class="btn btn-primary" value="Kirim" />
            </form>
<!-- End Content Section  -->
                    </div>
                    <?php $no++;
                    endforeach;?>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->