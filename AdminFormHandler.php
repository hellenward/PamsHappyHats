<?php
$submitted = false;
if (isset($_POST["productType"])) {
  $productType = $_POST["productType"];
} else {
  $productType = "";
}

if($productType) {
  console.log('.$productType');
  $submitted = true;
}

 ?>
