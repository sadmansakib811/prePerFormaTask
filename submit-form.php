<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST["name"];
  $countryCode = $_POST["countryCode"];
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];

  // Validate the mobile number
  $isValidMobile = preg_match("/^\d{10}$/", $mobile);

  // Validate the email address
  $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

  if ($isValidMobile && $isValidEmail) {
    // Compose the email message
    $to = "sadmansakib123450@gmail.com";
    $subject = "New Form Submission";
    $message = "Name: $name\n";
    $message .= "Country Code: $countryCode\n";
    $message .= "Mobile Number: $mobile\n";
    $message .= "Email: $email\n";

    // Send the email
    mail($to, $subject, $message);

    // Redirect the user to a success page
    header("Location: success.html");
    exit;
  } else {
    // Redirect the user to an error page
    header("Location: error.html");
    exit;
  }
}
?>
