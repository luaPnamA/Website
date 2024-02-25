<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];
    
    // Set up the email parameters
    $to = "your@email.com"; // Change this to your email address
    $subject = "New registration";
    $message = "A new user has registered with the email: $email";
    $headers = "From: your@email.com"; // Change this to your email address

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
}
?>