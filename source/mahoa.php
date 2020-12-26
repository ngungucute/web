<?php
function sqlsafe($str)
{
	$badstr=array('\'','-','union','select','update','order','declare','*','%',';');
	for($i=0;$i<count($badstr);$i++)
	{
		if(strpos(strtolower($str),$badstr[$i])!=0)
		{
			echo "<script language=Javascript1.1>alert(\"Khong duoc su dung ki tu dac biet.\");</script>";
			exit;
		}
	}
}
?>
