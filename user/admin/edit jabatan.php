<!doctype html>
<?php
	include("../../koneksi/koneksi.php");
	session_start();
	$idpegawai = $_SESSION['id_pegawai'];
	$nama = $_SESSION['nama_pegawai'];
	$jabatan = $_SESSION['nama_jabatan'];
	$foto = $_SESSION['foto'];

	$idjabatan = $_GET['id'];
	$query = "SELECT * FROM jabatan WHERE id_jabatan = '$idjabatan'";
	$mysql = mysql_query($query);
	if ($row = mysql_fetch_array($mysql)) {
		$namajabatan = $row['nama_jabatan'];
		$gaji = $row['gaji'];
	}
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
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--primary mdl-color--white mdl-color-text--white-600">
        <div class="mdl-layout__drawer-button"><i class="mdi mdi-menu"></i></div>
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
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
          <a class="mdl-navigation__link" href="index.php"><i class="mdi mdi-home"></i>Home</a>
          <a class="mdl-navigation__link" href="tampil pegawai.php"><i class="mdi mdi-account-multiple"></i>Kelola Pegawai</a>
          <a class="mdl-navigation__link" href="tampil jabatan.php"><i class="mdi mdi-file"></i>Kelola Jabatan</a>
          <div class="mdl-layout-spacer"></div>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <!-- Form Tambah Jabatan-->
               <form role="form" action="proses edit jabatan.php" method="post" name="postform" enctype="multipart/form-data">
               <h4>Form Edit Jabatan</h4>
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <label for="idjabatan" class="mdl-textfield__label">Id Jabatan</label>
                   <input type="text" pattern="[J0-9]*" class="mdl-textfield__input" id="idjabatan" name="idjabatan" value="<?php echo $idjabatan;?>" readonly/>
                   <span class="mdl-textfield__error">Format : JXXX</span>
               </div>
               <br>
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <label for="namajabatan" class="mdl-textfield__label">Nama Jabatan</label>
                   <input type="text" pattern="[A-Za-z]*" class="mdl-textfield__input" id="namajabatan" name="namajabatan" value="<?php echo $namajabatan;?>"/>
                   <span class="mdl-textfield__error">Tidak boleh berupa angka atau simbol</span>
               </div>
               <br>
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <label for="gaji" class="mdl-textfield__label">Gaji (Rupiah)</label>
                   <input type="text" pattern="[0-9]*" class="mdl-textfield__input" id="gaji" name="gaji" value="<?php echo $gaji;?>"/>
                   <span class="mdl-textfield__error">Tidak boleh berupa huruf atau simbol</span>
               </div>
               <br>
               <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent " type="submit">Ubah Jabatan</button>

           </form>

           <!-- /form tambah pegawai-->
          </div>
        </div>
      </main>
    </div>
    <script src="../../js/material.min.js"></script>
  </body>
</html>
