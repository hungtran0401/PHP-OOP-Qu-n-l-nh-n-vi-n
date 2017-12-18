<!DOCTYPE html>
<html>
<head>
	<title>Quan li nhan vien</title>
	

	
</head>
<body>
<?php 
include "Nhan_vien.php";
	if(isset($_POST['ok']))
	{
		$ten= $_POST['ten'];
		$sc= $_POST['sc'];
		$ns= $_POST['ns'];
		$nvl= $_POST['nvl'];
		$gt= $_POST['gt'];
		$hsl= $_POST['hsl'];
		$lnv= $_POST['lnv'];
		
		$snv= $_POST['snv'];
		$ssp= $_POST['ssp'];

		
		if(isset($_POST['tc']))
		{
			$tc=$_POST['tc'];
		}else{
			$tc="khong";
		}

		if($lnv == "vp")
		{
			$nv= new NhanVienVanPhong($ten,$sc,$ns,$nvl,$gt,$hsl,$snv);

		}
		else
		{
			$nv= new NhanVienSanXuat($ten,$sc,$ns,$nvl,$gt,$hsl,$ssp,$tc);
		}

		$tienluong= $nv->tienLuong();
		$trocap= $nv->troCap();
		$thuclanh= $tienluong+$trocap;

	}




 ?>
<div style="width:800px;margin: auto;">

<form action="quanlinhanvien.php" method="post">
	<table style="text-align: center;border-collapse: collapse; " border="1">
		<tr>
			<td colspan="4"><h1>QUAN LI NHAN VIEN</h1></td>
		</tr>
		<tr>
			<td>Ho va ten</td>
			<td><input type="text" name="ten"></td
			>
			<td>So con</td>
			<td><input type="text" name="sc"></td>
		</tr>
		<tr>
			<td>Ngay sinh</td>
			<td><input type="text" name="ns"></td>
			<td>Ngay vao lam</td>
			<td><input type="text" name="nvl"></td>
			
		</tr>
		<tr>
			<td>Gioi tinh</td>
			<td><input type="radio" name="gt" value="nam">Nam <input type="radio" name="gt" value="nu">Nu</td>
			<td>He so luong</td>
			<td><input type="text" name="hsl"></td>
		</tr>
		<tr>
			<td>Loai nhan vien</td>
			<td><input type="radio" name="lnv" class="vp" value="vp">Van phong</td>
			<td><input type="radio" name="lnv" value="sx">San xuat</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>So ngay vang <input type="text" name="snv" size="5"></td>
			<td>So sp <input type="text" name="ssp" size="5" class="ssp"></td>

			<td>Tang ca <input type="checkbox" name="tc" value="co" class="tc"></td>

		</tr>

		<tr>
			<td>Tien luong</td>
			<td><input type="text"  value="<?php if(isset($_POST['ok'])) echo number_format($tienluong); ?>"></td>
			<td>Tro cap</td>
			<td><input type="text"  value="<?php if(isset($_POST['ok'])) echo number_format($trocap); ?>"></td>
		</tr>

		<tr>
			<td colspan="4">Thuc lanh <input type="text" value="<?php if(isset($_POST['ok'])) echo number_format($thuclanh); ?>" ></td>
		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="ok" ></td>
		</tr>
	</table>
</form>
</div>


</body>
</html>