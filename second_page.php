<!DOCTYPE html>
<html>
<head>
  <title>Session | Testing</title>
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
$name = $_SESSION['name'];
$email = $_SESSION['email'];
echo '<script> console.log("'.$name.'"); </script>';
echo '<script> console.log("'.$email.'"); </script>';

$page = $_SERVER['PHP_SELF'];
header("Refresh: 5; url=$page");
//session_destroy(); 	//This will destroy the Session
?>

</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 well">
        <p>This page will refresh after every 5 seconds <br />and still retain these Session variables</p>
        <p>Welcome</p>
        Your Username is:<p><?php echo $name; ?></p>
        Your Email ID is:<p><?php echo $email; ?></p>
      </div>
    </div>
  </div>
</body>
</html>
