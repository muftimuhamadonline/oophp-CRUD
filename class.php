<?php 

$mysqli = new mysqli('localhost' , 'root' , '' , 'crud1');

class member 
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function tampil_data()
	{
		$query = $this->koneksi->query("SELECT * FROM member" );
		while ($pecah = $query->fetch_assoc())
		{
			$data[] = $pecah;

		}

		return $data;

	}

	function simpan($nama , $kelamin , $alamat , $foto)
	{
		$namafoto = $foto['name'];
		$formatnama = date("Y_m_d_H_i_s")."_".$namafoto;
		$lokasifoto = $foto["tmp_name"];
		$ekstensifoto = pathinfo($namafoto, PATHINFO_EXTENSION);
		$ekstensidiperbolehkan = array('jpg'  , 'png' , 'jpeg' ,'gif' , 'JPG' , 'PNG');


		if (in_array($ekstensifoto, $ekstensidiperbolehkan)) {
			
			move_uploaded_file($lokasifoto, "img/$formatnama");


			$this->koneksi->query("INSERT INTO member (nama_member, kelamin, alamat, foto) 
				VALUES ('$nama' , '$kelamin' ,'$alamat' ,'$formatnama')");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
		


	}
	function ambil_data($id) 
	{
		$ambil_data = $this->koneksi->query("SELECT * FROM member where id_member='$id'");
		$pecah = $ambil_data->fetch_assoc();

		return $pecah;
	}

	function hapus($id)
	{
		$ambildata = $this->ambil_data($id);
		$hapusfoto = $ambildata['foto'];

		if (file_exists("img/$hapusfoto"))
		{
			unlink("img/$hapusfoto" );
		}

		$this->koneksi->query("DELETE FROM member WHERE id_member='$id'");

		
	}

	function ubah($nama,$jk,$alamat,$foto,$id)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto["tmp_name"];
		if (!empty($lokasifoto)) 
		{
			$detail = $this->ambil_data($id);
			$hapusfoto = $detail['foto'];

			if (file_exists("img/$hapusfoto"))
			{
				unlink("img/$hapusfoto" );
			}
			$ekstensifoto = pathinfo($namafoto, PATHINFO_EXTENSION);
			$ekstensidiperbolehkan = array('jpg'  , 'png' , 'jpeg' ,'gif' , 'JPG' , 'PNG');
			if (in_array($ekstensifoto, $ekstensidiperbolehkan)) {
				$formatnama = date("Y_m_d_H_i_s")."_".$namafoto;
				move_uploaded_file($lokasifoto, "img/$formatnama");


				$this->koneksi->query("UPDATE member SET
					nama_member = '$nama',
					kelamin = '$jk',
					alamat = '$alamat',
					foto = '$formatnama'
					WHERE id_member='$id'

					");
				return "sukses";
			}
			else
			{
				return "gagal";
			}
			
		}
		else
		{

			$this->koneksi->query("UPDATE member SET
				nama_member = '$nama',
				kelamin = '$jk',
				alamat = '$alamat'
				WHERE id_member='$id'

				");
			return "sukses";
		}
	}

}

$member = new member($mysqli);
echo "<pre>";

echo "</pre>";
?>