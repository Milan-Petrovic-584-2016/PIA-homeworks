<?php  
 $connect = mysqli_connect("localhost", "root", "", "imdb");  
 $number = count($_POST["zanr"]);
 $userData = count($_POST["ime"]);
 
 /*
	
	if ($userData > 0) {
	    for ($i=0; $i < $userData; $i++) { 
		if (trim($_POST['name'] != '') && trim($_POST['email'] != '')) {
			$name   = $_POST["name"][$i];
			$email  = $_POST["email"][$i];
			$query  = "INSERT INTO users (name,email) VALUES ('$name','$email')";
			$result = mysqli_query($con, $query);
		}
	    }
	    echo "Data inserted successfully";
	}else{
	    echo "Please Enter user name";
	}
*/
 
 /*
    if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["name"][$i] != ''))  
           {  
                $sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  
 */
 ?> 