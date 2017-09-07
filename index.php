<!DOCTYPE html>
<html>
<head>
	<title>Login | Using Session</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
  <script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<?php
session_start();
echo "<script>console.log('STARTING SESSION NOW');</script>";

if(isset($_SESSION['name'])){
	/*If SESSION still contains variables stored. Clear it*/
  echo "<script>console.log('SESSION CONTAINS STORED VARIABLES');</script>";
  echo '<script> console.log("'.$_SESSION['name'].'"); </script>';
}
else {
  echo "<script>console.log('SESSION VARIABLE are EMPTY');</script>";
}


//check if form is submitted
if (isset($_POST['signup']))
{
  $name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    //name can contain only alpha characters and space
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		//Checking whether Email ID is in Valid Format or not
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}

  if(strlen($password) < 6) {
		//Check if password is not less than 6 characters
		$error = true;
		$password_error = "Password must be of minimum 6 characters";
	}

  if($password != $cpassword) {
		//Compare Confirmed Password with original password
		$error = true;
		$cpassword_error = "Password and Confirmed Password doesn't match";
	}

  if (!$error)
	{
  $_SESSION['name'] = $name;
 	$_SESSION['email'] = $email;
	$_SESSION['pwd'] = md5($password);
	$_SESSION['flag'] = "1"; 	//Work is not yet done. Hence, Flag is set to 1.
  echo '<script> console.log("'.$_SESSION['name'].'"); </script>';
  echo '<script> console.log("'.$_SESSION['email'].'"); </script>';
  header("Location: second_page.php");
  // echo '<script> console.log("'.$_SESSION['pwd'].'"); </script>';
	}//if loop ends here
}//end of SignUp if loop



//echo "<script>console.log('DESTROYING SESSION NOW');</script>";
?>


</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Registration Form</legend>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
      <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
    </div>

    <div class="form-group">
      <label for="name">Email</label>
      <input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
      <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?><?php if (isset($email1_error)) echo $email1_error; ?></span>
    </div>

    <div class="form-group">
      <label for="name">Password</label>
      <input type="password" name="password" placeholder="Password" required class="form-control" />
      <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
    </div>

    <div class="form-group">
      <label for="name">Confirm Password</label>
      <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
      <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
    </div>

    <div class="form-group">
      <input type="submit" name="signup" value="Register Me" class="btn btn-success" style="width:100%"/>
    </div>
  </fieldset>
  </form>
  </div>
</div>
</div>
</body>
</html>
