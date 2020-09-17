<?php 
require 'fungsi/functions.php';

if (isset($_GET['cari'])) {
	$keyword = $_GET['s'];
	$smartphone = query("SELECT * FROM smartphone WHERE 
		foto LIKE '%$keyword%' OR
		nama LIKE '%$keyword%' OR
		tahun LIKE '%$keyword%' OR
		ukuran LIKE '%$keyword%' OR
		memori LIKE '%$keyword%' OR
		kamera LIKE '%$keyword%' OR
		harga LIKE '%$keyword%' ");
} else{
	$smartphone = query("SELECT * FROM smartphone");
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tugas Besar</title>
</head>
<style>
	*{
		padding: 0;
		margin: 0;
	}
	.login{
		height: 50px;
		text-align: right;
		background-color: #ed4977;
		line-height: 50px;
		font-size: 24px;
	}
	.login a{
		font-weight: bold;
		font-family: arial;
		background-color: #f2baca;
		color: #ed4977;
	}
	.container{
		background-color: #ffe8ed;
		margin:auto;
		padding-bottom: 30px;


	}
	h3{
		text-align: center;
		color: #ed315b;
		padding-top: 20px;
		padding-bottom: 40px;
		font-size: 42px;
		background-color: #f9acbd;
		border-radius: 70px;
		width: 800px;
		margin:auto;
	}
	table{
		margin: auto;
		text-align: center;
		background-color: #f8d6fc;
		color: #a000b2;
		border-color: white;
	}
	a{
		text-decoration: none;
		color: #a000b2;
		padding: 10px;
	}
	td{
		padding: 10px;
		font-weight: bold;
	}
	th{
		padding: 10px;
		font-weight: bold;
		background-color: #a000b2;
		color:  #f8d6fc;;
	}
	.tambah{
		margin-left: 550px;
		margin-bottom: 40px;
		padding: 10px;
		background-color: #a100ff;
		color: white;
	}
	.search{ 
		width: 300px;
		height: 60px;
		margin-left:550px; 
	}
	.search input{
		height: 20px;
		width: 150px;
	}
	.search button{
		width: 40px;
		height: 30px;
		background-color: #700ea5;
		color: white;
	}

</style>
<body>
	<div class="login">
		<a href="admin/login.php">Log in as Admin</a>
	</div>
	<div class="container">
		<h3>Daftar Smartphone</h3>

	<a href="admin/tambah.php"><button type="submit" class="tambah">Tambah Data Smartphone</button></a>

	<div class="search">
		<form action="" method="get">
			<input type="text" name="s" id="s" class="form-control" placeholder="Search...">
			<button type="submit" name="cari" id="cari">Cari</button>
		</form>	
	</div>
	

	<table border="0">
		<tr>
			<th>SUMAHO UPDATE</th>
	
		</tr>
	<?php if (empty($smartphone)): ?>
		<tr>
			<td colspan="7">
				<h1 align="center">Data Tidak ditemukan</h1>
			</td>
		</tr>
	<?php else : ?>
	<?php foreach ($smartphone as $hp):?>
		<tr>
			<td><a href="user/profile.php?id=<?= $hp['id']?>"><img src="assets/img/<?= $hp['foto']; ?>" width="100px"></a></td>
			
		</tr>
		<tr>
			<td><a href="user/profile.php?id=<?= $hp['id']?>"><?= $hp['nama']; ?></a></td>
		</tr>
	<?php endforeach ?>
<?php endif ?>
	</table>	
	</div>
	
</body>
</html>
