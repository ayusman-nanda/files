<?php
if(isset($_FILES["file"])) {
    $files = $_FILES["file"];
    $uploadDir = "../../uploads/";

    // Loop through each file
    for($i = 0; $i < count($files["name"]); $i++) {
        $fileName = $files["name"][$i];
        $fileTmpName = $files["tmp_name"][$i];
        $filePath = $uploadDir . $fileName;

        // Move the file to the upload directory
        move_uploaded_file($fileTmpName, $filePath);
    }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);
?>
