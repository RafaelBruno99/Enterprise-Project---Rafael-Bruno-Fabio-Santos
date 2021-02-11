
    <?php
    // Check if a file has been uploaded
    if(isset($_FILES['uploaded_file'])) {
        // Make sure the file was sent without errors
        if($_FILES['uploaded_file']['error'] == 0) {
            // Connect to the database
            $dbLink = new mysqli('localhost', 'root', '', 'enterprisedb');
            if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }

            // Gather all required data
            $dName = $dbLink->real_escape_string($_REQUEST['dname']);
            $ksb = $dbLink->real_escape_string($_REQUEST['ksb']);
            $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
            $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
            $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
            $size = intval($_FILES['uploaded_file']['size']);

            // Create the SQL query
            $query = "
                INSERT INTO `soft` (
                    `dName`, `ksb`, `name`, `mime`, `size`, `data`, `created`
                )
                VALUES (
                    '{$dName}', '{$ksb}', '{$name}', '{$mime}', {$size}, '{$data}', NOW()
                )";

            // Execute the query
            $result = $dbLink->query($query);

            // Check if it was successfull
            if($result) {
                header( 'Location:student-soft-skills.php');
            }
            else {
                echo 'Error! Failed to insert the file'
                   . "<pre>{$dbLink->error}</pre>";
            }
        }
        else {
            echo 'An error accured while the file was being uploaded. '
               . 'Error code: '. intval($_FILES['uploaded_file']['error']);
        }

        // Close the mysql connection
        $dbLink->close();
    }
    else {
        echo 'Error! A file was not sent!';
    }

    ?>
