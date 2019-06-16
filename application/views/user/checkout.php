<!--     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
                <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                     <li><a href="<?= base_url('beranda_pelanggan');?>">Beranda</a></li>
                        <li><a href="<?= base_url('beranda_pelanggan/profil_pelanggan');?>">Profil</a></li>
                        <li>Keranjang</li>
                        <li><a href="<?= base_url('beranda_pelanggan/transaksi');?>">Transaksi</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <center>
               <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Apakah Anda yakin ingin mengosongkan keranjang?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>index.php/beranda_pelanggan/remove/all";
                } else {
                    return false; // cancel button
                }
            }
        </script>
    </center>
             <a href="javascript: history.go(-1)"><button type="button" class="btn btn-default">Kembali</button></a>
             <input type="button" class ='btn btn-default' value="Kosongkan" onclick="clear_cart()">
        <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo '<br><center>Untuk menambah produk ke keranjang silahkan klik pada tombol "Tambah"</center>'; 
             }  ?>
             <table width="100%" border="0" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                  <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                    <tr>
                        <td><b><center>Kode Produk</center></b></td>
                        <td><b><center>Nama Produk</center></b></td>
                        <td><b><center>Harga</center></b></td>
                        <td><b><center>Qty</center></b></td>
                        <td><b><center>Berat</center></b></td>
                        <td><b><center>Jumlah Harga</center></b></td>
                    </tr>
                    <?php
                     // Create form and send all values in "beranda_pelanggan/update_cart" function.
                    echo form_open('beranda_pelanggan/update_cart');
                    $grand_total = 0;
                    $berat_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        echo form_hidden('cart[' . $item['id'] . '][berat]', $item['berat']);
                        ?>
                        <tr>
                            <td>
                       <!-- <?php echo $i++; ?> -->
                      <center><?php echo $item['id']; ?></center>
                            </td>
                            <td>
                      <?php echo $item['name']; ?>
                            </td>
                            <td>
                                Rp <?php echo number_format($item['price'], 2); ?>
                            </td>
                            <td>
                                <center>
                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: center"disabled'); ?>
                            </center></td>
                            <td><center><?php echo $item['berat']; ?> gr</center></td>
                        <?php $grand_total = $grand_total + $item['subtotal'];
                        $berat_total = $berat_total+$item['berat']; ?>
                            <td>
                                Rp <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                     <?php endforeach; ?>
                    </tr>
                    <tr><td colspan="6">&nbsp;</tr>
                    <tr>
                        <td colspan="5" align="right"><b>Sub Total:</b></td><td align="left"><b>Rp <?php 
                        
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></b>
                      </td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                    </tr>
                    <tr><td colspan="6">&nbsp;</tr>
            </table>
            </center>

<div class="wrapper">
<div class="row">
    <div class="col-md-12">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- test -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-1762934784326172"
             data-ad-slot="6122588643"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title">Asal</h3>
                  </div>
                  <div class="panel-body">
            <select class="form-control" name="propinsi_asal" id="propinsi_asal" readonly>
            <option value="" selected="" disabled="">Jawa Timur</option>
            <?php $this->load->view('user/rajaongkir/getProvince'); ?>
          </select>
          <br>
          <select class="form-control" name="origin" id="origin" readonly>
            <option value="" selected="" disabled="">Lumajang</option>
          </select>
                  </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Tujuan</h3>
                  </div>
                  <div class="panel-body">
                    <select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan">
                        <option value="" selected="" disabled="">Pilih Provinsi</option>
                        <?php $this->load->view('user/rajaongkir/getProvince'); ?>
                    </select>
                    <br>
                    <select class="form-control" name="destination" id="destination">
                        <option value="" selected="" disabled="">Pilih Kota</option>
                    </select>
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Berat</h3>
                  </div>
                  <div class="panel-body">
                    <input type="text" name="berat" placeholder="gram" id="berat" class="form-control" value="<?=$berat_total?>" disabled="">
                    
                            <?php echo form_close(); ?>
<?php endif; ?><br>
                    <select class="form-control" name="courier" id="courier">
                        <option value="">Pilih Kurir</option>
                        <option value="jne" selected="">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                    <br>
                    <button type="button" onclick="tampil_data('data')" class="btn btn-info">Cek Ongkir</button>
                  </div>
                </div>
                <script>
                    function tampil_data(act){
                          var w = $('#origin').val();
                          var x = $('#destination').val();
                          var y = $('#berat').val();
                          var z = $('#courier').val();

                          $.ajax({
                              url: "rajaongkir/getCost",
                              type: "GET",
                              data : {origin: w, destination: x, berat: y, courier: z},
                              success: function (ajaxData){
                                  //$('#tombol_export').show();
                                  //$('#hasilReport').show();
                                  $("#hasil").html(ajaxData);
                              }
                          });
                      };
                </script>
            </div>

            <div class="col-md-8">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Hasil</h3>
                  </div>
                  <div class="panel-body">
                    <ol>
                        <div id="hasil">
                            
                        </div>
                    </ol>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>

<script>
$(document).ready(function(){

    $("#propinsi_asal").click(function(){
        $.post("<?php echo base_url(); ?>index.php/rajaongkir/getCity/"+$('#propinsi_asal').val(),function(obj){
            $('#origin').html(obj);
        });
            
    });

    $("#propinsi_tujuan").click(function(){
        $.post("<?php echo base_url(); ?>index.php/rajaongkir/getCity/"+$('#propinsi_tujuan').val(),function(obj){
            $('#destination').html(obj);
        });
            
    });

    /*
    $("#cari").click(function(){
        $.post("<?php echo base_url(); ?>index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
            $('#hasil').html(obj);
        });
    });

    */

    
});
</script>
</body>
</html>





                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->