<?php
// updateUserSubmit
if (isset($_POST['submit_section_update'])) {
    if ($_POST['section'] != "") {
        // once section id is captured, proceed
        $image_url = "";
        // first, with image procession
        function compressImage($source, $destination, $quality)
        {
            // Get image info 
            $imgInfo = getimagesize($source);
            $mime = $imgInfo['mime'];

            // Create a new image from file 
            switch ($mime) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($source);
                    imagejpeg($image, $destination, $quality);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($source);
                    imagepng($image, $destination, $quality);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($source);
                    imagegif($image, $destination, $quality);
                    break;
                default:
                    $image = imagecreatefromjpeg($source);
                    imagejpeg($image, $destination, $quality);
            }


            // Return compressed image 
            return $destination;
        }

        // File upload path 
        $uploadPath = "./images/";

        // -- Image upload handling here
        if (!empty($_FILES["fileToUpload"]["name"])) {
            // File info 
            $fileName = basename($_FILES["fileToUpload"]["name"]);
            $imageUploadPath = $uploadPath . $fileName;
            $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                // Image temp source 
                $imageTemp = $_FILES["fileToUpload"]["tmp_name"];

                // Compress size and upload image 
                $compressedImage = compressImage($imageTemp, $imageUploadPath, 75);

                if ($compressedImage) {
                    // end image processing
                    $image_url = $fileName;    
                }
                
            } else {
                $reg_error = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
                echo '<script>alert("' . $reg_error . '")</script>';
            }
            
        } 
        
        // and start pushing data to the API with image fileName
        $section_id = urlencode($_POST['section']);
        
        // check fields have data and handle the situation
        $description = isset($_POST['description']) && $_POST['description'] != "" ? urlencode($_POST['description']) : "";
        $image_url =  $image_url != "" ? urlencode($image_url) : "";
        
        // clear the _POST array data
        $_POST = array();

        $jsonobj =  file_get_contents("https://api.globestationers.com/api/section/updateSection.php?id=$section_id&description=$description&image_url=$image_url");

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
        



    } else {
        $reg_error = "Select Section to update";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}