<?php
if (session_id() === '')
    session_start();
require_once 'ketnoi.php';
if (isset($_GET['act']) && $_GET['act'] == "do")
{

$username =$_POST['username'];
$pass1 =$_POST['password'];
$pass =md5($pass1);
$password=strtoupper($pass);
$sql = "SELECT * FROM account WHERE username='{$username}'";
$result = mysqli_query($conn, $sql);
$member = mysqli_fetch_array($result);
// Nếu username này không tồn tại thì....
if ( @mysqli_num_rows($result ) <= 0 )
{
print "Tên truy nhập không tồn tại. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";
exit;
}

// Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
if ( $password != $member['password'] )
{
print "Nhập sai mật khẩu. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a>";

exit;
}

// Khởi động phiên làm việc (session)

$_SESSION['user_id'] = $member['username'];
$_SESSION['name'] = $member['hoten'];
$_SESSION['address'] = $member['address'];
$_SESSION['tichluy'] = $member['tichluy'];
$_SESSION['phone'] = $member['phone'];
$_SESSION['email'] = $member['email'];
setcookie("name", $member['username'], time() + 3600, "/");
setcookie("hoten", $member['hoten'], time() + 3600, "/");
setcookie("email", $member['email'], time() + 3600, "/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script>
<!--


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<script language="javascript">
<!--
document.forms[form1].onsubmit = function() {
if(this.elements['Password'].value != this.elements['Password2'].value) {
alert('Passwords do not match');
return false;
}

return true;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += ''+ +''; }
  } if (errors) alert('Bạn chưa nhập đầy đủ thông tin');
  document.MM_returnValue = (errors == '');
}
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
    <script src="js/jquery.validationEngine.js" type="text/javascript"></script>
    <script type="text/javascript" language="JavaScript">
        var activemenu_nav = "";
        var activesidenav = "";   
    var activedropmenu = "";
</script>
<script src="js/jquery-core.js" type="text/javascript" language="JavaScript"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Linh Kiện Máy Tính</title>
  <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-lower">LINH KIỆN MÁY TÍNH ĐĂNG KHOA</span>
  </h1>

  <!-- Navigation -->
  <?php include_once "header.php"?>
  
<?php if (isset($_SESSION['user_id']) &&isset($_SESSION['name']))
{
?>
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-lower">THÔNG TIN THÀNH VIÊN </span>
            </h2>
            <p class="mb-0">
            </p>
		
          </div>
		  
<div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <p class="mb-3"><form method="post" action="dangxuat.php" name="form1" onsubmit="return checkform()">
           <h3> Tài khoản: <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" value="<?php echo isset($_SESSION['user_id'])?$_SESSION['user_id']:""?>"name="username" placeholder="" size="30" readonly><br/>
            Tên thành viên: <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="name" value="<?php echo isset($_SESSION['name'])?$_SESSION['name']:""?>" size="30" readonly><br/>
	    Số điện thoại: <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="name" value="0<?php echo isset($_SESSION['phone'])?$_SESSION['phone']:""?>" size="30" readonly><br/>
	    Địa chỉ <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="name" value="<?php echo isset($_SESSION['address'])?$_SESSION['address']:""?>" size="30" readonly><br/>
	    Email: <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="name" value="<?php echo isset($_SESSION['email'])?$_SESSION['email']:""?>" size="30" readonly><br/>
	    <font color="blue">Tích lũy: <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="name" value="<?php echo isset($_SESSION['tichluy'])?$_SESSION['tichluy']:""?>" size="30" readonly></font><br/></h3>
  <p></p>
  <?php 
  if (isset($_GET['xacnhan']))
  {

    ?><input type="button" value="Xác nhận thanh toán"  id="btnNextStep" onclick="xacnhan();" class="btn btn-primary btn-xl">
    <?php
  }
  else  
  {
  ?><input type="submit" value="Thoát"  id="btnNextStep" onclick="MM_validateForm('Fone','','R','Name','','R');return document.MM_returnValue" class="btn btn-primary btn-xl">
  <?php }
  ?>
</form>
          </p>

        </div>
        </div>
      </div>
    </div>
  </section>
  <?php }
  else
  {?>
  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-lower">ĐĂNG NHẬP THÀNH VIÊN</span>
            </h2>
            <p class="mb-0">
            </p>
		
          </div>
		  
<div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <p class="mb-3"><form method="post" action="lienhe.php?act=do" name="form1" onsubmit="return checkform()">
            <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="username" placeholder="Tài khoản" size="30"><br/>
            <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="password" name="password" placeholder="Mật Khẩu" size="30"><br/>
  <p></p>
  <input type="submit" value="Đăng Nhập"  id="btnNextStep" onclick="MM_validateForm('Fone','','R','Name','','R');return document.MM_returnValue" class="btn btn-primary btn-xl">
</form>
          </p>
<p>Nếu bạn chưa có tài khoản xin mời <a href="dangky.php">Đăng Ký</a></p>
        </div>
        </div>
      </div>
    </div>
  </section>
<?php }?>
 <?php include"footer.php"?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/tuyetroi.js"></script>
<script>
  function xacnhan()
  {
    <?php 
    if (isset($_COOKIE['email'])) 
        {
            $sql="DELETE FROM hoadon WHERE email='".$_COOKIE['email']."'";
            $delete = mysqli_query($conn, $sql);
        }
    ?>
    alert('Đơn đặt hàng của bạn đã được xử lý mời bạn xem lại giỏ hàng');
    window.location.href='cart.php';        
  }
</script>
</body>

</html>
