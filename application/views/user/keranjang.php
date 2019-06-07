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
                    <?php
                    $no=0;
                    $total = 0;
                    $data=[
                        'items'=>'0',
                    ];
                    $this->session->set_userdata($data);
                    $items=$this->session->userdata('items');
                    foreach ($items as $key => $val):
                        $query = $this->db->query("SELECT * FROM produk where id_produk = '$key'");
                        $produk=$this->db->get_where('produk',['id_produk'=>$key])->row_array();
                        $jumlah_harga = $produk['harga_produk'] * $val;
                        $total += $jumlah_harga;
                        return $query->result();
                    ?>
               <center>
               <table border="1" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="15%">Kode Produk</td><td width="4%">:</td><td><?= $produk['id_produk'];?></td></tr>
                                <tr><td>Harga</td><td>:</td><td><strong><font color="orange"></font></strong></td></tr>
                                <tr><td>Qty</td><td>:</td><td></td></tr>
                                <tr><td>Berat</td><td>:</td><td></td></tr>
                                <tr><td>Jumlah Harga</td><td>:</td><td></td></tr>
                                <tr><td>Aksi</td><td>:</td><td></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3"></tr>
                               
                                    </td>
                                </tr>
                            </table>
                            </center>
                         <center>   <a href="<?= base_url('beranda_pelanggan/edit_profil');?>" class="btn btn-primary" role="button">Edit Profil</a>
            </center>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php $no++;
                    endforeach;?>
    </div>
    <!-- /.container -->
            </div>
            <!-- /.col -->
        