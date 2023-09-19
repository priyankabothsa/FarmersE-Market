<?php $price=$_GET['price']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <title>Login form</title>
</head>
<body>
    
   <div class="background-section">
         
                <div class="main-section">
                <div class="inner-main">
                <form action="?" method="post">
                    <h2>Sign Up</h2>
                    <p>Already have an account?<a href="loginpage.php">Login</a></p>
                    <div class="email">
                        <h5>Email Address</h5>
                        <input text="text" name="email" placeholder="you@example.com">
                    </div>
                    <div class="password">
                        <div class="pw">
                            <a href="#Forgot Password?">Forgot Password?</a>
                        </div>
                        <h5>Username</h5>
                        <input text="text" name="full_name" placeholder="Full name">
                    </div>
                    <div class="password">
                        <h5>password</h5>                   
                        <input text="password" name="password" placeholder="Enter 6 charecter or more">
                    </div>
                    <div class="email">
                        <h5>Contact Number</h5>
                        <input text="tel" name="Contact" placeholder="9876543210">
                    </div>
                    <input type="hidden" id="amountt" name="amount" value="<?php echo $price; ?>" >

                    <div class="check-box">
                        <input type="checkbox">
                        <label>Remember me</label>
                    </div>
                   <button class="button">
                       <b>Sign Up </b>
                   </button>
                </form>
                   
                        
                       
                        <p> <a href="index.html">GO BACK</a></p>


                        
                       <!--  
                        <div class="google">

                            <img src="images/google.png" width="20px" height="20px">
                            <i>Google</i>
                        </div>
                        <div class="facebook">
                            <img src="images/facebook.png" width="20px" height="20px">
                            <i>Facebook</i>
                        </div>
                        --->
                
                        
                  </div>
                </div>
        </div> 
        
</body>
</html>
<?php 

	include("connection.php");
    $price=$_GET['price'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$full_name = $_POST['full_name'];
		
        $email= $_POST['email'];
		$password = $_POST['password'];
        $contact = $_POST['contact'];
        $price=$_POST['amount'];

		if(!empty($full_name) && !empty($password) &&  !empty($email))
		{

			//save to database
			
			$query = "insert into registration (name,email,password) values ('$full_name','$email','$password')";

			mysqli_query($con, $query);

            header("Location: index1.php?email=$email&price=$price&contact=$contact");
			die;
		}else
		{
			echo "Please enter some valid information!";
            header("Location: sign.php");
		}
	}
?>