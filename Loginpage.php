<?php
require_once('HeaderFooter.php');
PageHeader();
if(isset($_POST["ranak"]))
{
	
	$information=[];
	$uname=trim($_POST["uname"]);
	$upass=trim($_POST["pass"]);
	$i=0;
	
	$file=fopen("info.txt","r");
	while(!feof($file))
	{
		$information[$i++]=trim(fgets($file));
	}
	if(($information[0]==$uname) && ($information[1]==$upass))
	{
		
		$_SESSION["name"]=$uname;
		header('Location:question.php');
	}
	else
	{
		$emsg = "*Invalid Information";
	}
	
}
?>
<html>
<body>
<h3 align="center"><?=@$emsg?></h3>
<h2 align=center>Login form</h2>
<form name="log" action="Loginpage.php" method="post">
<table align=center width=60% border="0">
<tr>
<td align=right><b>your name </b></td>
<td><input type="text" name="uname"></br></td>
</tr>
<tr>
<td align=right><b>Password <b/></td>
<td><input type="password" name="pass"></br></td>
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