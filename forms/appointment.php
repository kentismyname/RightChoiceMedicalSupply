<?php
// Replace with your actual email address
$receiving_email_address = 'johnkennethdalisay9@gmail.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $meeting_type = htmlspecialchars($_POST['meeting_type']);
    $lead_type = htmlspecialchars($_POST['lead_type']);
    $message = htmlspecialchars($_POST['message']);

    // Email subject and body
    $subject = "New Meeting Request from $name";
    $email_body = "
        You have received a new meeting request.\n\n
        Name: $name\n
        Email: $email\n
        Phone: $phone\n
        Preferred Meeting Date: $date\n
        Meeting Type: $meeting_type\n
        Lead Type: $lead_type\n
        Additional Message: $message\n
    ";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($receiving_email_address, $subject, $email_body, $headers)) {
        echo 'Your meeting request has been sent successfully. Thank you!';
    } else {
        echo 'Sorry, there was an error sending your request. Please try again later.';
    }
} else {
    echo 'Invalid request method.';
}
?>
