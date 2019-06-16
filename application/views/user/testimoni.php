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
<body>

    <?php
    include'sumber_header.php';
    ?>

    <nav class="navbar navbar-default" role="navigation" style="overflow:hidden; position: fixed; top:0; width: 100%;z-index: 3;">
        <div class="container-fluid">
            <?php include 'header.php';?>
        </div>
        <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php
    include'sidebar_kiri.php';?>
        <div class="container" style='width:50%; float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
            <div class="row">
                <div class="col-md-9" style="width:100%;">
                <!-- /.row -->
                    <div class="row">
                        <div>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="profil_pelanggan.php">Profil</a></li>
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="transaksi.php">Transaksi</a></li>
                                <li class="active">Testimoni</li>
                            </ol>
                        </div>
<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
$id=$_SESSION['id'];
  $query = "SELECT * FROM transaksi,detail_transaksi,produk,pelanggan WHERE transaksi.id_transaksi=detail_transaksi.id_transaksi AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND produk.id_produk=detail_transaksi.id_produk AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_pelanggan = '$id' AND transaksi.status='Terbayar' OR transaksi.status='Terkirim' ORDER BY transaksi.id_transaksi";
  $result = mysqli_query($koneksi, $query);
$result = mysqli_query($koneksi, $query);
?>
<center>

  <div id="tabel_pemesanan"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
            <th><center>No.</center></th>
            <th><center>ID Detail Pemesanan</center></th>
            <th><center>ID Transaksi</center></th>
            <th><center>Nama Produk</center></th>
            <th><center>Qty</center></th>
            <th><center>Total Harga</center></th>
            <th><center>Testimoni</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <?php
        $no=1;
        while($row = mysqli_fetch_array($result))
          {
        ?>
        <tr class="odd gradeX">
          <?php
          echo'
          <td><center>'.$no.'</center></td>
          <td><center>'.$row["id_detail_trs"].'</center></td>
          <td><center>'.$row["id_transaksi"].'</center></td>
          <td>'.$row["nama_produk"].'</td>
          <td><center>'.$row["qty"].'</center></td>
          <td><center>'.$row["total_harga"].'</center></td>
          <td><center>';?>
            <?php
            if($row["testimoni"]==''){
              echo'-';
            }else{
              echo $row["testimoni"];
            }
            ?>
            </center></td>
          <td><center>
            <?php
            if($row["testimoni"]==''){
                ?>
            <a href="beri_testimoni.php?id=<?php echo $row['id_detail_trs'];?>" class="btn btn-success btn-xs">Beri Testimoni</a>
                <?php
            }else{
              echo '-';
            }
            ?>
          </center></td>
          <?php'
        </tr>
        <?php
        $no++;
        }
        ?>
      </table>
    </div>
  </div>
</center>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
        </div></div>
<?php include'sidebar_kanan.php';?>
<?php include'footer.php';?>
</body>
</html>
<?php
}else{
    echo'<script>window.location="../masuk.php"</script>';
}
?>