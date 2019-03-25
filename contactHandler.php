<?php
$emailed = false;
if (isset($_POST["name"])) {
  $name = $_POST["name"];
} else {
  $name = "";
}

if (isset($_POST["email"])) {
  $email = $_POST["email"];
} else {
  $email = "";
}
if (isset($_POST["message"])) {
  $message = $_POST["message"];
} else {
  $message = "";
}


if($name && $email && $message) {
  mail("hellenwellsward@gmail.com", "Contact from Pam's Happy Hats Website",
  "from: ".$name." (".$email.")\n".$message);
  $emailed = true;
}

?>
