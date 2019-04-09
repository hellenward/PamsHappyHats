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
  $text = json_encode($jsonData, JSON_PRETTY_PRINT);
  file_put_contents("./Uploads/data.json", $text);
}

function createHat($fields, $image, &$output) {
  $hat = array();
  $hat["type"] = "hat";
  $hat["name"] = $fields["name"];
  $hat["pricingTier"] = $fields["pricingTier"];
  $hat["image"] = $image; 
  $hat["showOnCommissions"] = $fields["showOnCommissions"];
  setPriceBands($fields["pricingTier"], $hat);
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

function setPriceBands($pricingTier, &$output) {
  if ($pricingTier === "bronze") {
    $output["premie"] = "£7.00";
    $output["newborn"] = "£8.00";
    $output["extraSmall"] = "£9.00";
    $output["small"] = "£10.00";
    $output["medium"] = "£11.00";
    $output["large"] = "£12.00";
    $output["extraLarge"] = "£13.00";
  } elseif ($pricingTier === "silver") {
    $output["premie"] = "£8.00";
    $output["newborn"] = "£9.00";
    $output["extraSmall"] = "£10.00";
    $output["small"] = "£11.00";
    $output["medium"] = "£12.00";
    $output["large"] = "£13.00";
    $output["extraLarge"] = "£14.00";
  } elseif ($pricingTier === "gold") {
    $output["premie"] = "£9.00";
    $output["newborn"] = "£10.00";
    $output["extraSmall"] = "£11.00";
    $output["small"] = "£12.00";
    $output["medium"] = "£13.00";
    $output["large"] = "£14.00";
    $output["extraLarge"] = "£15.00";
  }
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
  if(isset($_FILES["pic"])) {
    $image = savePicture($_FILES["pic"]);
  } else {
    $image = false;
  }
  if($form["productType"] === "hat") {
    $jsonData = loadData();
    createHat($form, $image, $jsonData);
    saveData($jsonData);
  } elseif($form["productType"] === "commission") {
    $jsonDataCommissions = loadDataCommissions();
    createCommission($form, $jsonDataCommissions);
    saveDataCommissions($jsonDataCommissions);
  }
  $submitted = true;
}


 ?>
