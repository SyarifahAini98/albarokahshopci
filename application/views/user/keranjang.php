
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
             <a href="javascript: history.go(-1)"><button type="button" class="btn btn-default">Kembali</button></a>
             <input type="button" class ='btn btn-default' value="Kosongkan" onclick="clear_cart()">
        <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'Untuk menambah produk ke keranjang silahkan klik pada tombol "Tambah"'; 
             }  ?>
             <table width="75%" border="0" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                  <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                    <tr>
                        <td><center>Kode Produk</center></td>
                        <td><center>Nama Produk</center></td>
                        <td><center>Harga</center></td>
                        <td><center>Qty</center></td>
                        <td><center>Jumlah Harga</center></td>
                        <td><center>Aksi</center></td>
                    </tr>
                    <?php
                     // Create form and send all values in "beranda_pelanggan/update_cart" function.
                    echo form_open('beranda_pelanggan/update_cart');
                    $grand_total = 0;
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
                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: center"'); ?>
                            </center></td>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>
                                Rp <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                            <td>
                              
                            <?php 
                            // cancle image.
                            $path = "<img src='http://localhost/albarokahshopci/assets/img/hapus.png' width='25px' height='20px'>";
                            echo anchor('beranda_pelanggan/remove/' . $item['rowid'], $path); ?>
                            </td>
                     <?php endforeach; ?>
                    </tr>
                    <tr><td colspan="5">&nbsp;</tr>
                    <tr>
                        <td colspan="4" align="right"><b>Sub Total:</b></td><td align="left"><b>Rp <?php 
                        
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></b></td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                        <td></td>
                    </tr>
                    <tr><td colspan="5">&nbsp;</tr>
                    <tr>
                        <td></td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                        <td colspan="5" align="right">
                            
                            <?php //submit button. ?>
                            <input type="submit" class ='btn btn-success' value="Perbarui">
                            <?php echo form_close(); ?>
                            
                            <!-- "Place order button" on click send "billing" controller  -->
                            <input type="button" class ='btn btn-primary' value="Checkout" onclick="window.location = 'beranda_pelanggan/billing_view'"></td>
                    </tr>
<?php endif; ?>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->