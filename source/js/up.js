//** Shared at SinhVienIT.NET by Vu Thanh Lai
//----------------------------------------------------------------

var scrolltotop={
	//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
	controlHTML: '<div id="col-3">
<script src='js/jquery.min.js' type='text/javascript'></script>
        <script src='js/up.js' type='text/javascript'></script>
		  	<div style="position: fixed; top: 150px;" id="col-3-content">
                 <div id="col-3">
                    <div id="container">
						<div class="col3-body">
										<ul>
														<li class="huong-dan"><a href="index.php" title="Hướng dẫn"></a></li>
														<li class="napthe-vltk"><a href="huongdantanthu.php" target="_blank" title="Nạp thẻ">Hướng Dẫn</a></li>
														<li class="ho-tro"><a href="napthe.php" title="Hỗ trợ">Nạp thẻ</a></li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<li><font color="white"><b><?php
include_once("cauhinh.php");
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Không kết nối được với sever");
	$link=mssql_select_db("account",$ketnoi) or die ("Không kết nối được với database");
// Select all our records from a table
$query = mssql_query('SELECT * FROM Account_Info');

echo 'Thành viên: ' . mssql_num_rows($query);

// Clean up
mssql_free_result($query);
?></b></font></li>


<li><font color="white"><b><?php
include_once("cauhinh.php");
	$ketnoi=mssql_connect($host,$user,$pass) or die ("Không kết nối được với sever");
	$link=mssql_select_db("account",$ketnoi) or die ("Không kết nối được với database");
// Select all our records from a table
$query = mssql_query('SELECT * FROM Account_Info WHERE iClientID=4');

echo 'Đang chơi game: ' . mssql_num_rows($query);

// Clean up
mssql_free_result($query);
?></b></font></li>


							
							<li><font color="white"><b>
<?php
//w3vn hit-counter
$counter_file = "./counter.txt";
if (!($fp = fopen($counter_file, "r"))) die ("Cannot Open $counter_file.");
$counter = (int) fread($fp, 20);
fclose($fp);
$counter++;
echo "Lượt xem: ".$counter;
$fp = fopen($counter_file, "w");
fwrite($fp, $counter);
fclose($fp);
//end count 
?>
</b></font></li>							
						                </ul>
					  </div>
				</div>
				

			</div>
		  </div>', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
	controlattrs: {offsetx:5, offsety:5}, //offset of control relative to right/ bottom of window corner
	anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

	state: {isvisible:false, shouldvisible:false},

	scrollup:function(){
		if (!this.cssfixedsupport) //if control is positioned using JavaScript
			this.$control.css({opacity:0}) //hide control immediately after clicking it
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},

	keepfixed:function(){
		var $window=jQuery(window)
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},
	
	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
				.attr({title:'Scroll Back to Top'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
				mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}

scrolltotop.init()