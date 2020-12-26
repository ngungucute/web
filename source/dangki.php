<?php
session_start();
include_once("ketnoi.php");
include_once("mahoa.php");

if (!isset($_SESSION['ma']))
{
	echo "<script language=Javascript1.1>alert(\"Truy cập bị từ chối.\");</script>";
	echo("<script language='JavaScript'>window.top.location='dangky.php';</script>"); 
	exit;
}
else
{
	$taikhoan=$_POST['username'];
	$email=$_POST['email'];
	$ten=$_POST['hoten'];
	$diachi=$_POST['diachi'];
$pas = $_POST['password'];
$pas1 = md5($pas);
	$matkhau=strtoupper($pas1);
	$fone=$_POST['dienthoai'];
	$ma=$_POST['txtVerify'];
	sqlsafe($taikhoan);
	sqlsafe($email);
	sqlsafe($matkhau);
	sqlsafe($ma);
}
if ($ma<>$_SESSION['ma'])
	{
		echo "<script language=Javascript1.1>alert(\"Bạn đã nhập sai mã bảo vệ. Quay về trang đăng kí...\");</script>";
		echo("<script language='JavaScript'>window.top.location='dangky.php';</script>"); 
		exit; 
	}
else
{

	$sql="select username from account where username='$taikhoan'";
	$row=mysqli_query($conn, $sql);
	$num_row=mysqli_num_rows($row);
	if ($num_row==0)
	{
		$sql="INSERT INTO account(username,password,email,phone,quyen,tichluy,hoten,status,address) VALUES ('$taikhoan','$matkhau','$email','$fone','1','0','$ten','1','$diachi');";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		echo "<script language=Javascript1.1>alert(\"Bạn đã đăng kí thành công. Chuyển đến trang đăng nhập...\");</script>";
		echo("<script language='JavaScript'>window.top.location='lienhe.php';</script>"); 
	}
	else
	{
		echo "<script language=Javascript1.1>alert(\"Tài khoản đã được sử dụng. Quay về trang đăng kí...\");</script>";
		echo("<script language='JavaScript'>window.top.location='dangky.php';</script>"); 
		
	}
}
?>
