<?php 
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