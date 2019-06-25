<?php 
include 'class.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
	<h2>TAMBAH DATA</h2>
<form enctype="multipart/form-data" method="POST">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama"  class="form-control">
	</div>
	<div class="form-group">
		<label>Kelamin</label>
		<select name ="kelamin" class="form-control">
			<option value="laki-laki">laki-laki</option>
			<option value="perempuan">perempuan</option>
		</select>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
<button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php 

if (isset($_POST["simpan"])) {
	$hasil = $member->simpan($_POST[ "nama" ],$_POST["kelamin"],$_POST["alamat"],$_FILES["foto"]);
	if ($hasil == 'sukses')
	 {
		echo "<script>alert('Data TERSIMPAN');</script>";
		echo "<script>location='tampil_data.php';</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal TERSIMPAN');</script>";
		echo "<script>location='tambah_data.php';</script>";
	}
}
 ?>
</div>
</body>
</html>