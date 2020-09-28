<?php 
//DEFINE
define('NAMA', 'Ardhia Pramesti');
echo NAMA;

echo "<br>";

const UMUR = 20;
echo UMUR;

//DEFINE di dalam kelas
class Coba{
	const NAMA = 'Ardhia Pramesti';
}
echo "<br>";

echo Coba::NAMA;
echo "<br>";




// M A G I C - C O N S T A N T
//Baris ke berapa
echo __LINE__;
echo "<br>";

//Alamat File
echo __FILE__;
echo "<br>";

//nama fungsi
function coba(){
	return __FUNCTION__;
}
echo coba();
echo "<br>";

//nama kelas
class Coba{
	public $kelas = __CLASS__;
}
$obj = new Coba;
echo $obj->kelas;
