<?php
// Check if selectedFiles is set and not empty
if (isset($_POST['selectedFiles']) && !empty($_POST['selectedFiles'])) {
    // Get the selected file names
    $selectedFiles = explode(',', $_POST['selectedFiles']);

    // Loop through the selected files and delete them
    foreach ($selectedFiles as $file) {
        // Construct the path to the file
        $filePath = "../../uploads/" . $file;

        // Check if the file exists and is writable
        if (file_exists($filePath) && is_writable($filePath)) {
            // Attempt to delete the file
            if (unlink($filePath)) {
                echo "File '$file' has been deleted successfully.";
            } else {
                echo "Error deleting file '$file'.";
            }
        } else {
            echo "File '$file' does not exist or is not writable.";
        }
    }
} else {
    echo "No files selected for deletion.";
}
?>
