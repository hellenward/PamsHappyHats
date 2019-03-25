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

function loadData() {
  $json = file_get_contents("./Uploads/data.json");
  $jsonData = json_decode($json, true);
  return $jsonData;
}

function saveData($jsonData) {
  $text = json_encode($jsonData);
  file_put_contents("./Uploads/data.json", $text);
}

function createHat($fields, &$output) {
  $hat = array();
  $hat["type"] = "hat";
  $hat["name"] = $fields["name"];
  $hat["pricingTier"] = $fields["pricingTier"];
  $hat["showOnCommissions"] = $fields["showOnCommissions"];
  array_push($output, $hat);
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
  $jsonData = loadData();
  if($form["productType"] === "hat") {
    createHat($form, $jsonData);
  }
  saveData($jsonData);
  print_r($jsonData);
  $submitted = true;
}

 ?>
