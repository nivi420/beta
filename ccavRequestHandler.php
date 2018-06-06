<html>
<head>
<title> Payment</title>
</head>
<body>
<center>
<?php include('Crypto.php')?>
<?php 

//ATTENTION : Change TEST TO PROD before deployment (2 changes)

//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------
//TEST
    require ('../../ccavenue/alphacc.php');
 
//PROD
    //require ('../ccavenue/prodcc.php'); 
//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------

    
	error_reporting(0);
    
  
    
	$merchant_data='';
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

//ATTENTION : Change TEST TO PROD before deployment

//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------
//TEST
    
	$production_url='https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
    
//PROD    
    //$production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------

?>
    
<!--
<iframe src="<?php echo $production_url?>" id="paymentFrame" width="482" height="450" frameborder="0" scrolling="No" ></iframe>

--> 

<script language="javascript">
    window.location.href = "<?php echo $production_url?>"; 
</script>


</center>
</body>
</html>

