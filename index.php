<html>
<head>

</head>
<body>

<?php

$dbconfig=mysqli_connect("localhost","root","","eod2");

$start=0;
$limit=3;

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=1;
}
//Fetch from database first 10 items which is its limit. For that when page open you can see first 10 items. 
$query=mysqli_query($dbconfig,"select * from table1 LIMIT $start, $limit");
?>

<?php
//print 10 items
while($result=mysqli_fetch_array($query))
{
	echo $result['name']."</br>";
}
?>

<?php
//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($dbconfig,"select * from table1"));
//calculate total page number for the given table in the database 
$total=ceil($rows/$limit);?>

<?php if($id>1)
{
	
	//echo "<li><a href='?id=".($id-1)."' class='button'>PREVIOUS</a></li>";
}
if($id!=$total)
{
	
	//echo "<li><a href='?id=".($id+1)."' class='button'>NEXT</a></li>";
}
?>

<?php
//show all the page link with page number. When click on these numbers go to particular page. 
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo $i; }
			
			else { echo "<a href='?id=".$i."'>".$i."</a>"; }
		}
?>

</body>
</html>