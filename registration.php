<?php
require_once('HeaderFooter.php');
PageHeader();
if(isset($_POST["uname"]))
{
	
	$information=[];
	$uname=trim($_POST["uname"]);
	$upass=trim($_POST["pass"]);
	$urpass=trim($_POST["rpass"]);                 
	$i=0;
	if($upass==$urpass)
	{
		//echo "efefef"
		$file=fopen("info.txt",'w+');
		$data = $uname.PHP_EOL;
		fwrite($file,$data); //write to txtfile
		$data = $upass.PHP_EOL;
		fwrite($file,$data); // write to txtfile
		fclose($file);
		header('Location:Loginpage.php');
	}
	else
	{
		$emsg = "*Password doesn't match ";
	}
	
}
?>
<html>
<body>
<h1 align=center>Registration Form </h1>
<h3 align="center"><?=@$emsg?></h3>
<h2 align=center><b>Welcome to registration</b></h2>
<form name="log" action="registration.php" method="post">
<table align=center width=60% border="1">
<tr>
<td align=right><b>your name </b></td>
<td><input type="text" name="uname"></br></td>
</tr>
<tr>
<td align=right><b>Password <b/></td>
<td><input type="password" name="pass"></br></td>
</tr>
<tr>
<td align=right><b>Retype Password <b/></td>
<td><input type="password" name="rpass"></br></td>
</tr>
<tr>
<th align="right"> &nbsp;</th>
<td ><input type="submit" value="proceed" name="ranak"></td>
</tr>
</table>
</form>
</body>
</html>

<?php
PageFooter();
?>