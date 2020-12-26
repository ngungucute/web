<!DOCTYPE html>


<html lang="en" class="yes-js js_active js js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths js_active  vc_desktop  vc_transform  vc_transform">

<head>

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
<link rel="stylesheet" href="css/woocommerce-layout.css?ver=3.5.4">
<link rel="stylesheet" href="css/woocommerce-smallscreen.css?ver=3.5.4">
<link rel="stylesheet" href="css/woocommerce.css?ver=3.5.4">
<link rel="stylesheet" href="css/app-default.css">
<link rel="stylesheet" href="css/style.css">
        <!--/noptimize-->
		<script type="text/javascript" > 
		function inGiaTong(tien)
{   
    if (document.getElementById("shipping_method_0_free_shipping2").checked==true)
    document.getElementById("tongTienGio").innerHTML = commaSeparateNumber(tien);
    else if (document.getElementById("shipping_method_0_flat_rate3").checked==true)
	document.getElementById("tongTienGio").innerHTML = commaSeparateNumber(tien+20000);
	
	
}

function ingia(tien,vt)
{   
	index = "SL["+vt+"]";
	btnIndex= "btnSL["+vt+"]";
    if (tien == 0 & document.getElementById(index).value >= 2)
	document.getElementById(index).value=document.getElementById(index).value-1;
	if (tien == 1 & document.getElementById(index).value >= 1)
	document.getElementById(index).value=document.getElementById(index).value*1+1;	
}
function commaSeparateNumber(val){
       while (/(\d+)(\d{3})/.test(val.toString())){
         val = val.toString().replace(/(\d+)(\d{3})/, '$1'+'.'+'$2');
       }
       return val+'đ';
     }

		</script>
		    <!-- Google Tag Manager -->

<!-- End Facebook Pixel Code -->


</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-lower">LINH KIỆN MÁY TÍNH ĐĂNG KHOA</span>
  </h1>

  <!-- Navigation -->
  <?php include"header.php"?>

 <div class="woocommerce" style="background-color:#ffffff"><div class="woocommerce-notices-wrapper">
	<div class="woocommerce-message">
		“<?php echo isset($_GET['tensp'])?$_GET['tensp']:"Không có sản phẩm mới"?>” được thêm vào giỏ hàng.	</div>
</div>
<form class="woocommerce-cart-form" action="cart.php" method="post">
	
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">Hình ảnh</th>
				<th class="product-name">Sản phẩm</th>
				<th class="product-price">Giá</th>
				<th class="product-quantity">Số lượng</th>
				<th class="product-subtotal">Tổng</th>
			</tr>
		</thead>
		<tbody>
		<?php 
