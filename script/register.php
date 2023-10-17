<?php

include '../env.php';

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "pvbdb";

try {
  $conn = new mysqli($SERVER_NAME, $USERNAME, $PASSWORD, $DATABASE_NAME);
  
 // Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// retreive data from form
  $fname = $_POST["first_name"];
  $lname = $_POST["last_name"];
  $email = $_POST["email"];
  $phonenumber = $_POST["phone_number"]
  $password = $_POST["password"];

  // Insert data into the database
  $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES ('$fname', '$lname', '$email', '$phonenumber MD5('$password'))";
  $stmt = $conn->prepare($sql);

  if ($stmt->execute()) {
      echo "Registerd successful!";
  } else {    
      echo "Error: " . $stmt->error;
  }

  $stmt->close();

  //   echo "Query Successfully";
  header("Location: {$APP_URL}/index.php");

}

catch(Exception $e) {
  echo "Query Failed . $e->getMessage() ";
}
?>