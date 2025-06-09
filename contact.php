<?php
// Check if the form was submitted by checking for the 'submit' button's name attribute
if (isset($_POST['submit'])) {

    // --- CONFIGURATION ---
    // Change this to your email address
    $recipient_email = "your-email@example.com"; 

    // --- GET FORM DATA ---
    // Sanitize user input to prevent security issues
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // --- VALIDATION ---
    // Check if the sanitized email is a valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format.";
        exit; // Stop the script
    }

    // --- PREPARE EMAIL ---
    $subject = "New Contact Form Message from RentalRyders";
    
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n\n";
    $email_body .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    // --- SEND EMAIL ---
    // The mail() function uses the server's email capabilities
    if (mail($recipient_email, $subject, $email_body, $headers)) {
        // If the email is sent successfully, redirect to a success page
        // For simplicity, we'll redirect back to the contact section with a success message
        header("Location: index.html?status=success#contact");
    } else {
        // If there's an error, redirect with a failure message
        header("Location: index.html?status=error#contact");
    }

} else {
    // If the form wasn't submitted correctly, just show an error message.
    echo "There was a problem with your submission, please try again.";
}
?>