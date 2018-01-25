<?php
 require 'vendor/autoload.php';
 
 define("SITE_URL","http://localhost/client-payment-gateway");

 $paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      'ASxJc9pG9wguvb3IoO4JaJ2uBWSjyiqw0NSXVGR9YPprKgfEWBooVtD3Hft2ktb0S9nwlpYm0M2Uenh5',
      'EGqjcuQB3KAHJ4RSTwaDB22sFVJnCZqgHsk-qPO5DetZlLvWE0Wz7XEbF647auH9KXSFbn9HSTx6TSxz'
    )
  );
?>