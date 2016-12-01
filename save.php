<?php

	mysql_connect("localhost","root","");
	mysql_select_db("booking");

	$purpose = $_POST["purpose"];
	$purposestring = implode(",", $purpose);

		$strSQL = "INSERT INTO booking (gender,firstname,lastname,age,telephone,email,amount,visitday,time,visiter,purpose) VALUES ('".$_POST["gender"]."','".$_POST["first_name"]."',
		'".$_POST["last_name"]."','".$_POST["age"]."','".$_POST["icon_telephone"]."',
		'".$_POST["email"]."','".$_POST["amount"]."','".$_POST["visitday"]."','".$_POST["timeOption"]."','".$_POST["visiter"]."','".$purposestring."')";
		$objQuery = mysql_query($strSQL);
	mysql_close();

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Thank You for Submit!</title>
		<script src='lib/moment.min.js'></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!-- Compiled and minified JavaScript -->
	  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	  <script  src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	  <script type="text/javascript">
	  $(document).ready(function() {
	    Materialize.updateTextFields();
	  });
	  $(document).ready(function() {
	    $('select').material_select();
	  });
	  $(document).ready(function(){
	    $('.tooltipped').tooltip({delay: 50});
	  });
	  $(document).ready(function() {
	    defaultDate: moment().format('YYYY-MM-DD HH:mm:ss');
	  });
	  </script>
	  <link rel="stylesheet" href="css/mycss.css">
	</head>
	<body class="grey lighten-3">
		<div class="container">
			<div class="center grey darken-4" style="margin-top: 10%">
				<div class="" style="padding: 40px">
					<h3 class="white-text">Thank You <?php echo $_POST["gender"]?> <?php echo $_POST["first_name"]?> for your information, we will contact you shortly.</h3>
					<a href="index.php"><h5 class="orange-text text-accent-3">Back to calendar, click here</h5></a>
				</div>
			</div>
		</div>
	</body>
</html>
