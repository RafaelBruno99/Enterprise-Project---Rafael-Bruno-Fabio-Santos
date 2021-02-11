<!DOCTYPE html>
<html lang="en">
<?php
  $conn = mysqli_connect("localhost", "root", "", "enterprisedb");
  if ($conn-> connect_error) {
    die("Connection Failed:". $conn-> connect_error);
  }
 ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Student</title>

  	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  	<link href="../student/student.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  	<link rel="stylesheet" href="../css/style.css">

</head>
<body>
	<div class="box-area">
		<header>
			<div class="wrapper">
        <div class="logo">
					<a href="employer-area.php">APPRENTICESHIP</a>
				</div>
				<nav>
          <a href="employer-student.php">STUDENTS</a>
                    <a href="../logout.php"><button type="button" class="btn btn-success" >Logout</button></a>
				</nav>
			</div>
		</header>
    <form method="post" action="">
        <section class="ftco-section">
      		<div class="container">
      			<div class="row justify-content-center">
      				<div class="col-md-6 text-center mb-5">
      					<h2 class="heading-section">STUDENTS</h2>
      				</div>
      			</div>
      			<div class="row">
      				<div class="col-md-12">
      					<div class="table-wrap">
      						<table class="table table-bordered table-dark table-hover">
      						  <thead>
                      <tr>
      						      <th>Student ID</th>
                        <th>Student Email</th>
                        <th>Student Username</th>
      						    </tr>
      						  </thead>
                    <tbody>
                      <?php
                        $conn = mysqli_connect("localhost", "root", "", "enterprisedb");
                        if ($conn-> connect_error) {
                          die("Connection Failed:". $conn-> connect_error);
                        }

                        $sql = "SELECT id, username, user_type FROM users WHERE (user_type = 'Student')";
                        $result = $conn-> query($sql);

                        if ($result-> num_rows > 0) {
                          while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row['id'] ."</td><td>". $row['username'] ."</td><td>". $row['user_type'] ."</td></tr>";
                          }
                          echo "</tbody></table>";
                        }
                        else {
                          echo "0 result";
                        }
                        $conn-> close();
                      ?>
      					</div>
      				</div>
      			</div>
      		</div>
      	</section>
      </form>
  	<script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

	</div>
</body>
</html>
