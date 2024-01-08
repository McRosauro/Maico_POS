<?php 
	include('server/connection.php');
	if(isset($_POST['submit'])){
		$user 		= mysqli_real_escape_string($db, $_POST['user']);
		$fname 		= mysqli_real_escape_string($db, $_POST['fname']);
		$lname 		= mysqli_real_escape_string($db, $_POST['lname']);
		$address	= mysqli_real_escape_string($db, $_POST['address']);
		$number		= mysqli_real_escape_string($db, $_POST['number']);
	  	$image   	= $_FILES['image']['name'];
		$target   	= "images/".basename($_FILES['image']['name']);
		
		
		$check = $db->prepare("SELECT * FROM customer WHERE firstname = ? AND lastname =?");
        $check->bind_param("ss", $fname,$lname);
        $check->execute();
        $result = $check->get_result();
        
        $second_check = $db->prepare("SELECT * FROM customer WHERE contact_number =? ");
        $second_check->bind_param("s",  $number);
        $second_check->execute();
        $second_result = $second_check->get_result();

		
		if ($result->num_rows > 0) {
			echo "<script>alert('Error! Name already exist for other records!')</script>";
	}elseif ($second_result->num_rows > 0) {
			echo "<script>alert('Contact number already exist for other records!')</script>";
	}
	else{$sql  = "INSERT INTO customer (firstname,lastname,address,contact_number,image) VALUES ('$fname','$lname','$address','$number','$image')";
		$result = mysqli_query($db, $sql);
	  
	   if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
		   $query 	= "INSERT INTO logs (username,purpose) VALUES('$user','Customer $fname Added')";
		   $insert 	= mysqli_query($db,$query);
		   header('location: main.php?username='.$user.'&added');
		}else{
		  array_push($alert,"There was a problem uploading the image!");
		}
		
	}
	}

	//////////////////

	
