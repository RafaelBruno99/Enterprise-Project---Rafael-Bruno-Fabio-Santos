<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "enterprisedb");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $myusername = mysqli_real_escape_string($link, $_POST['username1']);
    $mypassword = mysqli_real_escape_string($link, $_POST['password']);
    $usertype = mysqli_real_escape_string($link, $_POST['userType']);

    // Attempt insert query execution
    $sql = "SELECT id FROM users WHERE username = '$myusername' AND password = '$mypassword' AND user_type ='$usertype'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1 && $usertype == "Student"){
        $_SESSION["username"] = $myusername;
      header("location:student/student.php");
    }
    else if($count == 1 && $usertype == "Tutor"){
        $_SESSION["username"] = $myusername;
      header("location:tutor/tutor-area.php");
    }
    else if($count == 1 && $usertype == "Employer"){
        $_SESSION["username"] = $myusername;
      header("location:employer/employer-area.php");
    }
    else{
    echo "Username or Password are incorrect!";
    }
}
// Close connection
mysqli_close($link);
?>
<html>
  <head>
      <title>Apprenticeship Program</title>
      <link rel="stylesheet" href="css/main.css">
  </head>

  <body>
    <div class="hero">
      <div class="form-box">
        <div class="button-box">
          <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Login</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <div class='social-icons'>
          <img src="img/fb.png">
          <img src="img/tw.png">
          <img src="img/gp.png">
        </div>
        <form id="login" method="post"  action="" class="input-group">
          <input type="text" name="username1" class="input-field" placeholder="Username">
          <input type="password" name="password" class="input-field" placeholder="Enter Password"></br></br>
          <div class="user-selection">
              <label class="label" for="userType">I am a: </label></br>
                <input type="radio" name="userType" value="Student" class="custom-radio">👥 Student</br>
                <input type="radio" name="userType" value="Tutor" class="custom-radio">👥 Tutor</br>
                <input type="radio" name="userType" value="Employer" class="custom-radio">👥 Employer</br>
          </div>
          <input type="checkbox" class="check-box"><span>Remember Password</span>
          <button type="submit" class="submit-btn" name="login"> Login in</button>
        </form>
        <form id="register" action="functions/adduser.php" method="post" class="input-group">
          <input type="text" name="username" class="input-field" placeholder="Username">
          <input type="email" name="email" class="input-field" placeholder="Email">
          <input type="password" name="password" class="input-field" placeholder="Enter Password"></br>
          <div class="user-selection">
              <label class="label" for="userType">I am a: </label></br>
                <input type="radio" name="userType" value="Student" class="custom-radio">👥 Student</br>
                <input type="radio" name="userType" value="Tutor" class="custom-radio">👥 Tutor</br>
                <input type="radio" name="userType" value="Employer" class="custom-radio">👥 Employer</br></br>
          </div>
          <button type="submit" class="submit-btn"> Register</button>
        </form>
      </div>
    </div>
    <script>
      var x = document.getElementById('login');
      var y = document.getElementById('register');
      var z = document.getElementById('btn');

      function register() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
      }
      function login() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
      }

    </script>
  </body>
</html>
