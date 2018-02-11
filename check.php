<?php
require_once('HeaderFooter.php');
if(!isset($_SESSION["name"]))
	header('Location: logout.php');
PageHeader();
if(isset($_POST["ques"]))
{
	$marks=0;
	$j=1;
	//echo "size is ".count($_POST)."</br> ";
	
	for($i=0;$i<count($_POST)-1;$i++)
	{
		$tmp = "opt".$i;
		echo "number".$j."<br/>";
		if(isset($_POST[$tmp]))
		{
			if(strcmp ( trim($_POST[$tmp]) ,trim($_SESSION["correct"][$i]) )==0)
			{
				
				echo  "your answer : ".$_POST[$tmp]."(Correct)"."<br/>";
				$marks++;
			}
			else
			{
				echo  "your answer : ".$_POST[$tmp]."(Wrong Answer)"."<br/>Correct answer : ".$_SESSION["correct"][$i]."<br/>";
			}
		}
		else
		{
			echo "not selected";
		}
		
		// echo $_SESSION["correct"][$i]."  			".$_POST[$tmp]."<br/>";
		$j++;
	}
	echo "your marks is ".$marks."<br/>";
}
?>
<div align="right"><a href="logout.php">Logout</a></div>
<?php
PageFooter();
?>