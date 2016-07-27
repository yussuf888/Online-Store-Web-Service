
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
<title>View Order</title>
<div id="apDiv3"></div> <p>&nbsp;</p>

  
  
  <div id="apDiv1">
    <div align="center">
      <div id="apDiv4"><a href="customer_index.php"><img src="Model/apple-logo.png" width="121" height="131" alt="logo" /></a></div>
    View Order</div>
  </div>
<form id="form1" name="form1" method="post" action="">
  <p align="center">
    <input name="OrderProductID" type="text" class="textfield_Login" id="OrderProductID" placeholder="Order ID" />
  </p>
  <p align="center">
    <input name="submit" type="submit" class="button_cart" id="submit" value="Search" />
  </p>
  
  <div align="center">
    <p>
      <?php
  
  if(isset($_POST['submit']))
  	{
		// creating soapClient object
	$client = new SoapClient ("senicam.wsdl");

	// for testing the functions
	$ProductID = "";
	$OrderProductID = ($_POST['OrderProductID']);
	$tableType = "orderproduct";

	$response = $client -> getSenicamEntry($OrderProductID, $ProductID, $tableType);

	echo $response;	
	}
	

?>
    </p>
    <p>&nbsp;</p>
  </div>
</form>
<footer> 
  <ul>
    <li>
    <div align="center">
      <table width="900" border="0">
        <tr>
          <td colspan="2" rowspan="3"><div align="center" class="footerstyle">senicam</div></td>
          <td width="591" class="footerfontname"><div align="center">MOHAMED YUSSUF      </div></td>
          <td width="2"><p>&nbsp;</p></td>
          <td width="2"><p>&nbsp;</p></td>
          <td width="2"><p>&nbsp;</p></td>
        </tr>
        <tr>
          <td class="footerfontname"><div align="center">LOW VI VIEN</div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><span class="stylelightfooter">Copyright@2015 - senicam - All rights reserved</span></div></td>
        </tr>
      </table>
    </div>
    </li>
  </ul>
</footer>
