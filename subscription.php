<!DOCTYPE html>
<html>
<head>
	<title>Cashfree - Subscirption Response Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 align="center">Subscription Response</h1>	

	<?php  
		 $secretkey = "f72b6e89f2913696e6f621bc8f7e4ebc555d261e";
		 $cf_subReferenceId = $_POST["cf_subReferenceId"];
		 $cf_subscriptionId = $_POST["cf_subscriptionId"];
		 $cf_authAmount = $_POST["cf_authAmount"];
		 $cf_referenceId = $_POST["cf_referenceId"];
		 $cf_status = $_POST["cf_status"];
		 $cf_message = $_POST["cf_message"];
		 $cf_umrn = $_POST["cf_umrn"];
		 $cf_checkoutStatus = $_POST["cf_checkoutStatus"];
		 $cf_mode = $_POST["cf_mode"];
		 $cf_subscriptionPaymentId = $_POST["cf_subscriptionPaymentId"];
		 $signature=$_POST["signature"];

		 $data = "cf_authAmount".$cf_authAmount."cf_checkoutStatus".$cf_checkoutStatus."cf_message".$cf_message."cf_mode".$cf_mode."cf_referenceId".$cf_referenceId."cf_status".$cf_status."cf_subReferenceId".$cf_subReferenceId."cf_subscriptionId".$cf_subscriptionId."cf_subscriptionPaymentId".$cf_subscriptionPaymentId."cf_umrn".$cf_umrn;
		 $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
		 $computedSignature = base64_encode($hash_hmac);
		 if ($signature == $computedSignature) {
	 ?>
	<div class="container"> 
	<div class="panel panel-success">
	  <div class="panel-heading">Signature Verification Successful</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
				<tr>
			        <td>DATA</td>
			        <td><?php echo $data; ?></td>
			      </tr>
			      <tr>
			        <td>cf SubReferenceId</td>
			        <td><?php echo $cf_subReferenceId; ?></td>
			      </tr>
			      <tr>
			        <td>cf SubscriptionId</td>
			        <td><?php echo $cf_subscriptionId; ?></td>
			      </tr>
			      <tr>
			        <td>cf Auth Amount</td>
			        <td><?php echo $cf_authAmount; ?></td>
			      </tr>
			      <tr>
			        <td>cf ReferenceId</td>
			        <td><?php echo $cf_referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>cf Status </td>
			        <td><?php echo $cf_status; ?></td>
			      </tr>
			      <tr>
			        <td>cf Message</td>
			        <td><?php echo $cf_message; ?></td>
			      </tr>
			      <tr>
			        <td>Signature</td>
			        <td><?php echo $computedSignature ; ?></td>
			      </tr>
				<tr>
			        <td>cf UMRN</td>
			        <td><?php echo $cf_umrn; ?></td>
			      </tr>
				<tr>
			        <td>cf CheckoutStatus</td>
			        <td><?php echo $cf_checkoutStatus; ?></td>
			      </tr>
				<tr>
			        <td>cf Mode</td>
			        <td><?php echo $cf_mode; ?></td>
			      </tr>
				<tr>
			        <td>cf Subscription PaymentId</td>
			        <td><?php echo $cf_subscriptionPaymentId; ?></td>
			      </tr>
			    </tbody>
			</table>

		<!-- </div> -->

	   </div>
	</div>
	</div>
	 <?php   
	  	} else {
	 
	 ?>
	<div class="container"> 
	<div class="panel panel-danger">
	  <div class="panel-heading">Signature Verification failed</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>cf SubReferenceId</td>
			        <td><?php echo $cf_subReferenceId; ?></td>
			      </tr>
			      <tr>
			        <td>cf SubscriptionId</td>
			        <td><?php echo $cf_subscriptionId; ?></td>
			      </tr>
			      <tr>
			        <td>cf Auth Amount</td>
			        <td><?php echo $cf_authAmount; ?></td>
			      </tr>
			      <tr>
			        <td>cf ReferenceId</td>
			        <td><?php echo $cf_referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>cf Status </td>
			        <td><?php echo $cf_status; ?></td>
			      </tr>
			      <tr>
			        <td>cf Message</td>
			        <td><?php echo $cf_message; ?></td>
			      </tr>
			      <tr>
			        <td>Signature</td>
			        <td><?php echo $computedSignature; ?></td>
			      </tr>
				<tr>
			        <td>cf UMRN</td>
			        <td><?php echo $cf_umrn; ?></td>
			      </tr>
				<tr>
			        <td>cf CheckoutStatus</td>
			        <td><?php echo $cf_checkoutStatus; ?></td>
			      </tr>
				<tr>
			        <td>cf Mode</td>
			        <td><?php echo $cf_mode; ?></td>
			      </tr>
				<tr>
			        <td>cf Subscription PaymentId</td>
			        <td><?php echo $cf_subscriptionPaymentId; ?></td>
			      </tr>
			    </tbody>
			</table>

		<!-- </div> -->
	  </div>	
	</div>	
	</div>
	
	<?php	
	 	}
	 ?>

</body>
</html>


