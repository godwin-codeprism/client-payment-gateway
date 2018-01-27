<?php
 require 'vendor/autoload.php';
 
 define("SITE_URL","http://localhost/client-payment-gateway");

 $paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      'AS3ITTor-oWP4aCtfOnxJ0-IaueM5jqntmJAnU5frTctDwNmAuK0qQZatThn_JwOFSXh-3gn-Gb5qqAA',
      'EI1UEC1cch5GnG71CozAwi7Bzy3Lw413gBWWanUwmgmvK0uu-mhpe-p0demf2Yh6YBfN6lfBAvADP5vp'
    )
  );

  /*new \PayPal\Auth\OAuthTokenCredential(
    'ASxJc9pG9wguvb3IoO4JaJ2uBWSjyiqw0NSXVGR9YPprKgfEWBooVtD3Hft2ktb0S9nwlpYm0M2Uenh5',
    'EGqjcuQB3KAHJ4RSTwaDB22sFVJnCZqgHsk-qPO5DetZlLvWE0Wz7XEbF647auH9KXSFbn9HSTx6TSxz'
  )*/
?>