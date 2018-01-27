<?php
        use PayPal\Api\Amount;
        use PayPal\Api\Details;
        use PayPal\Api\Item;
        use PayPal\Api\ItemList;
        use PayPal\Api\Payer;
        use PayPal\Api\Payment;
        use PayPal\Api\RedirectUrls;
        use PayPal\Api\Transaction;

        require 'app/start.php';
        $checkout_data = json_decode(file_get_contents('php://input'));
        $product = $checkout_data -> milestone;
        $price = (float) $checkout_data -> milestone_value;
        $currency = $checkout_data -> currency;
        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Set redirect urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://localhost:3000/process.php')
                ->setCancelUrl('http://localhost:3000/cancel.php');

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency("USD")
                ->setTotal(10);

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setDescription("Payment description");

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
        
        // Create payment with valid API context
        try {
                $payment->create($apiContext);
        
                // Get PayPal redirect URL and redirect user
                $approvalUrl = $payment->getApprovalLink();
      
        // REDIRECT USER TO $approvalUrl
      } catch (PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
      } catch (Exception $ex) {
                die($ex);
      }
      echo  $approvalUrl;
?>