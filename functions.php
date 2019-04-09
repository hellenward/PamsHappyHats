<?php
function loadData() {
  $json = file_get_contents("./Uploads/data.json");
  $jsonData = json_decode($json, true);
  return $jsonData;
}

function savePicture($source) {
  $destination = "./Thumbs/" . $source["name"];
  if (move_uploaded_file($source["tmp_name"], $destination)) {
    return $destination; 
  }
  return false;
}
?>
