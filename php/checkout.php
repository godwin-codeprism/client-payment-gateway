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
    //echo var_dump($price);


    $payer = new Payer();
    $payer->setPaymentMethod("paypal");

    $item = new item();
    $item -> setName($product)
        -> setCurrency('USD')
        -> setQuantity(1)
        -> setPrice($price);
    
    $itemList = new ItemList();
    $itemList -> setItems([$item]);

    $details = new Details();
        $details->setShipping(0.00)
                ->setTax(0.00)
                ->setSubtotal($price);

    $amount = new Amount();
    $amount -> setCurrency('USD')
            -> setTotal($price);

    $transaction = new Transaction();
    $transaction -> setAmount($amount)
                -> setDescription($product)
                -> setInvoiceNumber(uniqid());

    $redirectUrls = new RedirectUrls();
    $redirectUrls -> setReturnUrl("http://localhost/client-payment-gateway")
                  -> setCancelUrl("http://localhost/client-payment-gateway");

    $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

                try {
                        $payment->create($paypal);
                
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
       
       echo $approvalUrl;

?>