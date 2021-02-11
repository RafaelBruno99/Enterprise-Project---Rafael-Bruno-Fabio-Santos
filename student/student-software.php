<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Student</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="student.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/standard.css">
</head>
<body>
<div class="box-area">
    <header>
        <div class="wrapper">
            <div class="logo">
                <a href="student.php">APPRENTICESHIP</a>
            </div>
            <nav>
                <a href="student-software.php">SOFTWARE</a> <a href="student-research.php">RESEARCH</a> <a
                        href="student-open-source.php">OPEN SOURCE</a> <a href="student-soft-skills.php">SOFT SKILLS</a>
                <a href="student-network.php">NETWORK</a>
                <a href="../logout.php"><button type="button" class="btn btn-success" >Logout</button></a>

            </nav>
        </div>
    </header>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">SOFTWARE ENGINEERING</h2>
                    <div class="test">
                        <button onclick="togglePopup()" class="example_b" value="Add a new document">Add new document
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <form action="../student/record-delete.php" method="post">
                            <table class="table table-bordered table-dark table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Document</th>
                                    <th>KSBs</th>
                                    <th>File</th>
                                    <th>Mime</th>
                                    <th>Size</th>
                                    <th>Created</th>
                                    <th>Delete</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "enterprisedb");
                                if ($conn->connect_error) {
                                    die("Connection Failed:" . $conn->connect_error);
                                }

                                $sql = 'SELECT id, dName, ksb, name, mime, size, data, created FROM file';
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row['id'] . "</td>
                        <td>" . $row['dName'] . "</td>
                        <td>" . $row['ksb'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['mime'] . "</td>
                        <td>" . $row['size'] . "</td>
                        <td>" . $row['created'] . "</td>
                        <td><input type='checkbox' name='checkbox[]' value='" . $row['id'] . "'></td>
                        <td><button type='submit' name='delete_software' id='delete' class='example_c' value='Delete Records'>Delete</button></td>
                        </tr>";
                                    }
                                    echo "</tbody></table></form>";
                                } else {
                                    echo "0 result";
                                }
                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <h1>Upload a new file:</h1>
            <p>
            <form action="../functions/add-software.php" method="post" enctype="multipart/form-data">
                <br><label for="document">Document Name:</label><br>
                <input type="text" id="dname" name="dname"><br>
                <b><label for="upload">Upload file:</label></b><br>
                <input type="file" id="uploaded_file" name="uploaded_file"><br>
                <br><label for="ksbs">Manifested KBS's:</label><br>
                <textarea name="ksb" cols="40" rows="4"
                          placeholder="Write the KSBs that are manifested in this work..."></textarea>
                <input type="submit" class="example_c" value="Submit">
                <p>
            </form>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/standard.js"></script>

</div>
</body>
</html>
