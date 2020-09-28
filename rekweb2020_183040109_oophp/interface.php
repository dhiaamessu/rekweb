<?php 

//Jual Produk, komik, game
interface InfoProduk{
	public function getInfoProduk();
}
	 


abstract class Produk {
	protected $judul,
			$penulis,
			$penerbit,
			$harga,
			$diskon = 0;

			
	//Method		
	 public function __construct($judul = "Judul belum dimasukkan",$penulis = "Penulis belum dimasukkan",$penerbit = "Penerbit belum dimasukkan",$harga = 0){ 
	 	$this->judul = $judul;
	 	$this->penulis = $penulis;
	 	$this->penerbit = $penerbit;
	 	$this->harga = $harga;
	 
	 } 

	 //setter dan getter
	 //JUDUL
	 public function setJudul($judul){
	 	$this->judul = $judul;
	 }

	 public function getJudul(){
	 	return $this->judul;
	 }

	 //PENULIS
	 public function setPenulis($penulis){
	 	$this->penulis = $penulis;
	 }

	 public function getPenulis(){
	 	return $this->penulis;
	 }
	 //PENERBIT
	 public function setPenerbit($penerbit){
	 	$this->penerbit = $penerbit;
	 }

	 public function getPenerbit(){
	 	return $this->penerbit;
	 }

	 //DISKON
	 public function setDiskon($diskon){
	 	$this->diskon = $diskon;
	 }

	 public function getDiskon(){
	 	return $this->diskon;
	 }
	 //HARGA
	 public function setHarga($harga){
	 	$this->harga = $harga;
	 }

	 public function getHarga(){

		return $this->harga - ($this->harga * $this->diskon/100);
	 }

	 public function getLabel(){
	 	return "$this->penulis, $this->penerbit";
	 }

	 abstract public function getInfo();
}


//Child Class

//KOMIK
class Komik extends Produk implements InfoProduk{
	public $jmlHalaman;

	//konstruktor untuk kelas komik
	public function __construct($judul = "Judul belum dimasukkan",$penulis = "Penulis belum dimasukkan",$penerbit = "Penerbit belum dimasukkan",$harga = 0, $jmlHalaman = 0){

		parent:: __construct($judul,$penulis,$penerbit,$harga);

		$this->jmlHalaman = $jmlHalaman;

	}


	public function getInfo(){
	 	$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

	 	return $str;
	 }

	public function getInfoProduk() {
		$str = "Komik : ". $this->getInfo()." - {$this->jmlHalaman} Halaman.";
		return $str;
	}
}


//GAME
class Game extends Produk implements InfoProduk{

	public $waktuMain;

	//konstruktor untuk kelas komik
	public function __construct($judul = "Judul belum dimasukkan",$penulis = "Penulis belum dimasukkan",$penerbit = "Penerbit belum dimasukkan",$harga = 0, $waktuMain = 0){

		parent:: __construct($judul,$penulis,$penerbit,$harga);

		$this->waktuMain = $waktuMain;
	}


	 public function getInfo(){
	 	$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

	 	return $str;
	 }

	public function getInfoProduk(){
		$str = "Game : " . $this->getInfo(). " - {$this->waktuMain} Jam. ";
		return $str;
	}
}


//CetaInfo
class CetakInfoProduk{
	public $daftarProduk = array();

	public function tambahProduk(Produk $produk){
		$this->daftarProduk[] = $produk;
	}



	public function cetak(){
		$str = "DAFTAR PRODUK : <br>";

		foreach ($this->daftarProduk as $p) {
			$str .= "- {$p->getInfoProduk()} <br>";
		}


		return $str;
	}
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonan Jump",30000,100);
$produk2 = new Game("Uncharted","Neil Druckman","Sony Computer",250000,50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo$cetakProduk->cetak();


























