<head>
<style type="text/css">
/*CSS RESPONSIVE*/
h3 {   
   margin: 25px auto 20px;
    text-align: center;
    text-transform: uppercase;
    font-size: 17px;
}
/* Table */
table {
    margin: auto;
    font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
    font-size: 12px;

}
.demo-table {
  border-collapse: collapse;
  font-size: 13px;
}
.demo-table th, 
.demo-table td {
  border: 1px solid #e1edff;
  border-top: 0;
  border-right: 0;
  padding: 7px 17px;
}
.demo-table th, 
.demo-table td:last-child {
  border-right: 1px solid #e1edff;
}
caption.title {
  caption-side: top;
  margin-bottom: 10px;
}

/* Table Header */
.demo-table thead th {
  background-color: #508abb;
  color: #FFFFFF;
  border-color: #6ea1cc !important;
  text-transform: uppercase;
}

/* Table Body */
.demo-table tbody td {
  color: #353535;
  position: relative;
  white-space: nowrap;
}

.demo-table tbody tr:nth-child(odd) {
  background-color: #f4fbff;
}
.demo-table tbody tr:hover th,
.demo-table tbody tr:hover td {
  background-color: #ffffa2;
  border-color: #ffff0f;
  transition: all .2s;
}
.demo-table tbody td:empty
{
  background-color: #ffcccc;
}

a.remove {
  color: red;
  font-size: 23px;
  float: left;
}

a.remove {
  line-height: 0.1;
}

a.edit {
  color: #35b103;
  margin-right: 5px;
  font-size: 20px;
  float: left;
}

.toolbox {
  width: 45px;
}
a.more {
  color: #717171;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
  padding: 10px;
  display: none;
}

.table-container {
  overflow: auto;
}

@media screen and (max-width: 520px) {
  table.responsive {
    width: 100%;
  }
  .res1 thead {
    display: none;
  }
  .res1 td {
    display: block;
    text-align: right;
    border-right: 1px solid #e1edff;
  }
  .res1 td::before {
    float: left;
    text-transform: uppercase;
    font-weight: bold;
    content: attr(data-header);
  }
  
  .res2 thead th.column-primary {
    width: 100%;
  }

  .res2 thead th:not(.column-primary) {
    display:none;
  }
  
  .res2 th[scope="row"] {
    vertical-align: top;
  }
  
  .res2 td {
    display: block;
    width: auto;
    text-align: right;
  }
  .res2 thead th::before {
    text-transform: uppercase;
    font-weight: bold;
    content: attr(data-header);
  }
  .res2 thead th:first-child span {
    display: none;
  }
  .res2 td::before {
    float: left;
    text-transform: uppercase;
    font-weight: bold;
    content: attr(data-header);
  }
  
  .res3 .more {
    display: block;
  }
  .res3 thead th.column-primary {
    width: 100%;
  }
  
  .res3 thead th:not(.column-primary) {
    display:none;
  }
  
  .res3 th[scope="row"] {
    vertical-align: top;
  }
  
  .res3 td {
    display: block;
    width: auto;
  }
  
  .res3 td:nth-child(n+2)::before {
    float: left;
    text-transform: uppercase;
    font-weight: bold;
    content: attr(data-header);
    width: 80px;
  }
  
  .res3 .expanded td:nth-child(n+2) {
    display: block;
  
  }
  
  .res3 td:nth-child(n+2) {
    display: none;
  }
  
  a.remove, a.remove i {
    line-height: 0.7;
  }
  a.remove {
    font-size: 20px;
  }

  a.edit {
    font-size: 18px;
    line-height: 0;
  }
</style>
</head>
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('beranda_pelanggan');?>">Beranda</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/profil_pelanggan');?>">Profil</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/keranjang');?>">Keranjang</a></li>
                        <li>Transaksi</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
             <a href="javascript: history.go(-1)"><button type="button" class="btn btn-default">Kembali</button></a>
<div id="tabel_pemesanan"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
            <th><center>No.</center></th>
            <th><center>ID Pemesanan</center></th>
            <th><center>ID Pelanggan</center></th>
            <th><center>Sub Total</center></th>
            <th><center>Tarif Ongkir</center></th>
            <th><center>Total Bayar</center></th>
            <th><center>Tanggal Pemesanan</center></th>
            <th><center>Tanggal Transaksi</center></th>
            <th><center>Foto</center></th>
            <th><center>Status</center></th>
            <th><center>Alamat</center></th>
            <th><center>Perkiraan</center></th>
            <th><center>Rekening</center></th>
            <th><center>Kurir</center></th>
            <th><center>Berat</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <?php
        $no=1;
                foreach ($data1 as $trs) {
                $id_transaksi = $trs->id_transaksi;
                $id_pelanggan = $trs->id_pelanggan;
                $sub_total = $trs->sub_total;
                $tarif_ongkir = $trs->tarif_ongkir;
                $total_bayar = $trs->total_bayar;
                $tgl_pemesanan = $trs->tgl_pemesanan;
                $tgl_transaksi = $trs->tgl_transaksi;
                $status = $trs->status;
                $foto = $trs->foto;
                $alamat = $trs->alamat;
                $perkiraan = $trs->perkiraan;
                $rekening = $trs->rekening;
                $kurir = $trs->kurir;
                $berat = $trs->berat;
                ?>
          <td><center><?php echo $no; ?>.</center></td>
          <td><center><?php echo $id_transaksi; ?></center></td>
          <td><center><?php echo $id_pelanggan; ?></center></td>
          <td><center><?php echo $sub_total; ?></center></td>
          <td><center><?php echo $tarif_ongkir; ?></center></td>
          <td><center><?php echo $total_bayar; ?></center></td>
          <td><center><?php echo $tgl_pemesanan; ?></center></td>
          <td><center><?php echo $tgl_transaksi; ?></center></td>
          <td><center>
            <?php
            if($foto==''){
              echo'-';
            }else{
              ?>
              <img src="<?= base_url('assets/');?>/img/images_transaksi/<?= $foto?>" height="75px" width="75px">
            <?php
            }
            ?>
            </center></td>
          <td><center><?php echo $status; ?></center></td>
          <td><center><?php echo $alamat; ?></center></td>
          <td><center><?php echo $perkiraan; ?></center></td>
          <td><center><?php echo $rekening; ?></center></td>
          <td><center><?php echo $kurir; ?></center></td>
          <td><center><?php echo $berat; ?></center></td>
          <td><center>
            <?php
            if($status=='Belum Upload'){
              ?>
              <a href="<?= base_url('beranda_pelanggan/konfirmasi_upload_bukti/'.$id_transaksi);?>" class="btn btn-success btn-xs">Upload Bukti</a>
              <?php
            }
            ?>
            <a href="<?= base_url('beranda_pelanggan/detail_trs/'.$id_transaksi);?>" class="btn btn-info btn-xs">Lihat</a>
            </td>  
        </tr>
        <?php
        $no++;
        }
        ?>
      </table>
    </div>
  </div>                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->