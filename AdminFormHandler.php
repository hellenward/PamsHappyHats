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
  $error = validateHat($fields);
  if ($error) {
    return $error;
  }
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
    $output["Premie"] = "£7.00";
    $output["Newborn"] = "£8.00";
    $output["Extra Small"] = "£9.00";
    $output["Small"] = "£10.00";
    $output["Medium"] = "£11.00";
    $output["Large"] = "£12.00";
    $output["Extra Large"] = "£13.00";
  } elseif ($pricingTier === "silver") {
    $output["Premie"] = "£8.00";
    $output["Newborn"] = "£9.00";
    $output["Extra Small"] = "£10.00";
    $output["Small"] = "£11.00";
    $output["Medium"] = "£12.00";
    $output["Large"] = "£13.00";
    $output["Extra Large"] = "£14.00";
  } elseif ($pricingTier === "gold") {
    $output["Premie"] = "£9.00";
    $output["Newborn"] = "£10.00";
    $output["Extra Small"] = "£11.00";
    $output["Small"] = "£12.00";
    $output["Medium"] = "£13.00";
    $output["Large"] = "£14.00";
    $output["Extra Large"] = "£15.00";
  }
}

function validateHat($hat) {
  $fields = array("name", "pricingTier", "showOnCommissions");
  foreach($fields as $field) {
    if(!isset($hat[$field]) || $hat[$field] === "") {
      return "Missing " . $field;
    }
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
    $error = createHat($form, $image, $jsonData);
    saveData($jsonData);
  } elseif($form["productType"] === "commission") {
    $jsonDataCommissions = loadDataCommissions();
    createCommission($form, $jsonDataCommissions);
    saveDataCommissions($jsonDataCommissions);
  }
  $submitted = true;
}

 ?>
