<!DOCTYPE html>
<?php require_once('ketnoi.php');
include("lib/money.php");
if (isset($_GET["maloai"]))
	{
	$maloai = $_GET["maloai"];
	$sql = "SELECT * FROM sanpham where maloai='".$maloai."'";
	}
else
	$sql = "SELECT * FROM sanpham where maloai>'0'";
if (isset($_POST["nhonhat"]) && isset($_POST["lonnhat"]))
{
	if ($_POST["nhonhat"] > $_POST["lonnhat"])
	{
	$nho=$_POST["lonnhat"];
	$lon=$_POST["nhonhat"];
	 }
	 else
	 {
	 $nho=$_POST["nhonhat"];
	 $lon=$_POST["lonnhat"];
	 }
	 $sql=$sql." AND gia BETWEEN '".$nho."' AND '".$lon."'";
}
if (isset($_GET["tukhoa"]))
{
	$sql=$sql." AND (tensp LIKE '%".$_GET["tukhoa"]."%' or noidung LIKE '%".$_GET["tukhoa"]."%')";
}	
if (isset($_GET["sapxep"]))
{
	if($_GET["sapxep"] == 1)
		$sql=$sql." ORDER BY gia desc";
	else if ($_GET["sapxep"] == 2)
		$sql=$sql." ORDER BY gia asc";
}
$result = mysqli_query($conn, $sql);
if (!isset($_GET['page']))
	$page=1;
else
	{
	$page=$_GET['page'];
	}
?>
<html lang="vi">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Linh Kiện Máy Tính</title>
  <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
<link href="https://fonts.googleapis.com/css?family=Roboto:100:300,400,500,700,900|Material+Icons" rel="stylesheet">
<link href="css/layoutnew.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">
<script language='JavaScript' src="js/muahang.js"></script>
<script language='JavaScript' src="js/tuyetroi.js"></script>
</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-lower"><font color="#fafafa">CỬA HÀNG ĐĂNG KHOA</font></span>
  </h1>

  <!-- Navigation -->
  <?php include_once"header.php";?>



    <div id="bgcl">
