<?php

function getField($field, &$destination) {
  if (isset($_POST[$field])) {
    $destination[$field] = $_POST[$field];
  } else {
    $destination[$field] = "";
  }
}

function getFields($fields, &$destination) {
  foreach ($fields as $field) {
    getField($field, $destination);
  }
}

$submitted = false;
$form = array();

getFields([
  "productType",
  "name",
  "pic",
  "pricingTier",
  "showOnCommissions"
], $form);

if($form["productType"]) {
  print_r($form);
  $submitted = true;
}

 ?>
