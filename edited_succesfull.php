<?php
header( "refresh:3;url=customer_display.php" );

if (isset($_POST["submit"])) {

	// creating soapClient object
	$client = new SoapClient ("senicam.wsdl");
	$OrderProductID = ($_POST['first']);
	$ModelName =($_POST['second']);
	$Storage = ($_POST['third']);
	$Color = ($_POST['fourth']);
	$Price = ($_POST['fifth']);
	$Company = ($_POST['seven']);
	$Quantity = ($_POST['sixth']);
	$Address = ($_POST['eight']);
	$Contact = ($_POST['nine']);
	$Email = ($_POST['tenth']);
	$tableType= "orderproduct";
	
	

	// for testing the functions
	
	$response = $client -> editSenicamEntry($OrderProductID, 
				  $ModelName, $Storage, $Color, $Quantity, $Price, $Company, $Address, $Contact, $Email,
			 	 $tableType);
	
	}
	

?>
<?php

if (isset($_POST["submit"])) {

	// creating soapClient object
	$client = new SoapClient ("senicam.wsdl");
	$OrderProductID = "DESC";
	$ProductID = "";
	$tableType= "orderproduct";
	
	

	// for testing the functions
	
	$response = $client -> getSenicamEntry($OrderProductID, $ProductID, $tableType);
	
	}
	

?>

<link rel="stylesheet" href="customer_menubar.css">
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css' />
<style type="text/css">
#apDiv1 {
	width: 900px;
	height: auto;
	margin: auto;
	padding: auto;
	color: #333333;
	font-size: 50px;
	font-weight: 700;
	font-family: Quicksand;
}
#apDiv2 {
	width: 900px;
	height: 115px;
	margin: auto;
}
#apDiv3 {
	width: 900px;
	height: 10px;
	margin: auto;
}
</style>
<link href="homepage.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css'>
<style type="text/css">
#apDiv4 {
	position: absolute;
	width: 189px;
	height: 154px;
	left: 14px;
	top: 29px;
}

</style>
<title>Successfully Edit Order</title>
<div id="apDiv3"></div> <p>&nbsp;</p>

  
  
  <div id="apDiv1">
    <div align="center">
   Successfully Edit Order</div>
  </div>


<div id="apDiv2"> <p align="center">You have successfully edit the order and you're page will redirect to order view page in 3 seconds.</p>
  <div align="center"></div>
</div></div>
  <p>&nbsp;</p>
  <footer> 
 
    </footer>

