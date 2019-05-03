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
  $error = validate($fields, $image, array("name", "pricingTier", "showOnCommissions"));
  if ($error) {
    return $error;
  }
  $hat = array();
  setId($hat);
  $hat["type"] = "hat";
  $hat["name"] = $fields["name"];
  $hat["pricingTier"] = $fields["pricingTier"];
  $hat["image"] = $image;
  $hat["showOnCommissions"] = $fields["showOnCommissions"];
  setPriceBands($fields["pricingTier"], $hat);
  array_push($output, $hat);
}

function createFigure($fields, $image, &$output) {
  $error =  validate($fields, $image, array("name", "showOnCommissions"));
  if($error) {
    return $error;
  }
  $figure = array();
  setId($figure);
  $figure["type"] = "collectableFigure";
  $figure["name"] = $fields["name"];
  $figure["price"] = "£10.00";
  $figure["image"] = $image;
  $figure["showOnCommissions"] = $fields["showOnCommissions"];
  array_push($output, $figure);
}

function createEvent($fields, $image, &$output) {
  $error = validate($fields, $image, array("name", "url", "startDate", "address"));
  if($error) {
    return $error;
  }
  $event = array();
  setId($event);
  $event["type"] = "event";
  $event["name"] = $fields["name"];
  $event["url"] = $fields["url"];
  $event["startDate"] = $fields["startDate"];
  $event["endDate"] = $fields["endDate"];
  $event["address"] = $fields["address"];
  $event["image"]  = $image;
  array_push($output, $event);
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

function validate($item, $image, $fields) {
  if (!$image) {
    return "missing image.";
  }
  foreach($fields as $field) {
    if(!isset($item[$field]) || $item[$field] === "") {
      return "Missing " . $field;
    }
  }
}

$submitted = false;
$form = array();

getFields([
  "productType",
  "name",
  "url",
  "pic",
  "pricingTier",
  "showOnCommissions",
  "showOnHats",
  "showOnFigures",
  "startDate",
  "endDate",
  "address"
], $form);

if($form["productType"]) {
  if(isset($_FILES["pic"])) {
    $image = savePicture($_FILES["pic"]);
  } else {
    $image = false;
  }
  $error = false;
  $jsonData = loadData();
  if($form["productType"] === "hat") {
    $error = createHat($form, $image, $jsonData);
  } elseif ($form["productType"] === "figure") {
    $error = createFigure($form, $image, $jsonData);
  } elseif ($form["productType"] === "event") {
    $error = createEvent($form, $image, $jsonData);
  }
  $submitted = true;
  if(!$error) {
    saveData($jsonData);
  }
}

 ?>
