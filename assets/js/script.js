function displaySelectedFiles(input) {
    if (input.files && input.files.length > 0) {
        var selectedFiles = "";
        for (var i = 0; i < input.files.length; i++) {
            selectedFiles += input.files[i].name + "<br>";
        }
        document.getElementById('selectedFiles').innerHTML = "Selected Files: <br>" + selectedFiles;
    }
}

function deleteSelected() {
    var checkboxes = document.querySelectorAll('.file-checkbox');
    var selectedFiles = [];
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedFiles.push(checkbox.value);
        }
    });
    if (selectedFiles.length === 0) {
        alert("Please select at least one file to delete.");
    } else {
        var confirmation = confirm("Are you sure you want to delete the selected files?");
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert(xhr.responseText); // Display response from delete.php
                        location.reload(); // Refresh the page
                    } else {
                        alert('Error: ' + xhr.status);
                    }
                }
            };
            xhr.open('POST', 'delete.php'); // Send request to delete.php
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('selectedFiles=' + encodeURIComponent(selectedFiles.join(',')));
        }
    }
}

function downloadSelected() {
    var checkboxes = document.querySelectorAll('.file-checkbox');
    var selectedFiles = [];
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedFiles.push(checkbox.value);
        }
    });
    if (selectedFiles.length === 0) {
        alert("Please select at least one file to download.");
    } else {
        // Redirect to download.php with selected files as query parameter
        window.location.href = 'download.php?selectedFiles=' + encodeURIComponent(selectedFiles.join(','));
    }
}

function clearSelection() {
    var checkboxes = document.querySelectorAll('.file-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });
}

function selectAll() {
    var checkboxes = document.querySelectorAll('.file-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;
    });
}
