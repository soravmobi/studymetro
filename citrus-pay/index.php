<?php
    $mode = 'sandbox';
    if($mode == 'sandbox') { 
        //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
        $formPostUrl = "https://sandbox.citruspay.com/uycuxzlzv2";  
        //Need to change with your Secret Key
        $secret_key = "cbce9048aab88acabb0fc1e0d3d0b1b88d275001";   
                 
        //Need to change with your Vanity URL Key from the citrus panel
        $vanityUrl = "uycuxzlzv2";
        
        //Should be unique for every transaction
        $merchantTxnId = uniqid(); 
        //Need to change with your Order Amount
        $orderAmount = "1.00";
        $currency = "INR";
        $data = $vanityUrl.$orderAmount.$merchantTxnId.$currency;
        $notifyUrl = 'http://studymetro.sid.mwdemoserver.com/citrus-pay/notifiy.php';
        $returnUrl = 'http://studymetro.sid.mwdemoserver.com/citrus-pay/return.php';

        $securitySignature = hash_hmac('sha1', $data, $secret_key);
    } elseif($mode == 'live') {
        //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
        $formPostUrl = "https://www.citruspay.com/studymetro";  
        //Need to change with your Secret Key
        $secret_key = "2f616053f8837dc11d2a6cb28944873a3cdaaa66";   
                 
        //Need to change with your Vanity URL Key from the citrus panel
        $vanityUrl = "studymetro";
        
        //Should be unique for every transaction
        $merchantTxnId = uniqid(); 
        //Need to change with your Order Amount
        $orderAmount = "1.00";
        $currency = "INR";
        $data = $vanityUrl.$orderAmount.$merchantTxnId.$currency;
        $notifyUrl = 'http://studymetro.sid.mwdemoserver.com/citrus-pay/notifiy.php';
        $returnUrl = 'http://studymetro.sid.mwdemoserver.com/citrus-pay/return.php';

        $securitySignature = hash_hmac('sha1', $data, $secret_key);
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
 <html>
     <head>
         <meta HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=iso-8859-1">
     </head>
     <body>
        <form align="center" method="post" action="<?php echo $formPostUrl; ?>">
             <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
             <input type="hidden" name="returnUrl" value="<?php echo $returnUrl; ?>" />
             <input type="hidden" id="notifyUrl" name="notifyUrl" value="<%=notifyUrl%>" />
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
             <input type="Submit" value="Pay Now"/>
         </form>
     </body>
 </html>