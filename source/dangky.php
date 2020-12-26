<?php
session_start(); 
require_once 'ketnoi.php';
$_SESSION['ma']=rand(1000000,9999999);
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
  <?php include "header.php"?>
  

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-lower">ĐĂNG KÝ THÀNH VIÊN</span>
            </h2>
            <p class="mb-0">
            </p>
		
          </div>
		  
<div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <p class="mb-3"><form method="post" action="dangki.php" name="form1" onsubmit="return checkform()">
            <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="username" placeholder="Tài khoản" size="30"><br/>
            <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="password" name="password" placeholder="Mật Khẩu" size="30"><br/>
  <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="hoten" placeholder="Họ và tên" size="30"><br/>
  <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="text" name="diachi" placeholder="Địa chỉ" size="30"><br/>
  <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="number" name="dienthoai" placeholder="Số điện thoại" style="width: 220px"><br/>
  <input class="validate[required,custom[noSpecialCaracters],length[3,30]] text-input" type="email" name="email" placeholder="Email" size="30"><br/>
  <input type="number" id="txtVerify" size="30" maxlength="7" name="txtVerify" placeholder="Mã Captcha" style="width: 220px"/><br/><br/>
  <font color="#FFFFFF" size="5" style="background-color:#3366FF"><?php echo ($_SESSION['ma']);?></font>
  <p></p>
  <input type="submit" value="Đăng Ký"  id="btnNextStep" onclick="MM_validateForm('Fone','','R','Name','','R');return document.MM_returnValue" class="btn btn-primary btn-xl">
</form>
          </p>

        </div>
        </div>
      </div>
    </div>
  </section>

 <?php include"footer.php"?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/tuyetroi.js"></script>
</body>

</html>
