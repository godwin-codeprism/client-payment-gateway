<?php
    require 'app/start.php';

    use PayPal\Api\Amount;
    use PayPal\Api\Details;
    use PayPal\Api\ExecutePayment;
    use PayPal\Api\Payment;
    use PayPal\Api\PaymentExecution;
    use PayPal\Api\Transaction;
    if(!isset($_GET['success'],$_GET['paymentId'],$_GET['PayerID'])){
        die();
    }

    if((bool)$_GET['success'] == false){
        // must implement the redirect later. You just cant kill the page here. User must know the payment is failed.
        die();
    }
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $paypal);
    $payerId = $_GET['PayerID'];
    
    // Execute payment with payer id
    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

    try {
    // Execute payment
        $result = $payment->execute($execution, $paypal);
        echo var_dump($result);
    } catch (PayPal\Exception\PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
    } catch (Exception $ex) {
        die($ex);
    }
    echo "Payment Made fuck off";
?>