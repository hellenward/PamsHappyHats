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

function setId(&$object) {
  $id = guidv4(openssl_random_pseudo_bytes(16));
  $object["id"] = $id;
}

function guidv4($data)
{
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function getProduct($id) {
  $data = loadData();
  foreach ($data as $item) {
    if ($item["id"] === $id) {
      return $item;
    }
  }
}

?>
