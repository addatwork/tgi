<?php
require_once 'lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('qnx5m3xq44zs4gp2');
Braintree_Configuration::publicKey('kk4v2xwcqx92q2mw');
Braintree_Configuration::privateKey('10388fbdbfb8d61549e5973bef6c700f');

//simple transaction

// $result = Braintree_Transaction::sale(array(
//     'amount' => '123.00',
//     'creditCard' => array(
//         'number' => '4111111111111111',
//         'expirationDate' => '05/12'
//     )
// ));



// store in vault

// $result = Braintree_Transaction::sale(array(
//   'amount' => '10.00',
//   'creditCard' => array(
//     'number' => '5105105105105100',
//     'expirationDate' => '05/13',
//   ),
//   'customer' => array(
//     'firstName' => 'Dan',
//     'lastName' => 'Smith'
//   ),
//   'options' => array(
//     'storeInVaultOnSuccess' => true
//   )
// ));


// payment from vault

$result = Braintree_Transaction::sale(array(
  'amount' => '11.10',
  'customerId' => '4000842',
  'paymentMethodToken' => 'j592s'
));

echo "<pre>";

if ($result->success) {
    print_r("success!: " . $result->transaction->id);
    print_r("\n".$result);
} else if ($result->transaction) {
    print_r("Error processing transaction:");
    print_r("\n  message: " . $result->message);
    print_r("\n  code: " . $result->transaction->processorResponseCode);
    print_r("\n  text: " . $result->transaction->processorResponseText);
} else {
    print_r("Message: " . $result->message);
    print_r("\nValidation errors: \n");
    print_r($result->errors->deepAll());
}


//[token=j592s, bin=510510, last4=5100]           Customer[id=4000842]



