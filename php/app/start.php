<?php
 require 'vendor/autoload.php';
 
 define("SITE_URL","http://localhost/client-payment-gateway");

 $paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      'AZ0HyVg5-DbwiosuWs5BUqSa3ghsa3gVaNuCBfVkaYSSLjhwAzggTqDI0NWO-ovmSsK5bkEtPBLEQ2Ik',
      'EBMm1E8Fh-BJL4aevyGzus8awfyqLeU-4IhCRsaK2i4EfTFmUXHiLtX60ew7kRM22qmblH1LziKHnpYC'
    )
  );

  $paypal->setConfig(
    array(
      'mode'=>'sandbox',
      'http.ConnectionTimeOut' => 1000,
      'log.LogEnabled' => true,
      'log.FileName' => './paypal.log',
      'log.LogLevel' => 'FINE'
    )
  )

  /*
      live
    new \PayPal\Auth\OAuthTokenCredential(
      'AS3ITTor-oWP4aCtfOnxJ0-IaueM5jqntmJAnU5frTctDwNmAuK0qQZatThn_JwOFSXh-3gn-Gb5qqAA',
      'EGvZx6ptm4rKWyfd9vT_FCJtgljkZoHn5z2HjIjg8OUhMd0eO-k0wZiMy3LVxvIqoOx4OWb6-ugYsgsk'
    )
    
    sandbox
    new \PayPal\Auth\OAuthTokenCredential(
      'AZ0HyVg5-DbwiosuWs5BUqSa3ghsa3gVaNuCBfVkaYSSLjhwAzggTqDI0NWO-ovmSsK5bkEtPBLEQ2Ik',
      'EBMm1E8Fh-BJL4aevyGzus8awfyqLeU-4IhCRsaK2i4EfTFmUXHiLtX60ew7kRM22qmblH1LziKHnpYC'
    )
    
    */
?>