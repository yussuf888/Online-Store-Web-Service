
<link rel="stylesheet" href="customer_menubar.css">
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css' />
<style type="text/css">
#apDiv1 {
	width: 900px;
	height: auto;
	margin: auto;
	padding: auto;
	color: #000;
	font-size: 50px;
	font-weight: 700;
	font-family: Quicksand;
}
#apDiv2 {
	width: 1100px;
	height: auto;
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

body {
	background-repeat: repeat;
}
</style>
<title>Order Edit</title>
<div id="apDiv3"></div> <p>&nbsp;</p>

  
  
  <div id="apDiv1">
    <div align="center">
      <div id="apDiv4"><a href="customer_index.php"><img src="Model/apple-logo.png" width="121" height="131" alt="logo" /></a></div>
      Edit Order
    </div>
  </div>


  <div id="apDiv2"> <p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="edited_succesfull.php">
  <div align="center">
    <table width="1089" border="0">
      <tr>
        <td width="176" height="57" class="checkout_titleorder">Order ID</td>
        <td width="300" class="textfield_Login"><label for="first"></label>
          <input name="first" type="text" class="textfield_Login" id="first" value="<?php echo $_GET['OrderProductID']; ?>" readonly="readonly" ></td>
        <td width="100">&nbsp;</td>
        <td width="178" class="checkout_titleorder">&nbsp;</td>
        <td width="300">&nbsp;</td>
        </tr>
      <tr>
        <td width="176" height="57" class="checkout_titleorder"><div align="left">Model</div></td>
        <td width="300"><div align="right">
          <input name="second" type="text" class="textfield_Login" id="second" value="<?php echo $_GET['ModelName']; ?>" readonly />
        </div></td>
        <td width="100">&nbsp;</td>
        <td width="178" class="checkout_titleorder">Company</td>
        <td width="300"><input name="seven" type="text" class="textfield_Login" id="seven" value="<?php echo $_GET['Company']; ?>"/></td>
        </tr>
      <tr>
        <td height="57" class="checkout_titleorder"><div align="left">Storage</div></td>
        <td><div align="right">
          <input name="third" type="text" class="textfield_Login" id="third" value="<?php echo $_GET['Storage']; ?>" readonly />
        </div></td>
        <td width="100">&nbsp;</td>
        <td width="178" class="checkout_titleorder">Address</td>
        <td><input name="eight" type="text" class="textfield_Login" id="eight" value="<?php echo $_GET['Address']; ?>"/></td>
        </tr>
      <tr>
        <td height="58" class="checkout_titleorder"><div align="left">Color</div></td>
        <td><div align="right">
          <input name="fourth" type="text" class="textfield_Login" id="fourth" value="<?php echo $_GET['Color']; ?>" readonly />
        </div></td>
        <td width="100">&nbsp;</td>
        <td width="178" class="checkout_titleorder">Contact</td>
        <td><input name="nine" type="text" class="textfield_Login" id="nine" value="<?php echo $_GET['Contact']; ?>"/></td>
        </tr>
      <tr>
        <td height="57" class="checkout_titleorder"><div align="left">Unit Price</div></td>
        <td><div align="right">
          <input name="fifth" type="text" class="textfield_Login" id="fifth" value="<?php echo $_GET['Price']; ?>" readonly />
        </div></td>
        <td width="100">&nbsp;</td>
        <td width="178" class="checkout_titleorder">Email</td>
        <td><input name="tenth" type="text" class="textfield_Login" id="tenth" value="<?php echo $_GET['Email']; ?>"/></td>
        </tr>
      <tr>
        <td class="checkout_titleorder"><div align="left">Quantity</div></td>
        <td><div align="right">
          <input name="sixth" type="text" class="textfield_Login" id="sixth" value="<?php echo $_GET['Quantity']; ?>"/>
        </div></td>
        <td width="100">&nbsp;</td>
        <td width="178" class="checkout_titleorder">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td class="checkout_titleorder"><div align="left"></div></td>
        <td><div align="right"></div></td>
        <td width="100"><input name="submit" type="submit" class="button_cart" id="submit" value="Edited" /></td>
        <td width="178" class="checkout_titleorder">&nbsp;</td>
        </tr>
    </table>
</div></form></div>
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
