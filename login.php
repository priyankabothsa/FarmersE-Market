<?php 
	include("connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$password = $_POST['password1'];
		$email=$_POST['email1'];
      

		if(!empty($password) && !empty($email))
		{
			//read from database
			$query = "select * from registration where email = '$email' and password = '$password'";

			$result = mysqli_query($con, $query);
         
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
                   header("Location: index1.php");
                }
                else{
                   echo "Enter valid details";
                   header("Location: loginpage.html");
                }
            }
         
		}else
		{
			echo "Please Enter details";
		}
	}

?>