include_once"ketnoi.php";
include("lib/money.php");
if (isset($_GET['remove']))
{
	$sqlxoa = "DELETE  FROM hoadon where email='".$_COOKIE['email']."' and mahd='".$_GET['remove']."'";
	$resultxoa = mysqli_query($conn, $sqlxoa);
}
if (isset($_POST['mahd']))
{
	foreach($_POST['mahd'] as $mahd) 
	{	
	$sqlsua = "UPDATE  hoadon SET soluong='".$_POST['SL'][$mahd]."' where email='".$_COOKIE['email']."' and mahd='".$mahd."'";
	$resultsua = mysqli_query($conn, $sqlsua);
	}
}
if (isset($_COOKIE['name']))
{
$sql = "SELECT * FROM hoadon where email='".$_COOKIE['email']."'";
$result = mysqli_query($conn, $sql);
$tongTien=0;
$i=0;
if (isset($result)) {
	while (
   $row = mysqli_fetch_assoc($result))
	{
		
		$sql1 = "SELECT * FROM sanpham where masp='".$row['masp']."'";
		$result1 = mysqli_query($conn, $sql1);
		if (isset($result1)) {
			
			while (
		   $row1 = mysqli_fetch_assoc($result1))
			{
				$i++;
				$tongTien+=$row1['gia']*$row['soluong'];
?>
								<tr class="woocommerce-cart-form__cart-item cart_item">

						<td class="product-remove">
							<a href="cart.php?remove=<?php echo isset($row['mahd'])?$row['mahd']:0 ?>" class="remove" aria-label="Xóa sản phẩm này" data-product_id="38121" data-product_sku="">×</a>						</td>
<input type="hidden" name="mahd[]" value="<?php echo isset($row['mahd'])?$row['mahd']:0 ?>">
						<td class="product-thumbnail">
						<a href="sanpham.php?id=<?php echo $row1["masp"]?>&maloai=<?php echo $row1["maloai"]?>"><img width="193" height="193" src="img/<?php echo isset($row1["hinh"])?$row1["hinh"]:""?>" sizes="(max-width: 193px) 100vw, 193px"></a>						</td>

						<td class="product-name" data-title="Sản phẩm">
						<a href="sanpham.php?id=<?php echo $row1["masp"]?>&maloai=<?php echo $row1["maloai"]?>"><?php echo isset($row1['tensp'])?$row1['tensp']:"" ?></a>						</td>

						<td class="product-price" data-title="Giá">
							<span class="woocommerce-Price-amount amount" id="dongia"><?php echo isset($row1['gia'])?currency_format($row1['gia']):0?></span>						</td>

						<td class="product-quantity" data-title="Số lượng">
							<div class="quantity buttons_added"><input type="button" value="-" class="minus" id="btnSL[<?php echo isset($i)?$i:0?>]" onclick="ingia(0,<?php echo isset($i)?$i:0?>);">
		<label class="screen-reader-text" for="quantity_5fa1848444bc0">Số lượng</label>
		<input type="number" id="SL[<?php echo isset($i)?$i:0?>]" class="input-text qty text" step="1" min="0" max="" name="SL[<?php echo isset($row['mahd'])?$row['mahd']:0?>]" value="<?php echo isset($row['soluong'])?$row['soluong']:1?>" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
	<input type="button" value="+" class="plus" id="btnSL[<?php echo isset($i)?$i:0?>]" onclick="ingia(1,<?php echo isset($i)?$i:0?>);"></div>
							</td>

						<td class="product-subtotal" data-title="Tổng">
							<span class="woocommerce-Price-amount amount" id="tongtien"><?php echo isset($row1['gia'])?currency_format($row1['gia']*$row['soluong']):0?></span>						</td>
					</tr>
					
			<?php 
	}
}
}
}
}
			?>
			<tr>
				<td colspan="6" class="actions">

											<div class="coupon">
							<label for="coupon_code">Ưu đãi:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi"> <button type="submit" class="button" name="apply_coupon" value="Áp dụng">Áp dụng</button>
													</div>
					
					<button type="submit" class="button" name="update_cart" value="Cập nhật giỏ hàng">Cập nhật giỏ hàng</button>

					
					<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="da5e221410"><input type="hidden" name="_wp_http_referer" value="/cart/">				</td>
			</tr>

					</tbody>
	</table>
	</form>

<div class="cart-collaterals">
	<div class="products-wrapper"><div class="cart_totals ">

	
	<h2>Tổng số lượng</h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tbody><tr class="cart-subtotal">
			<th>Tổng phụ</th>
			<td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount"><?php echo isset($tongTien)?currency_format($tongTien):0?></span></span></td>
		</tr>

		
		
			
			<tr class="woocommerce-shipping-totals shipping">
	<th>Giao hàng (***)</th>
	<td data-title="Giao hàng (***)">
					<ul id="shipping_method" class="woocommerce-shipping-methods">
									<li>
						<input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping2" value="free" class="shipping_method" checked="checked" onchange="inGiaTong(<?php echo isset($tongTien)?$tongTien:0?>)"><label for="shipping_method_0_free_shipping2">Tiêu chuẩn(miễn phí)</label>					</li>
									<li>
						<input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate3" value="express" class="shipping_method" onchange="inGiaTong(<?php echo isset($tongTien)?$tongTien:0?>)"><label for="shipping_method_0_flat_rate3">Siêu Tốc 2h -Nội thành HCM và HN: <span class="woocommerce-Price-amount amount">20.000<span class="woocommerce-Price-currencySymbol">₫</span></span></label>					</li>
							</ul>
							<p class="woocommerce-shipping-destination">
					Đây chỉ là ước tính. Giá sẽ cập nhật trong quá trình thanh toán.				</p>
					
		
								</td>
</tr>

			
		
		
		
		
		<tr class="order-total">
			<th>Tổng</th>
			<td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount" id="tongTienGio"><?php echo isset($tongTien)?currency_format($tongTien):0?></span></strong> </td>
		</tr>

		
	</tbody></table>

	<div class="wc-proceed-to-checkout">
		
<a href="xemhang.php"><button class="cart_backtohome_button">TIẾP TỤC MUA HÀNG</button></a>
<a href="lienhe.php?xacnhan=ok" class="checkout-button button alt wc-forward">
	Tiến hành thanh toán</a>

	
	</div>

	
</div>
</div></div>


		

		</div>

<?php include"footer.php"?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
