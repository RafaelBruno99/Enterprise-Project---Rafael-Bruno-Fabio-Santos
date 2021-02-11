<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	      <title>Student</title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="../css/student.css" rel="stylesheet">

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
					<a href="../student/student.php">APPRENTICESHIP</a>
				</div>
				<nav>
          <a href="tutor-student-management.php">STUDENTS</a> <a href="tutor-standard-management.php">STANDARDS</a> <a href="tutor-document-management.php">DOCUMENTS</a>
				</nav>
			</div>
		</header>
    <section class="ftco-section">
  		<div class="container">
  			<div class="row justify-content-center">
  				<div class="col-md-6 text-center mb-5">
  					<h2 class="heading-section">DOCUMENTS</h2>
            <div class="test">
                <form action="../record-update.php" method="post">
                  <button type="submit" name="gradeupdate" id="gradeupdate" class="example_b" value="Update Grades">Update Grades</button>
                </form>
            </div>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-12">
  					<div class="table-wrap">
  						<table class="table table-bordered table-dark table-hover">
  						  <thead>
                  <tr>
                    <th>Document</th>
                    <th>KSBs</th>
                    <th>File</th>
                    <th>Mime</th>
                    <th>Size</th>
                    <th>Created</th>
                    <th>Grade</th>
  						    </tr>
  						  </thead>
                <tbody>
                  <?php
                    $conn = mysqli_connect("localhost", "root", "", "enterprisedb");
                    if ($conn-> connect_error) {
                      die("Connection Failed:". $conn-> connect_error);
                    }

                    $sql = 'SELECT id, dName, ksb, name, mime, size, data, created FROM file';
                    $result = $conn-> query($sql);

                    if ($result-> num_rows > 0) {
                      while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td>". $row['dName'] ."</td>
                        <td>". $row['ksb'] ."</td>
                        <td>". $row['name'] ."</td>
                        <td>". $row['mime'] ."</td>
                        <td>". $row['size'] ."</td>
                        <td>". $row['created'] ."</td>
                        <td><select name = 'list'>
                           <option value = 'pass'>Pass</option>
                           <option value = 'review'>Review</option>
                           <option value = 'fail'>Fail</option>
                        </select></td></tr>";
                      }
                      echo "</tbody></table>";
                    }
                    else {
                      echo "0 result";
                    }

                    $conn-> close();
                  ?>
  						  </tbody>
  						</table>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
    <div class="box-area">
      <section class="ftco-section">
    		<div class="container">
    			<div class="row justify-content-center">
    				<div class="col-md-6 text-center mb-5">
    					<h2 class="heading-section">RESEARCH</h2>
              <div class="test">
                  <form action="../record-update.php" method="post">
                    <button type="submit" name="gradeupdate" id="gradeupdate" class="example_b" value="Update Grades">Update Grades</button>
                  </form>
              </div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-12">
    					<div class="table-wrap">
    						<table class="table table-bordered table-dark table-hover">
    						  <thead>
                    <tr>
                      <th>Document</th>
                      <th>KSBs</th>
                      <th>File</th>
                      <th>Mime</th>
                      <th>Size</th>
                      <th>Created</th>
                      <th>Grade</th>
    						    </tr>
    						  </thead>
                  <tbody>
                    <?php
                      $conn = mysqli_connect("localhost", "root", "", "enterprisedb");
                      if ($conn-> connect_error) {
                        die("Connection Failed:". $conn-> connect_error);
                      }

                      $sql = 'SELECT id, dName, ksb, name, mime, size, data, created FROM research';
                      $result = $conn-> query($sql);

                      if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo "<tr><td>". $row['dName'] ."</td>
                          <td>". $row['ksb'] ."</td>
                          <td>". $row['name'] ."</td>
                          <td>". $row['mime'] ."</td>
                          <td>". $row['size'] ."</td>
                          <td>". $row['created'] ."</td>
                          <td><select name = 'list'>
                             <option value = 'pass'>Pass</option>
                             <option value = 'review'>Review</option>
                             <option value = 'fail'>Fail</option>
                          </select></td></tr>";
                        }
                        echo "</tbody></table>";
                      }
                      else {
                        echo "0 result";
                      }

                      $conn-> close();
                    ?>
    						  </tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>

          <script src="../js/jquery.min.js"></script>
          <script src="../js/popper.js"></script>
          <script src="../js/bootstrap.min.js"></script>
          <script src="../js/main.js"></script>
          <script src="../js/standard.js"></script>

	</div>
</body>
</html>
