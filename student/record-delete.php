<?php
  $conn = mysqli_connect("localhost", "root", "", "enterprisedb");
  if ($conn-> connect_error) {
    die("Connection Failed:". $conn-> connect_error);
  }

  if(isset($_POST['delete'])){
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM users WHERE id =".$id);
    }
    header("Location:../tutor/tutor-student-management.php");
  }

  if (isset($_POST['delete_standard'])) {
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM standards WHERE id =".$id);
    }
    header("Location:../tutor/tutor-standard-management.php");
  }

  if (isset($_POST['delete_software'])) {
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM file WHERE id =".$id);
    }
    header("Location:../student/student-software.php");
  }

  if (isset($_POST['delete_soft'])) {
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM file WHERE id =".$id);
    }
    header("Location:../student/student-soft-skills.php");
  }

  if (isset($_POST['delete_research'])) {
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM file WHERE id =".$id);
    }
    header("Location:../student/student-research.php");
  }

  if (isset($_POST['delete_open'])) {
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM file WHERE id =".$id);
    }
    header("Location:../student/student-open-source.php");
  }

  if (isset($_POST['delete_network'])) {
    $chkarr = $_POST['checkbox'];
    foreach ($chkarr as $id) {
      mysqli_query($conn, "DELETE FROM file WHERE id =".$id);
    }
    header("Location:../student/student-network.php");
  }

  mysqli_close($conn);

?>
