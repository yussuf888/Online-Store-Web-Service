<?php 
	
	function addSenicamEntry($OrderProductID, 
				  $ModelName, $Storage, $Color, $Quantity, $Price, $Company, $Address, $Contact, $Email,
			 	 $tableType)

	{
  		$database   = 	mysql_connect("localhost", "root", "") or die("Could not open 
  	  			database");

  		mysql_select_db("applestore", $database) or die("Could not select 
  	  			database");
				

		if ($tableType == "orderproduct")
		{
			$query    = 	"SELECT * FROM orderproduct WHERE OrderProductID = '$OrderProductID';";
  			$result   = 	mysql_query($query, $database) or die("Could not execute 
  	  				sql command.");
					
  			if($row = mysql_fetch_array($result))
			{  
	 			mysql_close($database);
	 			echo("Duplicate record.");
	 			return "Duplicate record.";
			}

			else
			{	
	
				$query = "INSERT INTO orderproduct (OrderProductID, Model_Name, Storage, Color, Quantity, Price_Selling, Company_Name, Address, Contact, Email) 
				VALUES ('$OrderProductID', '$ModelName', '$Storage', '$Color', '$Quantity', '$Price', '$Company', '$Address', '$Contact', '$Email');";
    
  				if(mysql_query($query, $database))
  				{
  	 				mysql_close($database);
  					echo("Record added.");
  	 				return "Record added";
  				}

  				else
  				{
  	  				mysql_close($database);
					echo ("Fail");
  					return "fail.";
					
  				}  
			}
		
		}


		else if ($tableType == "none")
		{
			
		}
	
		
	
	}


	function editSenicamEntry($OrderProductID, 
				  $ModelName, $Storage, $Color, $Quantity, $Price, $Company, $Address, $Contact, $Email,
			 	 $tableType)
	{

  		$database = mysql_connect("localhost", "root", "") or die("Could not open database");

		mysql_select_db("applestore", $database) or die("Could not select database");
  


		if ($tableType == "orderproduct")
		{
			$query = "SELECT * FROM orderproduct WHERE OrderProductID = '$OrderProductID';";
			$result = mysql_query($query, $database) or die("Could not execute sql command.");
  
			if($row = mysql_fetch_array($result))
			{
    				$query = "UPDATE orderproduct SET Model_Name = '$ModelName', 
					 Storage = '$Storage', Color = '$Color',
					 Quantity = '$Quantity', Price_Selling = '$Price' , Company_Name = '$Company',
					 Address = '$Address', Contact = '$Contact', Email = '$Email'
					 WHERE OrderProductID = '$OrderProductID';";
  				
				if(mysql_query($query, $database))
  				{
  	 				mysql_close($database);
					echo("Record edited.");
  					return "Record edited";
  				}

	  			else
  				{
  	  				mysql_close($database);
					echo("Fail.");
  					return "fail.";
  				}  
			}

			else
			{
	 			mysql_close($database);
				echo("record not found");
 				return "record not found";
			}
			
		
		}


		else if ($tableType == "none")
		{
			
		}

	
	}

	
	
	function delSenicamEntry($OrderProductID,$tableType) 
	{ 
 	 	$database = mysql_connect("localhost", "root", "") or die("Could not open database");

	 	mysql_select_db("applestore", $database) or die("Could not select database");

		if ($tableType == "orderproduct")
		{
			$query = "SELECT * FROM orderproduct WHERE OrderProductID = '$OrderProductID';";
  
			$result = mysql_query($query, $database) or die("Could not execute sql command.");
  	
			if($row = mysql_fetch_array($result))
  			{
  	 			$query = "DELETE FROM orderproduct WHERE OrderProductID = '$OrderProductID';";
	 		
				$result = mysql_query($query, $database) or die("Could not execute sql command.");
	 
				mysql_close($database);
	 
				echo("record removed");
	 		
				return "record removed";
  			}
  
			else
  			{
				mysql_close($database);
			
				echo("record not found");
		
				return "record not found";
 	 		}	
			
		}


		else if ($tableType == "none")
		{		
			
		}

	} 

	
	function getSenicamEntry($OrderProductID, $ProductID, $tableType) 
	{ 
  		$database = mysql_connect("localhost", "root", "") or die("Could not open database");

		mysql_select_db("applestore", $database) or die("Could not select database");
  
		if ($tableType == "orderproduct")
		{	
			if($OrderProductID=="" || $OrderProductID==null)
  			{
  	  			$query = "SELECT * FROM orderproduct;";
  			}
			else if($OrderProductID=="DESC")
			{
				$query = "SELECT * FROM orderproduct ORDER BY OrderProductID DESC";
			}

  			else 
  			{
	 			$query = "SELECT * FROM orderproduct WHERE OrderProductID = '$OrderProductID';";

  			}

  			$result = mysql_query($query, $database) or die("Could not execute sql command.");
  
			mysql_close($database);
  

  						$row = mysql_fetch_array($result);

			{
				$respone = $respone."
	  			<table width='1032' height='156' border='0'>
      <tr>
        <td height='58' colspan='2'><div align='center'>OrderID: <span class='lighfontorder'>".$row['OrderProductID']."</span></div></td>
        <td colspan='2'><p>Company: <span class='lighfontorder'>".$row['Company_Name']."</span></p>
        <p>Email: <span class='lighfontorder'>".$row['Email']."</span></p></td>
        <td colspan='3'><p align='left'>Address: <span class='lighfontorder'>".$row['Address']."</span></p></td>
        <p align='left'>&nbsp;</p>

      </tr>
      <tr>
        <td width='214' height='39'><div align='center'>Model</div></td>
        <td width='158'><div align='center'>Storage</div></td>
        <td width='123'><div align='center'>Color</div></td>
        <td width='147'><div align='center'>Quantity</div></td>
        <td width='194'><div align='center'>Unit Price</div></td>
        <td width='170' rowspan='2'><div align='center'><a href='customer_edit.php?OrderProductID=".$row['OrderProductID']."&ModelName=".$row['Model_Name']."&Storage=".$row['Storage']."&Color=".$row['Color']."&Quantity=".$row['Quantity']."&Price=".$row['Price_Selling']."&Company=".$row['Company_Name']."&Address=".$row['Address']."&Contact=".$row['Contact']."&Email=".$row['Email']."'><img src='Model/edit.png' width='50' height='50' /><a href='customer_delete.php?OrderProductID=".$row['OrderProductID']."'><img src='Model/delete.png' width='50' height='50' /></div></td>
      </tr>
      <tr class='lighfontorder'>
        <td height='51'><div align='center' class='lighfontorder'>".$row['Model_Name']."</div></td>
        <td><div align='center' class='lighfontorder'>".$row['Storage']."</div></td>
        <td><div align='center' class='lighfontorder'>".$row['Color']."</div></td>
        <td><div align='center' class='lighfontorder'>".$row['Quantity']."</div></td>
        <td><div align='center' class='lighfontorder'>RM ".$row['Price_Selling']."</div></td>

      </tr>
    </table>";
				

			}// close while

  			$respone = $respone."</table>";
  		
			echo $respone;
  	
			return $respone;
		}

		else if ($tableType == "product")
		{
			if($ProductID=="" || $ProductID==null)
  			{
  	  			$query = "SELECT * FROM product;";
  			}

  			else 
  			{
	 			$query = "SELECT * FROM product WHERE ProductID = '$ProductID';";

  			}

  			$result = mysql_query($query, $database) or die("Could not execute sql command.");
  
			mysql_close($database);
  

  			
  			$count = 0;
			while($row = mysql_fetch_array($result))
			{
				
				$respone = $respone."
<div align='center' class='background_product'>
  
    <table width='872' height='69' border='0'>
      <tr>
        <td width='250' height='65'>".$row['Model_Name']."</td>
        <td width='160'>".$row['Storage']."</td>
        <td width='160'>".$row['Color']."</td>
        <td width='180'>RM ".$row['Price_Selling']."</td>
		<td width='100'><div class='' id='order'>
      <div align='center'><a href='customer_checkout.php?ProductID=".$row['ProductID']."&ModelName=".$row['Model_Name']."&Storage=".$row['Storage']."&Color=".$row['Color']."&Price=".$row['Price_Selling']." '><img src='Model/cart.png' width='160' height='40'/></div>
    </div></td>
       
        
          
        </span></td>
      </tr>
	  
    
  </div>";
  $count++;
  			} 
			$respone = $respone."</table>";
echo $respone;
  	
			return $respone;
  		
					
		}

		

		else if ($tableType == "none")
		{		
			
		}  
			
	} 


	ini_set ("soap.wsdl_cache_enabled", "0");
	$server = new SoapServer ("senicam.wsdl");
	$server -> addFunction ("getSenicamEntry");
	$server -> addFunction ("delSenicamEntry");
	$server -> addFunction ("addSenicamEntry");
	$server -> addFunction ("editSenicamEntry");
	$server -> handle (); 
?>
