<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Al - Barokah Shop</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/');?>css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="<?= base_url('assets/');?>css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="<?= base_url('assets/');?>ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="<?= base_url('assets/');?>css/style.css" rel="stylesheet" />
    <style type="text/css">
    .anic {
      -webkit-animation: fade-in 0.27s linear infinite alternate;
      -moz-animation: fade-in 0.27s linear infinite alternate;
      animation: fade-in 0.27s linear infinite alternate;
    }
    @-moz-keyframes fade-in {
      0% {
        opacity: 0;
      }
      65% {
        opacity: 1;
      }
    }
    @-webkit-keyframes fade-in {
      0% {
        opacity: 0;
      }
      65% {
        opacity: 1;
      }
    }
    @keyframes fade-in {
      0% {
        opacity: 0;
      }
      65% {
        opacity: 1;
      }
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong>Al - Barokah</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= base_url('auth');?>">Masuk</a></li>
                    <li><a href="#">Daftar</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>No. HP : </strong>089695356694</a></li>
                            <li><a href="#"><strong>Email : </strong>albarokahshop@gmail.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Alamat : </strong>
                                <div>
                                    Jalan Raya No. 15 Tempeh - Kab. Lumajang,<br />
                                    Jawa Timur, Indonesia
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Cari Produk..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <!-- <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !                
              
               
                </div> -->
                <div class="main box-border">
                    <div id="mi-slider" class="mi-slider">
                        <ul>
                            <?php
                            $no=1;
                            foreach ($data1 as $row):
                            ?>
                            <li><a href="#">
                                <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="Alat_Musik"><h4><?= $row->nama_produk;?></h4>
                            </a></li>
                            <?php $no++;
                            endforeach;?>
                        </ul>
                        <ul>
                            <?php
                            $no=1;
                            foreach ($data2 as $row):
                            ?>
                            <li><a href="#">
                                <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="Alat_Pancing"><h4><?= $row->nama_produk;?></h4>
                            </a></li>
                            <?php $no++;
                            endforeach;?>
                        </ul>
                        <ul>
                            <?php
                            $no=1;
                            foreach ($data3 as $row):
                            ?>
                            <li><a href="#">
                                <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="Alat_Olahraga"><h4><?= $row->nama_produk;?></h4>
                            </a></li>
                            <?php $no++;
                            endforeach;?>
                        </ul>
                        <nav>
                            <a href="#">Alat Musik</a>
                            <a href="#">Alat Pancing</a>
                            <a href="#">Alat Olahraga</a>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            
            <div class="col-md-3 text-center">
                <?php
                $no=1;
                foreach ($data4 as $row):
                ?>
                <div class=" col-md-12 col-sm-6 col-xs-6" >
                    <div class="offer-text">
                        <div class="anic">TOP <?php echo $no;?></div>
                    </div>
                    <div class="thumbnail product-box">
                        <img src="<?= base_url('assets/');?>img/images_produk/<?= $row->foto;?>" alt="" style="height:80px; width:80px;"/>
                        <div class="caption">
                            <h3><a href="#"><?= $row->nama_produk;?></a></h3>
                            <p>Harga : <strong>Rp <?= $row->harga_produk;?></strong></p>
                            <p><a href="#"><?= $row->merek;?></a></p>
                        </div>
                    </div>
                </div>
                <?php $no++;
                endforeach;?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->