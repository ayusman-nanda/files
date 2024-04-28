<?php
// Check if selectedFiles parameter is set and not empty
if (isset($_GET['selectedFiles']) && !empty($_GET['selectedFiles'])) {
    // Get the selected files from the GET request
    $selectedFiles = $_GET['selectedFiles'];

    // Convert the comma-separated list of file names into an array
    $filesArray = explode(',', $selectedFiles);

    // Set the appropriate headers to force the browser to treat the response as multiple file downloads
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="selected_files.zip"');

    // Loop through each selected file and send it to the browser for download
    foreach ($filesArray as $file) {
        // Make sure the file exists and is readable
        $filePath = '../../uploads/' . $file;
        if (file_exists($filePath) && is_readable($filePath)) {
            // Read the file contents and send it to the browser
            readfile($filePath);
        }
    }
} else {
    // If selectedFiles parameter is not set or empty, return an error message
    echo "No files selected for download.";
}
?>
