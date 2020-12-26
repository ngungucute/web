<!DOCTYPE html >
<?php require_once('ketnoi.php');
include("lib/money.php");
if (isset($_GET['id']) && isset($_GET['maloai']))
{
    $id =$_GET['id'];
    $maloai=$_GET['maloai'];
}
    else
    {
        //$id=0;
	//$maloai=1;
	include"khongco.php";
    }
if (isset($_GET['id']) && isset($_GET['maloai']))
{
$sql = "SELECT * FROM sanpham where masp='".$id."' and maloai='".$maloai."'";
$sql1 = "select * from loaisp where maloai='".$maloai."'";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
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
<link href="css/layoutread.css" rel="stylesheet">
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
  <?php 
  include_once"header.php"?>



    <div id="bgcl">
    <?php 
			
$row1 = mysqli_fetch_assoc($result1);

			$i=0;
			if (isset($result)&&isset($result1)) {
 while (
$row = mysqli_fetch_assoc($result))
    if (isset($row)&&isset($row1))
    {
if ($i >=1)
 break;
 $i++;
 { 
$giamgia=(($row["gia"]/10)<500000?($row["gia"]/10):500000);
    ?>
    <div class="css-6l7rf5">
    <div class="css-1hwtax5">
        <div class="css-i22ydz">
            <div class="card-body css-0">
                <div class="css-4cffwv">
                    <div class="css-1i1dodm">
                        <div class="css-709yn1">
                            <div class="css-j662fd">
                                <div class="css-1idxzwd">
                                    <picture>
                                        <source srcset="img/<?php echo $row["hinh"]?>" type="image/webp">
                                            <source srcset="img/<?php echo $row["hinh"]?>" type="image/png"><img class="lazyload css-jdz5ak" alt="" data-src="img/<?php echo $row["hinh"]?>" src="img/<?php echo $row["hinh"]?>" loading="lazy" decoding="async">
                                    </picture>
                                </div>
                            </div>
                            <div class="css-bkflzc">                          
                            </div>
                        </div>
                        <div class="css-3tu0eq"></div>
                        <div>
                            <div class="css-r9cu07">
                                <div class="card-body css-0">
                                    <div class="css-111s35w"><?php echo isset($row["noidung"])?$row["noidung"]:"Không tồn tại"?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="css-6b3ezu">
                        <div class="css-1jpdzyd"><?php echo $row["tensp"]?></div>
                        <div class="css-5nimvs">Thương hiệu<a href="https://<?php echo $row["thuong"]?>.com/" class="css-c2cixi"><?php echo strtoupper($row["thuong"])?></a><span class="css-1qgvt7n"></span>Mã sản phẩm: <b><?php echo strtoupper($row["masp"])?></b></div>
                        <div class="css-1b2x0kn"></div>
                        <div class="css-11n8erc">
                            <div class="css-1etdbj7"><span class="css-3725in"><?php echo currency_format($row["gia"]) ?><span class="css-1ul6wk9"></span></span>
                            </div>
                        </div>
                        <div></div>
                        <div class="css-3tu0eq"></div>
                        <div class="css-1sfy14o">Khi thanh toán tại Showroom sẽ được 1 trong những khuyến mãi sau</div>
                        <div class="css-kr4u7a">
                            <div class="css-10y5j5j"> </div>
                            <div class="css-1sulisw">
                                <div class="css-syv2kv">
                                    <div class="css-64noit"><strong class="css-sr31nm">Giá:</strong> <span class="css-1xghdzx"><?php echo currency_format($row["gia"]-($giamgia)) ?> <span class="css-1ul6wk9"></span></span>
                                    </div>
                                    <div class="css-iq3qhu">Đã giảm thêm<span class="css-1mye30f"><?php echo currency_format($giamgia) ?></span>
                                    </div>                            
                                </div>
                            </div>
                            <div class="css-18wywdr"></div><span class="css-th3zma">✓</span>
                        </div>
                        <div class="css-ji66tv">
                            <button class="css-33xjxx" onclick="muaNgay('<?php echo isset($row['masp'])?$row['masp']:0?>');"><strong>MUA NGAY</strong>
                            </button>
                            <button class="css-bkwyxf" onclick="addGioHang('<?php echo isset($row['masp'])?$row['masp']:0?>');"><strong>THÊM VÀO GIỎ HÀNG</strong>
                            </button>
                        </div>
                        <div class="css-3tu0eq"></div>
                        <div class="css-1rggx5t">
                            <div class="css-mz7xyg">Khuyến mãi liên quan</div>
                            <ul>
                                <li>Nhập mã <strong>KHOAVIPPRO200</strong> giảm thêm 5% tối đa <span class="css-15lsrru">200.000<span class="css-1ul6wk9">đ</span></span> khi thanh toán qua VNPAY-QR.<a href="https://vnpay.vn/" target="blank" class="css-1ty6934">Xem chi tiết</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="css-l5vln9">
        <div class="css-cc7zbm">
            <div class="card-body css-0">
                <div class="css-5ri8n0"><span size="24" color="#53c305" class="css-swn1i6"></span>
                    <div class="css-1plrovb">Sản phẩm được miễn phí giao hàng</div>
                </div>
                <div class="css-3tu0eq"></div>
                <div class="css-tq900l">
                    <div class="css-nlnywq">Chính sách bán hàng</div>
                    <div class="css-762ld9"><span size="24" class="css-1sk9y4t"></span>
                        <div class="css-ssxjzj">Cam kết hàng chính hãng 100%</div>
                    </div>
                    <div class="css-762ld9"><span size="24" class="css-1maatv7"></span>
                        <div class="css-ssxjzj">Miễn phí giao hàng từ 500K</div>
                    </div>
                    <div class="css-762ld9"><span size="24" class="css-zcwrt7"></span>
                        <div class="css-ssxjzj">Đổi trả miễn phí trong 10 ngày</div>
                    </div>
                </div>
                <div class="css-1b0ylgr">
                    <div class="css-nlnywq">Dịch vụ khác</div>
                    <div class="css-762ld9"><span size="24" class="css-11g1ek"></span>
                        <div class="css-ssxjzj">Sửa chữa đồng giá 150.000đ.</div>
                    </div>
                    <div class="css-762ld9"><span size="24" class="css-1f6le2r"></span>
                        <div class="css-ssxjzj">Vệ sinh máy tính, laptop.</div>
                    </div>
                    <div class="css-762ld9"><span size="24" class="css-1usmsyf"></span>
                        <div class="css-ssxjzj">Bảo hành tại nhà.</div>
                    </div>
                </div><a href="lienhe.php" target="_blank" class="css-k4cc6o">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>
<script language='JavaScript' >
    function addGioHang(masp)
    {
        var x= "<?php echo isset($_COOKIE['email'])?$_COOKIE['email']:"0"?>";
        if (x=='0')
        {
            alert("Xin mời đăng nhập để thêm vào giỏ hàng");
            return false;
        }
        else
        {
            addHoaDon();
            alert("Đã thêm thành công mã sản phẩm "+masp);
            return true;
        }
    }
    function muaNgay(masp)
    {
        if (addGioHang(masp)==true)
            window.location.href="cart.php?tensp=<?php echo isset($row['tensp'])?$row['tensp']:"Một sản phẩn mới"?>";
    }

    function addHoaDon()
    {
        <?php
        if (isset($_COOKIE['email'])) 
        {
       // $sql="select masp from hoadon where email='".$_COOKIE['email']."'";
    //	$row=mysqli_query($conn, $sql);
    //	$num_row=mysqli_num_rows($row);
    //	if ($num_row==0)
    //	{
    		$sql="INSERT INTO hoadon(masp,email,soluong) VALUES ('".$_GET['id']."','".$_COOKIE['email']."','1');";
            $insert = mysqli_query($conn, $sql);
    //	}
    //	else
    //	{
      //      $sql="update hoadon set soluong=soluong+1 where email='".$_COOKIE['email']."' and masp='".$_GET['id']."'";
     //       $update = mysqli_query($conn, $sql);
    //	}
            
        }
            ?>
    }
</script>
     <?php 
			 }
			 }
			 
             else
                require("khongco.php");
        }
			 ?>
  </div>
  <?php }?>
    <!---->


<?php include"footer.php"?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

