<!doctype html>
<?php
	include("../../koneksi/koneksi.php");
	session_start();
	$idpegawai = $_SESSION['idpegawai'];
	$nama = $_SESSION['nama_pegawai'];
	$jabatan = $_SESSION['jabatan'];
	$foto = $_SESSION['foto'];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Resto Broto Cook-Eat-Sleep">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - Resto Broto</title>

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
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="mdi mdi-magnify"></i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search" />
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
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
          <a class="mdl-navigation__link" href="index.php"><i class="mdi mdi-home"></i>Home</a>
          <a class="mdl-navigation__link" href="tampil pegawai.php"><i class="mdi mdi-account-multiple"></i>Kelola Pegawai</a>
          <a class="mdl-navigation__link" href="tampil jabatan.php"><i class="mdi mdi-file"></i>Kelola Jabatan</a>
          <div class="mdl-layout-spacer"></div>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <center>
            <!-- tabel pegawai -->
            <table class="mdl-data-table mdl-js-data-table">
              <thead>
                <tr>
                  <th class="mdl-data-table__cell--non-numeric">NIP</th>
                  <th class="mdl-data-table__cell--non-numeric">Nama</th>
                  <th class="mdl-data-table__cell--non-numeric"></th>
                </tr>
              </thead>
              <tbody>
              <?php
				$query = 'SELECT * FROM pegawai';
			  	$mysql = mysql_query($query);
				while($row = mysql_fetch_array($mysql)){
			  ?>
                <tr>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $row['id_pegawai'];?></td>
                  <td class="mdl-data-table__cell--non-numeric"><?php echo $row['nama_pegawai'];?></td>
                  <td>
                  						<a id="desc" class="mdl-button mdl-js-button mdl-button--icon" href="detail pegawai.php?id=<?php echo $row['id_pegawai'];?>">
                  						  <i class="mdi mdi-account"></i>
                  						</a>
                  						<div class="mdl-tooltip" for="desc">
                  							Tampilkan Detail Pegawai
                  						</div>
                  						<a id="edit" class="mdl-button mdl-js-button mdl-button--icon" href="edit pegawai.php?id=<?php echo $row['id_pegawai'];?>">
                  						  <i class="mdi mdi-tooltip-edit"></i>
                  						</a>
                  						<div class="mdl-tooltip" for="edit">
                  							Edit Pegawai
                  						</div>
                  						<a id="hapus" class="mdl-button mdl-js-button mdl-button--icon" href="proses hapus pegawai.php?id=<?php echo $row['id_pegawai'];?>">
                  						  <i class="mdi mdi-delete"></i>
                  						</a>
                  						<div class="mdl-tooltip" for="hapus">
                  							Hapus Pegawai
                  						</div>
                  					  <br>
                 </td>
                </tr>
              <?php
				}
			  ?>
              </tbody>
            </table>
            <!--/ tabel pegawai -->
          </center>
          </div>

        </div>
      </main>
    </div>
      <a href="tambah pegawai.php" id="view-source">
        <!-- Colored FAB button with ripple -->
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="mdi mdi-plus"></i>
          </button>
      </a>
    <script src="../../js/material.min.js"></script>
  </body>
</html>
