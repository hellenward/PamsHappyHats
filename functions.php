<?php
function loadData() {
  $json = file_get_contents("./Uploads/data.json");
  $jsonData = json_decode($json, true);
  return $jsonData;
}

function loadDataCommissions() {
  $json = file_get_contents("./Uploads/dataCommissions.json");
  $jsonDataCommissions = json_decode($json, true);
  return $jsonDataCommissions;
}

?>
