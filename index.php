<?php
include"connection.php";
session_start();
$login_error_message='';
if (isset($_POST['submit'])) {
	
   if (empty($_POST['email']) || empty($_POST['password'])) {
	  // echo 'test1';
       $login_error_message = "email or Password is invalid";
   } else {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$login_query="select * from userlogin where email='$email'and password='$password'";
		$login_result=$con->query($login_query);
		
		while($rows=mysqli_fetch_array($login_result)){
			$user_id=$rows['user_id'];
			//echo $user_id;
       }
		$login = mysqli_num_rows($res1);
		if ($login == 1) {
			$_SESSION['user_id']=$user_id; // Initializing Session
			//header("location: index.php");
		} else {
			$login_error_message = "Username or Password is invalid";
		}
		mysqli_close($con); // Closing Connection
	}
}
?>

<html>
<head>

<a href="logout.php">Logout</a>
<h1>Book your Room</h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/timepicki.css" rel="stylesheet">


  </head>
      <body>

              <h4>Welcome </h4>
              <form action="insert1.php" method="post">
                  <table border="2">

                   <tr>
                      <td>Checkin time</td>
                      <td><input type="text" id="timepicker2" name="checkin"></td>

                  </tr>
                  <tr>
                      <td>Checkout time</td>
                      <td><input type="text" id="timepicker1" name="checkout"></td>
                  </tr>
				  <tr>
                      <td><input type="submit" name="bookroom"></td>
                  </tr>
                         
                 </table>
             </form>


             <script src="js/jquery.min.js"></script>
             <script src="js/timepicki.js"></script>
    
            <script>
	        $('#timepicker1').timepicki();
	        $('#timepicker2').timepicki();
            </script>

    </body>
</html>

