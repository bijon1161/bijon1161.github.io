<?php
  
  $from_name = $_POST['name'];
  $from_email = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['message'];

  $conn = new mysqli('localhost', 'root', 'portfolio');
  if($conn->connect_error) {
    die('Connection Failed');
  } else {
    $stmt = $conn->prepare("insert into contact(name, email, subject, message) values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $from_name, $from_email, $subject, $msg);
    $stmt->execute();
    echo "Success!";
    $stmt->close();
    $conn->close();

  }

?>
