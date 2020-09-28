<?php 

//Jual Produk, komik, game

class Produk {
	public 	$judul,
			$penulis,
			$penerbit;

	protected$diskon = 0;

	private $harga;
			

	//Method		
	 public function __construct($judul = "Judul belum dimasukkan",$penulis = "Penulis belum dimasukkan",$penerbit = "Penerbit belum dimasukkan",$harga = 0){ 
	 	$this->judul = $judul;
	 	$this->penulis = $penulis;
	 	$this->penerbit = $penerbit;
	 	$this->harga = $harga;
	 
	 } 


	 public function getHarga(){

		return $this->harga - ($this->harga * $this->diskon/100);
	 }

	 public function getLabel(){
	 	return "$this->penulis, $this->penerbit";
	 }

	 public function getInfoProduk(){
	 	$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

	 	return $str;
	 }
}


//Child Class

//KOMIK
class Komik extends Produk {
	public $jmlHalaman;

	//konstruktor untuk kelas komik
	public function __construct($judul = "Judul belum dimasukkan",$penulis = "Penulis belum dimasukkan",$penerbit = "Penerbit belum dimasukkan",$harga = 0, $jmlHalaman = 0){

		parent:: __construct($judul,$penulis,$penerbit,$harga);

		$this->jmlHalaman = $jmlHalaman;

	}

	public function getInfoProduk() {
		$str = "Komik : ". parent::getInfoProduk()." - {$this->jmlHalaman} Halaman.";
		return $str;
	}
}


//GAME
class Game extends Produk{

	public $waktuMain;

	//konstruktor untuk kelas komik
	public function __construct($judul = "Judul belum dimasukkan",$penulis = "Penulis belum dimasukkan",$penerbit = "Penerbit belum dimasukkan",$harga = 0, $waktuMain = 0){

		parent:: __construct($judul,$penulis,$penerbit,$harga);

		$this->waktuMain = $waktuMain;
	}


	public function setDiskon($diskon){
	 	$this->diskon = $diskon;
	 }

	public function getInfoProduk(){
		$str = "Game : " . parent::getInfoProduk(). " - {$this->waktuMain} Jam. ";
		return $str;
	}
}



class CetakInfoProduk{
	public function cetak( Produk $produk){
		$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
		return $str;
	}
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonan Jump",30000,100);
$produk2 = new Game("Uncharted","Neil Druckman","Sony Computer",250000,50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";


$produk2->setDiskon(50);
echo $produk2->getHarga();





























