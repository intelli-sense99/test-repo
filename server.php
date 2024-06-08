<?php

session_start();
$error = [];
$url = 'http://localhost/myspace/image_move/image.php';
if (!isset($_FILES['file']['name']) || empty($_FILES['file']['name'])) {
    $error[] = "image is required!";
}

if (count($error) == 0) {
    $unique_name = '';
    if (isset($_FILES['file']['name']) || !empty($_FILES['file']['name'])) {
        $img_name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $path_info = pathinfo($img_name);
        // print_r($path_info);
        $fileName = $path_info['filename'];
        $extension = strtolower($path_info['extension']);

        $accepted_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($extension, $accepted_extensions)) {
            $unique_name = time() . "." . $extension;
            // image moved destination
            $destination = './uploads/' . $unique_name;
            // to move the file use move_uploaded_file()
            $is_uploaded = move_uploaded_file($tmp_name, $destination);
            if (!$is_uploaded) {
                $error[] = "image dosen't moved";
            } else {
                $_SESSION['success'] = 'image uploaded successfully';
            }
        } else {
            $error[] = 'image type is not accepted';
        }
    }
} else {
    $_SESSION['error'] = $error;
}

header('location:' . $url);
exit;
