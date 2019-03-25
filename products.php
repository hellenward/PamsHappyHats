<?php
include("functions.php");

function applyFilter($products, &$output) {
  foreach ($products as $product) {
    if($product["type"] === "hat") {
        array_push($output, $product);
    }
  }
}

$json = loadData();
$hats = [];
applyFilter($json, $hats);
echo json_encode($hats);

?>
