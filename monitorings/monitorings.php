<?php
include("../server/connection.php");
include ('../set.php');
$query="select * from monitorings order by id desc";
$result=mysqli_query($db,$query);



?>

<?php 

?>
<html>
<head> 
<title> Fetch data from database </title>
<meta http-equiv="refresh" content="3">
<style>
table{
	text-transform: uppercase;
}
tr:nth-child(even) {
  background-color: #D6EEEE;
}
th{
	font-weight:bold;
	color: white;
}
h1{
	color: red;
	font-family: Arial;
	
}
h3{
	color: orange;
	font-family: Arial;
}


</style>
</head>

<body >
	
<button id="buttons" onclick="window.location.href='../main.php'" class="btn btn-secondary border mr-2 ml-2"><i class='fa fa-wifi' style='color: white'></i></i>Back</button>

<h1 align="center" >Monitoring Page</h1>
<h3>This Page Refresh Every 3 Seconds</h3>
<table border= "1" align ="center" style="width:100%">

<tr> <th colspan="10" align="center" bgcolor="yellow" ><font size="5" color="FF0000" face="Arial Black">ISGSMS MONITORING </font> </th></tr>

<th bgcolor="green"><face="Arial Black" >DATE </th>
<th bgcolor="green"><face="Arial Black">TIME </th>
<th bgcolor="green"><face="Arial Black">SAND LEVEL </th>



<?php while ($rows=mysqli_fetch_assoc($result))
{
	?>
	<tr align="center">
	
	<td><?php echo date ("F-d-Y	",strtotime ($rows ['date']));?> </td>
	<td><?php echo date ("h:i A	",strtotime ($rows ['date']));?> </td>
	<td align="center" ><?php if ($rows ['SandLevel']==0){
		echo "<font color='BLUE'>FULL</font>";} 
	else {
		echo "<font color='RED'>EMPTY</font>";
	}
	?> </td>
	
	
	</tr>
	
	<?php
}
?>

</table>
</body>
</html>