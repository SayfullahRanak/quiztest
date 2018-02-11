<?php
require_once('HeaderFooter.php');
if(!isset($_SESSION["name"]))
	header('Location: logout.php');	
PageHeader();
$numbers=[];
$storage=[];
$spliti=[];
$answer=[];
$i=0;
$a=0;
$j=0;
$k=0;
$s=1;
$radio=0;
$n=0;
$h=1;
$t=0;
$file=fopen("ques.txt","r");
while(!feof($file))
{
		
		$storage[$i++]=htmlspecialchars(trim(fgets($file)));
}
?>
<html>
<body>
<form name="question" action="check.php" method="post">
<?php
for($j=0;$j<sizeof($storage);$j++)
{	
	if ($k==0)
	{
		$t=$k;
		$p=0;
		echo $storage[$j]."<br/>";
		$n=($s+3);
		empty($numbers);
		while($s<=$n)
		{
			
			$numbers[$p++]=$storage[$s++];
		}
		shuffle($numbers);
	}
	else
	{
		$spliti=explode(":",$numbers[$t++]);
		$tmp =htmlspecialchars(trim($spliti[1]));
		echo "<input type='radio' name='opt$radio' value='$tmp' />" . $spliti[1] . "<br/>";
	}
	$k++;
	if($k>4)
	{
			$split=explode(":",$storage[++$j]);
		    $temporary =trim($split[1]);
			$answer[$a++]=$temporary;
			$s=$j+2;
			$k=0;
			$radio++;
	}

}
$_SESSION["correct"]=$answer;
?>
<input type="submit" value="submit" name="ques">
<div align="right"><a href="logout.php">Logout</a></div>
</form>
</body>
</html>
<?php
PageFooter();
?>