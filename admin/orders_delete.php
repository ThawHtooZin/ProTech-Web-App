<?php
  include 'config/connect.php';
  $id = $_GET['id'];
  $stmt = $pdo->prepare("DELETE FROM course_order WHERE id=$id");
  $stmt->execute();

  echo "<script>alert('Data Deleted successfully'); window.location.href='orders_admin.php';</script>";
?>
