<?php
include("functions.php");

function applyFilter($products, &$output, $filter) {
  foreach ($products as $product) {
    if($filter === "commission") {
      if(isset($product["isCommission"]) && $product["isCommission"] === true) {
        array_push($output, $product);
      }
    } elseif($product["type"] === $filter) {
        array_push($output, $product);
    }
  }
}

$json = loadData();
$results = [];
$filter = $_GET["type"];
applyFilter($json, $results, $filter);
echo json_encode($results);

?>
