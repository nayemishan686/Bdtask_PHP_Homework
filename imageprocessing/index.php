<?php

/**************************
  Add Text in a image
 **************************/



// //Set the Content Type
// header('Content-type: image/jpg');

// // Create Image From Existing File
// $jpg_image = imagecreatefromjpeg('nayem.jpg');

// // Allocate A Color For The Text
// $white = imagecolorallocate($jpg_image, 0, 255, 0);

// // Set Path to Font File
// $font_path = 'RemachineScript_Personal_Use.ttf';

// // Set Text to Be Printed On Image
// $text = "My Name is Nayem";

// // Print Text On Image
// imagettftext($jpg_image, 25, 0, 150, 150, $white, $font_path, $text);

// // Send Image to Browser
// imagejpeg($jpg_image);

// // Clear Memory
// imagedestroy($jpg_image);


/**************************
  Image Resize and save then add text
 **************************/


// //File and new size
// $filename = 'nayem.jpg';

// // Content type
// header('Content-Type: image/jpeg');

// // Get new sizes
// list($width, $height) = getimagesize($filename);
// $newwidth = 400;
// $newheight = 600;

// // Load
// $thumb = imagecreatetruecolor($newwidth, $newheight);
// $source = imagecreatefromjpeg($filename);

// // Resize
// imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// // Output
// imagejpeg($thumb);
// imagejpeg($thumb, "resized.jpg");

//For adding text

// //Set the Content Type
// header('Content-type: image/jpg');

// // Create Image From Existing File
// $jpg_image = imagecreatefromjpeg('resized.jpg');

// // Allocate A Color For The Text
// $white = imagecolorallocate($jpg_image, 125, 255, 0);

// // Set Path to Font File
// $font_path = 'RemachineScript_Personal_Use.ttf';

// // Set Text to Be Printed On Image
// $text = "My Name is Nayem";

// // Print Text On Image
// imagettftext($jpg_image, 25, 0, 150, 150, $white, $font_path, $text);

// // Send Image to Browser
// imagejpeg($jpg_image);

// // Clear Memory
// imagedestroy($jpg_image);





/**************************
  Image Crop and save then add text
 **************************/

//Create an image from given image
$im = imagecreatefromjpeg(
    'nayem.jpg');
      
    // find the size of image
    $size = min(imagesx($im), imagesy($im));
      
    // Set the crop image size 
    $im2 = imagecrop($im, ['x' => 290, 'y' => 150, 'width' => 300, 'height' => 250]);
    if ($im2 !== FALSE) {
        header("Content-type: image/png");
           imagepng($im2);
        imagedestroy($im2);
    }
    imagejpeg($im2, "crop.jpg");
    imagedestroy($im);

    //For adding text

    //Set the Content Type
    // header('Content-type: image/jpg');

    // // Create Image From Existing File
    // $jpg_image = imagecreatefromjpeg('crop.jpg');

    // // Allocate A Color For The Text
    // $white = imagecolorallocate($jpg_image, 125, 255, 0);

    // // Set Path to Font File
    // $font_path = 'RemachineScript_Personal_Use.ttf';

    // // Set Text to Be Printed On Image
    // $text = "The picture is croped";

    // // Print Text On Image
    // imagettftext($jpg_image, 25, 0, 150, 150, $white, $font_path, $text);

    // // Send Image to Browser
    // imagejpeg($jpg_image);

    // // Clear Memory
    // imagedestroy($jpg_image);

?>