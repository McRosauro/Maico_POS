<?php

class monitorings{ 
 public $link='';
 function __construct($SandLevel){
  $this->connect();
  $this->storeInDB($SandLevel);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'pointofsale') or die('Cannot select the DB');
 }
 
 function storeInDB($SandLevel){ // table fields in your database
  $query = "insert into monitorings set SandLevel='".$SandLevel."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 } // this fucntion will save your values coming also from your sensor(monitorings)
 
}
if($_GET['SandLevel'] != ''){
 $monitorings=new monitorings($_GET['SandLevel']);
}
?>