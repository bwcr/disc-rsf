<?php
header("Location: ../admin.php");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<style type="text/css">
	*{
		font-family: "Roboto", sans-serif;
	}
</style>
<body>
	<div class="container">
	<!--Card-->
<div class="card m-auto" style="width: 22rem;">

  <!--Card image-->
  <div class="view overlay">
    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
    <a href="#">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>
  <!--Card content-->
  <div class="card-body">
    <!--Title-->
    <h4 class="card-title">Login</h4>
    <!--Text-->
    <form>
    	<div class="md-form">
    	<input type="text" name="username" class="form-control">
    	<label for="username" class="active">Username</label>
    	</div>
    	<div class="md-form">
    	<input type="password" name="password" class="form-control">
    	<label for="password" class="active">Password</label>
    	</div>
    </form>
    <a href="dashboard.php" class="btn btn-primary">Login</a>
  </div>
</div>
</div>
<!--/.Card-->
	

</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
</html>