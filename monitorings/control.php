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

    <style>
        
      html {font-family: Arial; display: inline-block; text-align: center;}
      p {font-size: 1.2rem;}
      h4 {font-size: 0.8rem;}
      body {margin: 0;}
      .topnav {overflow: hidden; background-color: #0c6980; color: white; font-size: 1.2rem;}
      .content {padding: 5px; }
      .card {background-color: white; box-shadow: 0px 0px 10px 1px rgba(140,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
      .card.header {background-color: #0c6980; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}
      .cards {  max-width: 300px; margin: 0 auto; display: grid; grid-gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));}
      .reading {font-size: 1.3rem;}
      .packet {color: #bebebe;}
      .temperatureColor {color: #fd7e14;}
      .humidityColor {color: #1b78e2;}
      .statusreadColor {color: #702963; font-size:12px;}
      .LEDColor {color: #183153;}
      
      /* ----------------------------------- Toggle Switch */
      .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
      }

      .switch input {display:none;}

      .sliderTS {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #D3D3D3;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
      }

      .sliderTS:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: #f7f7f7;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
      }

      input:checked + .sliderTS {
        background-color: #00878F;
      }

      input:focus + .sliderTS {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .sliderTS:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      .sliderTS:after {
        content:'OFF';
        color: white;
        display: block;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 70%;
        font-size: 10px;
        font-family: Verdana, sans-serif;
      }

      input:checked + .sliderTS:after {  
        left: 25%;
        content:'ON';
      }

      input:disabled + .sliderTS {  
        opacity: 0.3;
        cursor: not-allowed;
        pointer-events: none;
      }
      /* ----------------------------------- */
    </style>
  </head>
  
  <body>
  <h1 align="center" >Monitoring Page</h1>

<button id="buttons" onclick="window.location.href='../main.php'" class="btn btn-secondary border mr-2 ml-2"><i class='fa fa-wifi' style='color: white'></i></i>Back</button>
    
    <!-- __ DISPLAYS MONITORING AND CONTROLLING ____________________________________________________________________________________________ -->
    <div class="content">
      <div class="cards">
        
        <!-- == MONITORING ======================================================================================== -->
       
        <!-- ======================================================================================================= -->
        
        <!-- == CONTROLLING ======================================================================================== -->
        <div class="card" >
          <div class="card header">
            <h3 style="font-size: 1rem;">CONTROLLING</h3>
          </div>
          
          <!-- Buttons for controlling the LEDs on Slave 2. ************************** -->
          <h4 class="LEDColor"><i class="fas fa-lightbulb"></i>MOTOR SWITCH</h4>
          <label class="switch">
            <input type="checkbox" id="ESP32_01_TogLED_01" onclick="GetTogBtnLEDState('ESP32_01_TogLED_01')">
            <div class="sliderTS"></div>
          </label>
         
          <!-- *********************************************************************** -->
        </div>  
        <!-- ======================================================================================================= -->
        
      </div>
    </div>
    
    <br>
    
   
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
		echo "<font color='red'>FULL</font>";} 
	else {
		echo "<font color='blue'>EMPTY</font>";
	}
	?> </td>
	
	
	</tr>
	
	<?php
}
?>

</table>
</body>
</html>