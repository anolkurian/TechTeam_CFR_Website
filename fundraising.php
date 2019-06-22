<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	include "config.php";
	
	
	
    $ORDER_ID = "OD".rand(10002,99999);
   
    $CUST_ID = "CI".rand(1000,9999);
   
    
    date_default_timezone_set('Asia/Kolkata');
    $DateTime = date("Y-m-d H:i:s");
 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
	nav{
		background-color: #f16f26;
		color: #fff;
	}
	.btn
	{
		background-color: #f16f26;
		color: #fff;
	}
	
	.btn:hover{
		background-color: #fff;
		color: #f16f26;
		border: 1px #f16f26 solid;
		box-shadow: none !important;
	}
	
	/* label color */
	.input-field label {
		color: #f16f26;
	}
	/* label focus color */
	.input-field input[type=text]:focus + label {
		color: #f16f26 !important;
		font-weight:bold;
	}
	/* label underline focus color */
	.input-field input[type=text]:focus {
		border-bottom: 1px solid #f16f26 !important;
		box-shadow: 0 1px 0 0 #f16f26 !important;
	}
	/* valid color */
	.input-field input[type=text].valid {
		border-bottom: 1px solid #f16f26;
		box-shadow: 0 1px 0 0 #f16f26;
	}
	/* invalid color */
	.input-field input[type=text].invalid {
		border-bottom: 1px solid #f16f26;
		box-shadow: 0 1px 0 0 #f16f26;
	}
	/* icon prefix focus color */
	.input-field .prefix.active {
		color: #f16f26;
	}
</style>        
</head>
<body>
	<nav>
		<div class="nav-wrapper">
			<a class="navbar-brand navbar-left brand-logo" style="padding: 0px" href="#myPage"><img src="./logowhite.png" class="img-responsive" style="max-height: 50px; padding-left: 4px" alt="logo"></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="./index.html">HOME</a></li>
				<li><a href="./team.html">TEAM</a></li>
				<li><a href="./gallery.html">GALLERY</a></li>
				<li><a href="./partner.html">PARTNERS</a></li>
				<li><a href="./support.html">SUPPORT US</a></li>
				<li><a href="./contact.html">CONTACT US</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">	
		<div class="row">
		    <div class="col l5 offset-l3">
		        <h2>Fundraising Portal</h2>
		    </div>
		</div>
		<div class="row">
			<div class="col s6 offset-s3">
				<div class="card" style="border:solid 1px #f16f26;">
					<div class="card-image">
						<span class="card-title"></span>
					</div>
					<div class="card-content">
						<div class="row">
							<form class="col s12" method="post" action="PaytmKit/pgRedirect.php">
								<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" type="hidden"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $ORDER_ID?>">
					
		        <input id="CUST_ID" tabindex="2" maxlength="12" type="hidden" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $CUST_ID?>">
				
		        <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" type="hidden" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
				
		        <input id="CHANNEL_ID" tabindex="4" maxlength="12" type="hidden"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					
								<div class="row">
									<div class="input-field col s8 offset-s2">
										<input placeholder="Name" name="name" title="name" id="first_name" type="text">
										<label for="first_name">Name</label>
									</div>
									<div class="input-field col s8 offset-s2">
										<input placeholder="Please Enter Amount" name="TXN_AMOUNT" title="TXN_AMOUNT" id="first_name" type="text">
										<label for="first_name">Amount</label>
									</div>
									<div class="input-field col s8 offset-s2">
										<input placeholder="What would you like to say to TEAM CFR?!" id="first_name" type="text">
										<label for="first_name">Comments</label>
									</div>
								</div>
								<div class="row">
							<div class="col s4 offset-s4">
								<button class="btn" type="submit" name="action">Donate
									<i class="material-icons right">send</i>
								</button>
							</div>
						</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="row">
		    <div class="col l5 offset-l3">
		        <?php 
    $sum_sql = "SELECT SUM(Amount) from donations";
	$result = $con->query($sum_sql);
	while($row = $result->fetch_assoc()) {
        echo "<br><b> Total Amount Collected: ". $row["SUM(Amount)"]."</b>";    }
    ?>
		    </div>
		</div>
			
	</div>
	<script type="text/javascript">
		 var slider = document.getElementById('test-slider');
  noUiSlider.create(slider, {
   start: [20, 80],
   connect: true,
   step: 1,
   orientation: 'horizontal', // 'horizontal' or 'vertical'
   range: {
     'min': 0,
     'max': 350000
   },
   format: wNumb({
     decimals: 0
   })
  });
	</script>
</body>
</html>
<?php

    $insert_sql = "INSERT INTO donations(Did,DateTime,Name, Comment,Amount,Status,Email,Contact) VALUES ()";

	$view_sql = "SELECT Name, Amount,Comment FROM donations";
	$result = $con->query($view_sql);
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='container'><div class='row' style='margin-bottom: 5px'>
			<div class='col s6 offset-s3'>
				<div class='card' style='border: solid 1px  #f16f26;padding: 5px;' >
					<div class='card-content' style='padding: 5px'>
						<div class='row' style='margin-bottom: 0'>
							<div class='col s2'>
								<img src='.\user.png' height='60' width='60'>
							</div>
							<div class='col s6'>
								<h5><b>". $row["Name"]. "</b></h5>
							</div>
							<div class='col s4'>
								<h4><b>&#x20B9; ". $row["Amount"]."</b></h4>
							</div>
							
						</div><p style='font-style: italic;color: grey;''>Comments</p>
						
						
						<p>". $row['Comment']."</p>
					
					</div>
				</div>
			</div>
		</div>
		</div>";
    }

$conn->close(); ?>
