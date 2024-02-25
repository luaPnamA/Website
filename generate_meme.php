<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get meme text from the form
    $memeText = $_POST["memeText"];
    
    // Get meme image from the form
    $memeImage = $_FILES["memeImage"]["tmp_name"];
    
    // Check if an image is uploaded
    if (!empty($memeImage)) {
        // Load the uploaded image
        $image = imagecreatefromstring(file_get_contents($memeImage));

        // Set the font size and path
        $font_size = 20;
        $font_path = 'arial.ttf'; // Change the font path as per your system

        // Set the color and transparency for the text
        $text_color = imagecolorallocate($image, 255, 255, 255); // White color
        $text_transparency = 0; // 0 to 127 for transparency level

        // Set the position to overlay text
        $x = 50; // X coordinate
        $y = 50; // Y coordinate

        // Add the text to the image
        imagettftext($image, $font_size, 0, $x, $y, $text_color, $font_path, $memeText);

        // Output the image
        header('Content-type: image/jpeg');
        imagejpeg($image);

        // Free up memory
        imagedestroy($image);
    } else {
        // If no image is uploaded, return an error message
        echo "Error: No image uploaded!";
    }
}
?>