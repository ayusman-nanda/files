<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <h1 align="center">Welcome</h1>

    <marquee direction="right" color="red">Welcome To Home Server</marquee>
    <hr>

    <br>
    <br>
    <br>

    <div align="center">
        <form method="POST" action="upload.php" style="margin: auto; width: 220px;" enctype="multipart/form-data">
            <div class="chosebtn">
                <input type="file" name="file[]" id="fileInput" hidden onchange="displaySelectedFiles(this)" multiple>
                <label for="fileInput" class="button">Choose File</label>
            </div>
            <br>
            <div id="selectedFiles" style="font-weight: bold;"></div>
            <br>
            <br>
            <div class="uploadbtn">
                <input type="submit" value="Upload" id="uploadBtn" class="button">
            </div>
        </form>
    </div>

    <br>
    <hr>

    <h3><b>Recently Uploaded Files On The Server:</b></h3>

    <hr>
    <br>

    <div class="a">
        <!-- Moved Delete button here -->
        <button class="button" onclick="deleteSelected()">Delete Selected</button>
        <button class="button" onclick="downloadSelected()">Download Selected</button> <!-- Added Download Selected button -->
        <button class="button" onclick="clearSelection()">Clear Selection</button> <!-- Moved Clear Selection button -->
        <button class="button" onclick="selectAll()">Select All</button> <!-- Added Select All button -->

        <?php
        $files = scandir("../../uploads");
        for ($a = 2; $a < count($files); $a++) {
            if ($files[$a] != '.' && $files[$a] != '..') {
                ?>
                <p>
                    <input type="checkbox" class="file-checkbox" name="selectedFiles[]" value="<?php echo $files[$a]; ?>">
                    <?php echo $files[$a]; ?>

                    <a class="button open" href="../../uploads/<?php echo $files[$a]; ?>" target="_blank">Open</a>
                </p>
                <?php
            }
        }
        ?>
    </div>
</body>
</html>
