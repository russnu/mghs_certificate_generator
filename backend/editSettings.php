<?php
header('Access-Control-Allow-Origin: *');

include ('./certConnect.php');

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if any file is uploaded

    // Handle company name ==================================================================================================================================//
    if (isset($_POST['company_name'])) {
        $companyName = mysqli_real_escape_string($connect, $_POST['company_name']);
        $query = "INSERT INTO settings (setting_name, setting_value) VALUES ('company_name', '$companyName') ON DUPLICATE KEY UPDATE setting_value='$companyName'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $response['success'] = true;
            $response['message'][] = 'Company name saved successfully.';
        } else {
            $response['message'][] = 'Error saving company name to database: ' . mysqli_error($connect);
        }
    }
    //==================================================================================================================================//
    if (isset($_POST['signatory_name1'])) {
        $signatoryName1 = mysqli_real_escape_string($connect, $_POST['signatory_name1']);
        $query = "INSERT INTO settings (setting_name, setting_value) VALUES ('signatory_name1', '$signatoryName1') ON DUPLICATE KEY UPDATE setting_value='$signatoryName1'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $response['success'] = true;
            $response['message'][] = 'Signatory name saved successfully.';
        } else {
            $response['message'][] = 'Error saving signatory name to database: ' . mysqli_error($connect);
        }
    }
    //==================================================================================================================================//
    if (isset($_POST['signatory_name2'])) {
        $signatoryName2 = mysqli_real_escape_string($connect, $_POST['signatory_name2']);
        $query = "INSERT INTO settings (setting_name, setting_value) VALUES ('signatory_name2', '$signatoryName2') ON DUPLICATE KEY UPDATE setting_value='$signatoryName2'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $response['success'] = true;
            $response['message'][] = 'Signatory name saved successfully.';
        } else {
            $response['message'][] = 'Error saving signatory name to database: ' . mysqli_error($connect);
        }
    }
    //==================================================================================================================================//
    if (isset($_POST['signatory_title1'])) {
        $signatoryTitle1 = mysqli_real_escape_string($connect, $_POST['signatory_title1']);
        $query = "INSERT INTO settings (setting_name, setting_value) VALUES ('signatory_title1', '$signatoryTitle1') ON DUPLICATE KEY UPDATE setting_value='$signatoryTitle1'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $response['success'] = true;
            $response['message'][] = 'Signatory title saved successfully.';
        } else {
            $response['message'][] = 'Error saving signatory title to database: ' . mysqli_error($connect);
        }
    }
    //==================================================================================================================================//
    if (isset($_POST['signatory_title2'])) {
        $signatoryTitle2 = mysqli_real_escape_string($connect, $_POST['signatory_title2']);
        $query = "INSERT INTO settings (setting_name, setting_value) VALUES ('signatory_title2', '$signatoryTitle2') ON DUPLICATE KEY UPDATE setting_value='$signatoryTitle2'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $response['success'] = true;
            $response['message'][] = 'Signatory title saved successfully.';
        } else {
            $response['message'][] = 'Error saving signatory title to database: ' . mysqli_error($connect);
        }
    }


    if (!empty($_FILES)) {
        // Loop through each file input
        foreach ($_FILES as $key => $file) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($file['name']);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                $check = getimagesize($file['tmp_name']);
                if ($check === false) {
                    $response = ['success' => false, 'message' => 'File is not an image.'];
                    $uploadOk = 0;
                }

                // // Check file size (optional)
                // if ($file['size'] > 500000) {
                //     $response = ['success' => false, 'message' => 'Sorry, your file is too large.'];
                //     $uploadOk = 0;
                // }

                // // Allow certain file formats (optional)
                // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                //     $response = ['success' => false, 'message' => 'Sorry, only JPG, JPEG, and PNG files are allowed.'];
                //     $uploadOk = 0;
                // }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $response = ['success' => false, 'message' => 'Sorry, your file was not uploaded.'];
                } else {
                    if (move_uploaded_file($file['tmp_name'], $targetFile)) {

                        $settingName = $key;
                        $settingValue = $targetFile;


                        $query = "INSERT INTO settings (setting_name, setting_value) VALUES ('$settingName', '$settingValue') ON DUPLICATE KEY UPDATE setting_value='$settingValue'";
                        $result = mysqli_query($connect, $query);

                        if ($result) {
                            $response = [
                                'success' => true,
                                'message' => 'File uploaded successfully.',
                                $settingName . 'Url' => $targetFile
                            ];
                        } else {
                            $response = ['success' => false, 'message' => 'Error saving file path to database: ' . mysqli_error($connect)];
                        }
                    } else {
                        $response = ['success' => false, 'message' => 'Sorry, there was an error uploading your file.'];
                    }
                }
            } else {
                $response = ['success' => false, 'message' => 'Error with file upload: ' . $file['error']];
            }
        }
    }
}
echo json_encode($response);
?>