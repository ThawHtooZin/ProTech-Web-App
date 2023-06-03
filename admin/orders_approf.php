<?php
  include 'config/connect.php';
  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM course_order WHERE id=$id");
  $stmt->execute();

  echo "<script>alert('Approfed successfully'); window.location.href='orders_admin.php';</script>";

  $username = $_GET['username'];
  $course_id = $_GET['course_id'];
  $stmt = $pdo->prepare("INSERT INTO user_courses(course_id,username) VALUES('$course_id', '$username')");
  $stmt->execute();
?>
