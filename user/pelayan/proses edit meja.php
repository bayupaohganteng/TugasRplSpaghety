<?php
	include("../../koneksi/koneksi.php");

	$idmeja = $_POST["idmeja"];
	$namameja = $_POST["nama"];
	$status = $_POST["status"];
	$idpegawai = $_GET["id"];

	$query = "UPDATE meja SET nama_meja = '$namameja', status = '$status' WHERE id_meja = '$idmeja'";
	if (!empty($idmeja) && !empty($namameja) && !empty($status) ) {
		$mysql = mysql_query($query);
		if ($mysql) {
			?><script> alert ('Ubah data berhasil'); </script><?php
			echo '<meta http-equiv="Refresh" content="0; url=tampil meja.php">';
		} else {
			?><script> alert ('Ubah data gagal');history.go(-1);</script><?php
		}
	} else {
		?><script> alert ('Semua data harus diisi');history.go(-1);</script><?php
	}
?>
