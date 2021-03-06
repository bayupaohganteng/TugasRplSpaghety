<!doctype html>
<?php
	include("../../koneksi/koneksi.php");
	session_start();
	$idpegawai = $_SESSION['id_pegawai'];
	$nama = $_SESSION['nama_pegawai'];
	$id_jabatan = $_SESSION['idjabatan'];
	$jabatan = $_SESSION['nama_jabatan'];
	$foto = $_SESSION['foto'];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Resto Broto Cook-Eat-Sleep">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pantry - Resto Broto</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link rel="stylesheet" href="../../css/material.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="../../css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--primary mdl-color--white mdl-color-text--white-600">
        <div class="mdl-layout__drawer-button"><i class="mdi mdi-menu"></i></div>
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Dasboard</span>
          <div class="mdl-layout-spacer"></div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="mdi mdi-dots-vertical"></i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
						<li class="mdl-menu__item"><a href="../../koneksi/logout.php">Log Out</a></li>
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="../../img/pegawai/<?php echo $foto;?>" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span><?php echo $nama;?> <br> <?php echo $jabatan;?></span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="index.php"><i class="mdi mdi-home"></i>Dasboard</a>
          <a class="mdl-navigation__link" href="tampil bahan baku.php"><i class="mdi mdi-pig"></i>Kelola Bahan Baku</a>
          <div class="mdl-layout-spacer"></div>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content"><!--  -->
          <div class="demo-cards mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--red-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--4-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                <h3>Bahan Baku Yang Habis</h3>
                <ul>
<?php
 $query="select * from bahanbaku where stok <= 0";
 $mysql=mysql_query($query);
 while($row=mysql_fetch_array($mysql)){
?>
				<li>
                    <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox1" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label"><?php echo $row["nama_bahan"];?></span>
                    </label>
                  </li>
<?php
 }
?>
				  </ul>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--4-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                <h3>Bahan Baku Yang Hampir Habis</h3>
                <ul>
<?php
 $query="select * from bahanbaku where stok <= stok_minimum";
 $mysql=mysql_query($query);
 while($row=mysql_fetch_array($mysql)){
?>
				<li>
                    <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox1" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label"><?php echo $row["nama_bahan"];?></span>
                    </label>
                  </li>
<?php
 }
?>                </ul>
              </div>
            </div>
          </div>
          <div class="demo-cards mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--red-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--4-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                <h3>Bahan Baku Yang Kadaluarsa</h3>
                <ul>
<?php
 $query="select * from bahanbaku where curdate() > tgl_kadaluarsa";
 $mysql=mysql_query($query);
 while($row=mysql_fetch_array($mysql)){
?>
				<li>
                    <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox1" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label"><?php echo $row["nama_bahan"];?></span>
                    </label>
                  </li>
<?php
 }
?>
                </ul>
              </div>
            </div>
              </li>
                 </ul>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="../../js/material.min.js"></script>
  </body>
</html>
