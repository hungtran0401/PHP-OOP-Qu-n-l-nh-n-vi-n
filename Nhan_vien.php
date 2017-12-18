<?php 
class NhanVien{
	var $hoten;
	var $socon;
	var $ngaysinh;
	var $ngayvaolam;
	var $phai;
	var $hsluong;
	private $thamnien= 0;
	static $luongcoban=1500000;

	public function __construct($hoten,$socon,$ngaysinh,$ngayvaolam,$phai,$hsluong)
	{
		$this->hoten= $hoten;
		$this->socon= $socon;
		$this->ngaysinh= $ngaysinh;
		$this->ngayvaolam= $ngayvaolam;
		$this->phai= $phai;
		$this->hsluong= $hsluong;
	}

	public function troCap()
	{
		$trocap=0;
		$trocap= $this->socon * 200000;
		return $trocap;
	}

	public function tienLuong()
	{
		$tienluong= 0;
		$tienluong= $this->hsluong * NhanVien::$luongcoban;
		return $tienluong;
	}

	public function thamNien()
	{
		
		$this->thamnien= date('Y')-date('Y',strtotime($this->ngayvaolam));
		return $this->thamnien;
	}
}

class NhanVienVanPhong extends NhanVien
{
	var $songayvang= 0;
	static $dinhmucvang= 2;
	static $dongiaphat= 25000;

	public function __construct($hoten,$socon,$ngaysinh,$ngayvaolam,$phai,$hsluong,$songayvang)
	{
		parent::__construct($hoten,$socon,$ngaysinh,$ngayvaolam,$phai,$hsluong);
		$this->songayvang= $songayvang;
	}

	public function tienPhat()
	{
		$tienphat= 0;
		if($this->songayvang > NhanVienVanPhong::$dinhmucvang)
		{
			$tienphat= ($this->songayvang - NhanVienVanPhong::$dinhmucvang)*NhanVienVanPhong::$dongiaphat;
		}
		return $tienphat;
	}

	public function troCap()
	{
		$trocap= parent::troCap();
		if($this->phai == "nu"){
			$trocap= $trocap * 1.2;
		}
		return $trocap;
	}

	public function tienLuong()
	{
		$tienluong= parent::tienLuong();
		$tienluong= $tienluong - $this->tienPhat();
		return $tienluong;
	}
		
}

class NhanVienSanXuat extends NhanVien
{
	var $sosp=0;
	static $dinhmucsp= 500;
	static $dongiasp= 12000;
	var $tangca;

	public function __construct($hoten,$socon,$ngaysinh,$ngayvaolam,$phai,$hsluong,$sosp,$tangca)
	{
		parent::__construct($hoten,$socon,$ngaysinh,$ngayvaolam,$phai,$hsluong);
		$this->sosp= $sosp;
		$this->tangca= $tangca;
	}

	public function tienThuong()
	{
		
		if($this->sosp > NhanVienSanXuat::$dinhmucsp){
			$tienthuong= ($this->sosp - NhanVienSanXuat::$dinhmucsp)*NhanVienSanXuat::$dongiasp*0.05;
		}else{
			$tienthuong= ($this->sosp - NhanVienSanXuat::$dinhmucsp)*NhanVienSanXuat::$dongiasp*0.01;
		}
		return $tienthuong;
	}

	public function troCap()
	{
		$trocap= parent::troCap();
		if($this->tangca == "co"){
			$trocap= $trocap + 200000;
			// $trocap += 200000;
		}
		return $trocap;
	}

	public function tienLuong()
	{
		$tienluong= $this->sosp * NhanVienSanXuat::$dongiasp + $this->tienThuong();
		return $tienluong;
	}
}


 ?>