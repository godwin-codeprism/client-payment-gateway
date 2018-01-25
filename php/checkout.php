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
    $price = $checkout_data -> milestone_value;
    $currency = $checkout_data -> currency;

    $payer = new Payer();

    $item = new item();
    $item -> setName($product)
        -> setCurrency($currency)
        -> setQuantity(1)
        -> setPrice($price);
    
    $itemList = new ItemList();
    $itemList -> setItems([$item]);

    $details = new Details();
    $details -> setShipping(0)
            -> setSubtotal($price);

    $amount = new Amount();
    $amount -> setCurrency($currency)
            -> setTotal($price)
            -> setDetails($details);

    $transaction = new Transaction();
    $transaction -> setAmount($amount)
                -> setDescription('Godwinvc Testing')
                -> setInvoiceNumber(uniqid());

?>