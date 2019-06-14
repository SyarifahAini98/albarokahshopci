<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=243&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);

  /*
  for ($k=0; $k < count($data['rajaongkir']['results']); $k++){
  

    echo "<li='".$data['rajaongkir']['results'][$k]['code']."'>".$data['rajaongkir']['results'][$k]['service']."</li>";
  	//echo $data['rajaongkir']['results'][$k]['code'];
  }
  */
  //echo $data['rajaongkir']['results']['costs']['service'];
}
?>

<?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir : <?php echo strtoupper($courier); ?>

<?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
?>
	 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
		 <table class="table table-striped">
			 <tr>
				 <th>No.</th>
				 <th>Jenis Layanan</th>
				 <th>Perkiraan</th>
				 <th>Tarif</th>
				 <th>Aksi</th>
			 </tr>
			 <?php
			 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {			 
			 ?>
			 <tr>
				 <td><?php echo $l+1;?></td>
				 <td>
					 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
					 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
				 </td>
				 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> hari</td>
				 <td align="right">Rp <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></td>
				 <td><!-- <a href="<?= base_url('beranda_pelanggan/pesan_sekarang/$data['rajaongkir']['results'][$k]['costs'][$l]['service']/$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']/$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']');?>"> -->Pesan</a></td>
			 </tr>
			 <?php
			 }
			 ?>
		 </table>
	 </div>
 <?php
 }
 ?>