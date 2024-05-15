<?php
/*
Plugin Name: Partnership Contact Form
Description: Plugin to generate a custom contact form and send emails upon submission.
Version: 1.0
Author: Nydoz Team
*/

// Enqueue scripts and styles
function custom_contact_form_scripts() {
    // Enqueue scripts and styles here if needed
}
add_action('wp_enqueue_scripts', 'custom_contact_form_scripts');

// Define the form markup
function custom_contact_form_shortcode() {
    ob_start();
    ?>
    <form id="custom-contact-form" method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_contact_form', 'custom_contact_form_shortcode');

// Process form submission
function process_custom_contact_form() {
    if (isset($_POST['submit'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_text_field($_POST['message']);

        // Send email to admin
        $admin_email = 'prabin@nydoz.com';
        $admin_subject = 'New Contact Form Submission';
        $admin_message = "Name: $name\n";
        $admin_message .= "Email: $email\n";
        $admin_message .= "Message: $message\n";
        wp_mail($admin_email, $admin_subject, $admin_message);

        // Send email to client
        $client_subject = 'Thank you for contacting us';
        $client_message = "Dear $name,\n\nThank you for contacting us. We will get back to you soon.";
        wp_mail($email, $client_subject, $client_message);

        // Redirect after submission
        wp_redirect(home_url('/become-a-partner'));
        exit();
    }
}
add_action('init', 'process_custom_contact_form');