<div class="css-1c5m4ef">
    <div class="css-vk8d40">
        <div class="css-3xkg4m">
            <div class="card-body css-0">
                <div class="css-1i95fzy">
                    <div id="js-sort-bar" class="css-1ay2tut"></div>
                    <div class="css-10x5fyr">
                        <div class="css-1otuq4n">Sắp xếp theo</div>
                        <div data-track-content="true" class="css-c24alm">
                            <div class="css-mau3c4"> </div><span class="css-f2ehsn">Khuyến mãi tốt nhất</span>
                            <div class="css-1amiyiu"></div><span class="css-1ymufg9">✓</span>
                        </div>
                        <div class="css-1jmutoi">
                            <div class="css-mau3c4"> </div><a href="xemhang.php?maloai=<?php echo isset($maloai)?$maloai:"all"?>&sapxep=2"><span class="css-f2ehsn">Giá tăng dần</span></a>
                        </div>
                        <div class="css-1jmutoi">
                            <div class="css-mau3c4"> </div><a href="xemhang.php?maloai=<?php echo isset($maloai)?$maloai:"all"?>&sapxep=1"><span class="css-f2ehsn">Giá giảm dần</span></a>
                        </div>

                        <div class="css-19ce4zn">
                            <div class="css-1ipix51">
                            	<form action="xemhang.php?<?php echo isset($maloai)?$maloai:"all"?>&sapxep=1" method="post">
                                <input type="number" maxlength="14" placeholder="Giá thấp nhất" value="<?php echo isset($nho)?$nho:""?>" id="nho" class="css-xu44b0" name="nhonhat">
                            </div>-
                            <div class="css-1ipix51">
                                <input type="number" maxlength="14" placeholder="Giá cao nhất" value="<?php echo isset($lon)?$lon:""?>" id="lon" class="css-xu44b0" name="lonnhat">
                            </div>
                         <input type="submit" style="background-color: #1435c3;
  border: none;
  color: white;
  padding: 4px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;" value="Tìm kiếm"></form>
                        </div>
                    </div>
                </div>
                <div class="css-u7sw6j">
                    <div class="card-body css-0">
                        <div class="css-rtde4j">
			<?php 
			$i=0;
			
			if (isset($result)) {
 while (
$row = mysqli_fetch_assoc($result))
 {
 $i++;
  if ($i >(10*($page-1)))
{
if ($i > (10*$page))
	break;
			?>
                            <a class="css-1rhapru" href="sanpham.php?id=<?php echo $row["masp"]?>&maloai=<?php echo $row["maloai"]?>">
                                <div class="product-card css-atjqcg">
                                    <div class="product-card__content css-mcowk8">
                                        <div class="css-cssveg">
                                            <div class="css-1u5p38b"></div>
                                            <div class="css-1trsi03">
                                                <picture style="max-height:214px;max-weight=214px">
                                                    <source srcset="img/<?php echo isset($row["hinh"])?$row["hinh"]:""?>" type="image/webp">
                                                        <source srcset="img/<?php echo isset($row["hinh"])?$row["hinh"]:""?>" type="image/png"><img class="lazyload css-jdz5ak" alt="<?php echo $row["tensp"]?>" data-src="" src="" loading="lazy" decoding="async">
                                                </picture>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="css-1qgxba5"><?php echo $row["tensp"]; echo "<br>";echo $row["noidung"]?></div>
					    <div class="css-uxu180"><div class="css-m5hv1w"><div class="css-nel2x3"><span class="css-1ou7728"><?php echo isset($row["gia"])?currency_format($row["gia"]):0 ?></span></div></div><div class="css-1vhjcbm"><span color="#61c94d" size="22" class="css-wsw0i8"></span></div></div>
                                            <div class="css-l9dhqu"> Mua Ngay</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                         <?php 			 
			 }
			 }
			 }
			 ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="css-4xljxh">
<nav class="css-5j5vrg"><ul class="css-19x39nn">
<a href="xemhang.php?<?php echo isset($maloai)?"maloai=$maloai":""?>&page=<?php echo $page>=2?$page-1:1?>"><li disabled="" data-track-content="true" data-content-region-name="paging" data-content-name="nextPage" class="css-4utbjj"><button aria-label="Previous page" class="css-1fxi79z"><span size="12" class="css-1szbwkf"></span></button></li></a>
<a href="xemhang.php?<?php echo isset($maloai)?"maloai=$maloai":""?>&page=1"><li  class="css-13f2byv"><button aria-label="Next page" class="<?php echo $page==1?"css-ijvf1b":"css-13r3jyl"?>">1</button></li></a>
<a href="xemhang.php?<?php echo isset($maloai)?"maloai=$maloai":""?>&page=2"><li class="css-15il98n"><button aria-label="Next page" class="<?php echo $page==2?"css-ijvf1b":"css-13r3jyl"?>">2</button></li></a>
<a href="xemhang.php?<?php echo isset($maloai)?"maloai=$maloai":""?>&page=3"><li class="css-15il98n"><button aria-label="Next page" class="<?php echo $page==3?"css-ijvf1b":"css-13r3jyl"?>">3</button></li></a>
<a href="xemhang.php?<?php echo isset($maloai)?"maloai=$maloai":""?>&page=4"><li class="css-15il98n"><button aria-label="Next page" class="<?php echo $page==4?"css-ijvf1b":"css-13r3jyl"?>">4</button></li></a>
<a href="xemhang.php?<?php echo isset($maloai)?"maloai=$maloai":""?>&page=<?php echo $page>=1?$page+1:1?>"><li data-track-content="true" data-content-region-name="paging" data-content-name="nextPage" class="css-1k2r91"><button class="css-1fxi79z"><span size="12" class="css-94s669"></span></button></li></a>
</ul></nav>
</div>
    </div>
    <!---->


<?php include"footer.php"?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

