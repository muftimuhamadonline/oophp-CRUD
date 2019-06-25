<?php 

include 'class.php';

$semuadata = $member->tampil_data();
echo "<pre>";
print_r($semuadata);
print_r($member->tampil_data());
echo "</pre>";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tampil Data</title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 </head>
 <body>
 
 <div class="container">	
 <h2>DATA</h2>
 	
 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama</th>
 			<th>Kelamin</th>
 			<th>Alamat</th>
 			<th>Foto</th>
 			<th>Aksi</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($semuadata as $key => $value): ?>
 			
 		<tr>
 			<td><?php echo $key+1; ?></td>
 			<td><?php echo $value['nama_member']; ?></td>
 			<td><?php echo $value['kelamin']; ?></td>
 			<td><?php echo $value['alamat']; ?></td>
 			<td><img style="width: 150px" src="img/<?php echo $value['foto']; ?>"></td>
 			<td>
 				<a href="hapus.php?id=<?php echo $value['id_member'] ?>" class="btn-sm btn-danger">Hapus</a>
 				<a href="ubah.php?id=<?php echo $value['id_member'] ?>" class="btn-sm btn-warning">Ubah</a>
 			</td>

 		</tr>
 	
 		<?php endforeach ?>
 	</tbody>
 </table>
 
 <a class="btn btn-primary" href="tambah_data.php">Tambah Data</a>
 </div>
 </body>
 </html>