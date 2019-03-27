<?php
include("functions.php");

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

function saveData($jsonData) {
  $text = json_encode($jsonData);
  file_put_contents("./Uploads/data.json", $text);
}

function saveDataCommissions($jsonDataCommissions) {
  $text = json_encode($jsonDataCommissions);
  file_put_contents("./Uploads/dataCommissions.json", $text);
}

function createHat($fields, &$output) {
  $hat = array();
  $hat["type"] = "hat";
  $hat["name"] = $fields["name"];
  $hat["pricingTier"] = $fields["pricingTier"];
  $hat["showOnCommissions"] = $fields["showOnCommissions"];
  array_push($output, $hat);
}

function createCommission($fields, &$output) {
  $commission = array();
  $commission["type"] = "commission";
  $commission["name"] = $fields["name"];
  $commission["pricingTier"] = $fields["pricingTier"];
  $commission["showOnHats"] = $fields["showOnHats"];
  $commission["showOnFigures"] = $fields["showOnFigures"];
  array_push($commission, $output);
}

$submitted = false;
$form = array();

getFields([
  "productType",
  "name",
  "pic",
  "pricingTier",
  "showOnCommissions",
  "showOnHats",
  "showOnFigures"
], $form);

if($form["productType"]) {
  if($form["productType"] === "hat") {
    $jsonData = loadData();
    createHat($form, $jsonData);
    saveData($jsonData);
  } elseif($form["productType"] === "commission") {
    $jsonDataCommissions = loadDataCommissions();
    createCommission($form, $jsonDataCommissions);
    saveDataCommissions($jsonDataCommissions);
  }
  $submitted = true;
}

 ?>
