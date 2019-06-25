<?php 
include 'class.php';


// $id = $_GET["id"];


 $member->hapus($_GET["id"]);
// echo "<script>alert('Data Terhapus'); </script>";
echo "<script>location='tampil_data.php'; </script>";

 ?>





