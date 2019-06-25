<?php 
include 'class.php';

$id = $_GET["id"];

$detail = $member->ambil_data($id);

 ?>

 <pre><?php print_r($detail); ?></pre>

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
		<input type="text" name="nama"  class="form-control" value="<?php echo $detail['nama_member'] ?>">
	</div>
	<div class="form-group">
		<label>Kelamin</label>
		<select name ="kelamin" class="form-control">
			<option value="laki-laki" <?php if ($detail['kelamin']=="laki-laki") { echo "selected";}?>>Laki - laki</option>
			<option value="perempuan" <?php if ($detail['kelamin']=="perempuan") { echo "selected";}?>>Perempuan</option>
		</select>
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $detail['alamat']; ?>">
	</div>
	<div class="form-group">
	<img style="width: 200px" src="img/<?php echo $detail['foto'] ?>">	
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 

if (isset($_POST["ubah"])) {
	$hasil = $member->ubah($_POST[ "nama" ],$_POST["kelamin"],$_POST["alamat"],$_FILES["foto"],$id);
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