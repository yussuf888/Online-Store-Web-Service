<?php
	function get_product_name($pid){
		$result=mysql_query("select Model_Name from product where ProductID=$pid") or die("select Model_Name from product where ProductID=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['Model_Name'];
	}
	function get_product_type($pid){
		$result=mysql_query("select Type from product where ProductID=$pid") or die("select Type from product where ProductID=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['Type'];
	}
	function get_product_storage($pid){
		$result=mysql_query("select Storage from product where ProductID=$pid") or die("select Storage from product where ProductID=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['Storage'];
	}
	function get_product_color($pid){
		$result=mysql_query("select Color from product where ProductID=$pid") or die("select Color from product where ProductID=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['Color'];
	}
	function get_price($pid){
		$result=mysql_query("select Price_Selling from product where ProductID=$pid") or die("select Model_Name from product where ProductID=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['Price_Selling'];
	}
	function get_product_price($pid){
		$result=mysql_query("select Price_Selling from product where ProductID=$pid") or die("select Price_Selling from product where ProductID=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['Price_Selling'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['ProductID']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function totals()
	{
		$pprice=get_product_price($pid);
		$qty=get_quantity();
		$sum+=$pprice*$qty;
		return $sum;
	}
	function get_quantity(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			$q=$_SESSION['cart'][$i]['qty'];
			
			
		}
		return $q;
	}
	function get_name(){
			$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			
			$pname=get_product_name($pid);
			
		}
		return $pname;
	}
	function get_color(){
			$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			
			$pcolor=get_product_color($pid);
			
		}
		return $pcolor;
	}
	function get_type(){
			$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			
			$ptype=get_product_type($pid);
			
		}
		return $ptype;
	}
	function get_storage(){
			$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			
			$pstorage=get_product_storage($pid);
			
		}
		return $pstorage;
	}
	function get_priceseller(){
			$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['ProductID'];
			
			$pprice=get_product_price($pid);
			
		}
		return $pprice;
	}
	
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['ProductID']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['ProductID']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['ProductID']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>