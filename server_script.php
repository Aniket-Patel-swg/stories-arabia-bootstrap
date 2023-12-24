<?php

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Collect form data
      $number = $_POST["number"];
      $date = $_POST["date"];
      $timing = $_POST["timing"];
      $message = $_POST["message"];

      // Set the recipient email address
      $to = "patelaniket1207@gmail.com";

      // Set the email subject
      $subject = "New Form Submission";

      // Compose the email message
      $messageBody = "Phone Number: $number\n";
      $messageBody .= "Preferred Date: $date\n";
      $messageBody .= "Preferred Timing: $timing\n";
      $messageBody .= "Message: $message\n";

      // Set additional headers if needed
      $headers = "From: patelaniket1207@gmail.cmo"; 

      // Send the email
      $success = mail($to, $subject, $messageBody, $headers);

      error_log("Received a POST request");
      error_log("Form Data: " . print_r($_POST, true));

      if ($success) {
          // Send a JSON response to the client
          echo json_encode(["status" => "success", "message" => "Form submitted successfully"]);
      } else {
          echo json_encode(["status" => "error", "message" => "Failed to send the form"]);
      }
  } else {
      // Handle invalid requests
      echo json_encode(["status" => "error", "message" => "Invalid request method"]);
  }

?>